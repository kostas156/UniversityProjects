<?php
$server_secret_file = ".htpasswd";
$login_cookie_name = "LOGIN_DATA";

function server_secret() {
    global $server_secret_file;
    if (file_exists($server_secret_file)) {
        $keyfile = fopen($server_secret_file, "r") or exit("Error: Unable to read server key");
        $key = sodium_hex2bin(fread($keyfile,filesize($server_secret_file)));
        fclose($keyfile);
        return $key;
    } else {
        $key = sodium_bin2hex(sodium_crypto_secretbox_keygen());
        $keyfile = fopen($server_secret_file, "w") or exit("Error: Unable to initialize server cryptography");
        fwrite($keyfile, $key);
        fclose($keyfile);
        return sodium_hex2bin($key);
    }
}

function store_login($userID, $userType) {
    global $login_cookie_name;
    $login_data = array("userID" => $userID, "userType" => $userType);
    $login_data = json_encode($login_data);

    $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
    $login_data = sodium_crypto_secretbox($login_data, $nonce, server_secret());

    setcookie($login_cookie_name, $nonce . $login_data, time() + (60 * 60 * 3), "/");
}

function read_login($redirect_on_fail=false) {
    global $login_cookie_name;
    if (isset($_COOKIE[$login_cookie_name]) == false) {
        return null;
    }

    $login_data = $_COOKIE[$login_cookie_name];
    if ($login_cookie_name)

    $nonce = substr($login_data, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
    $login_data = substr($login_data, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
    $login_data = sodium_crypto_secretbox_open($login_data, $nonce, server_secret());

    // echo "<hr>login data: ";
    // var_dump($login_data);
    // echo "<hr>";

    if ($login_data == false) {
        logout($redirect_on_fail);
        return null;
    }

    return json_decode($login_data, true);
}

function renew_login_cookie($redirect_on_fail) {
    $login_data = read_login($redirect_on_fail);

    if ($login_data == null) {
        logout($redirect_on_fail);
        return false;
    }

    store_login($login_data["userID"], $login_data["userType"]);
    return true;
}

function check_login($userType="student", $redirect=true) {
    $login_data = read_login($redirect);

    if ($login_data == null) {
        if ($redirect) {
            header("Location: index.php");
            exit("If you are not automatically redirected click <a href='index.php'>here</a> for the login page");
        }
    }

    if (isset($login_data["userID"])==false || isset($login_data["userType"])==false) {
        logout($redirect);
    }

    if ($login_data["userID"]==null || $login_data["userType"]==null) {
        logout($redirect);
    }

    renew_login_cookie($redirect);

    if ($login_data["userType"] != $userType) {
        if ($userType=="student" && $redirect) {
            header("Location: profile.php");
            exit("Redirecting to the <a href='profile.php'>student profile</a>");
        } elseif ($userType=="professor" && $redirect) {
            header("Location: professor_profile.php");
            exit("Redirecting to the <a href='professor_profile.php'>professor profile</a>");
        }
    }

    return $login_data;
}

function logout($redirect=false) {
    global $login_cookie_name;
    if (isset($_COOKIE[$login_cookie_name])) {
        // setcookie("LOGIN_DATA", "", time() + 5);
        setcookie("LOGIN_DATA", "", time() - 3600, "/");
    }
    if ($redirect) {
        header("Location: index.php");
        exit("Redirecting to the <a href='index.php'>login page</a>");
    }
    // else {
    //     exit("No user currently logged in<br>Click <a href='index.php'>here</a> for the login page");
    // }
}
?>