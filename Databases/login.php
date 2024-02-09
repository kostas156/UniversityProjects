<?php
include_once("connect.php");
include_once("cookie_utils.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit("Redirecting to the <a href='index.php'>login page</a>");
}

if (isset($_POST["userID"])) {
    $userID = mysqli_real_escape_string($con, $_POST["userID"]);
    if (is_numeric($userID) == false) {
        echo "Invalid user ID";
        exit("<br>Return to the <a href='index.php'>login page</a>");
    }
} else {
    echo "Invalid user ID";
    exit("<br>Return to the <a href='index.php'>login page</a>");
}

if (isset($_POST["userPassword"])) {
    $userPassword = mysqli_real_escape_string($con, $_POST["userPassword"]);
    if ($userPassword == "") {
        echo "Invalid user password";
        exit("<br>Return to the <a href='index.php'>login page</a>");
    }
} else {
    echo "Invalid user password";
    exit("<br>Return to the <a href='index.php'>login page</a>");
}

if (isset($_POST["userTypeRadio"])) {
    $userType = $_POST["userTypeRadio"];
} else {
    echo "Invalid user type";
    exit("<br>Return to the <a href='index.php'>login page</a>");
}

if ($userType == "student") {
    $query = "SELECT st.PASSWORD FROM STUDENT st WHERE st.UID=$userID LIMIT 1";
} else {
    $query = "SELECT pr.P_PASSWORD AS PASSWORD FROM PROFESSOR pr WHERE pr.PID=$userID LIMIT 1";
}

$result = mysqli_query($con, $query);
if (!$result) {
    echo "MySQL error: " . mysqli_error($con);
    exit("<br>Return to the <a href='index.php'>login page</a>");
}

$result = mysqli_fetch_assoc($result);
if ($result != null) {
    $passwordHash = $result["PASSWORD"];
} else {
    echo "No $userType user found with id $userID";
    exit("<br>Return to the <a href='index.php'>login page</a>");
}

if ($passwordHash == null) {
    $passwordHash = sodium_crypto_pwhash_str(
        $userPassword,
        SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
        SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE
    );
    if ($userType == "student") {
        $query = "UPDATE STUDENT st SET st.PASSWORD='$passwordHash' WHERE st.UID=$userID";
    } else {
        $query = "UPDATE PROFESSOR pr SET pr.P_PASSWORD='$passwordHash' WHERE pr.PID=$userID";
    }

    mysqli_query($con, $query);
    mysqli_commit($con);
}

if (sodium_crypto_pwhash_str_verify($passwordHash, $userPassword)==false) {
    echo "Wrong password";
    exit("<br>Return to the <a href='index.php'>login page</a>");
}

// User has authenticated successfully, store the login details and redirect the accordingly
store_login($userID, $userType);
header("Location: index.php");
exit("Redirecting to the <a href='index.php'>login page</a>");

?>