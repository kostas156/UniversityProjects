<?php include("connect.php"); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Εισαγωγή δεδομένων</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.css">

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.js"></script>


<style type="text/css">
<!--
<?php
  include('base_css.php');
?>

.style1 {
	font-size: 36px;
	font-style: italic;
}
body {
	background-color: #FFFFFF;
}
-->
</style>
</head>
<body>
  <div align="center">
    <p><BR>
      <?php 
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $Tmhma = $_POST['RadioWork'];
    $Katuthinsi = $_POST['Tmhma'];


    $date = mysqli_fetch_array(mysqli_query($con, "SELECT CURDATE() AS DATE"))['DATE'];

    $uidQuer = "SELECT (MAX(UID)+1) AS UID FROM STUDENT";
    $newUid = mysqli_fetch_array(mysqli_query($con, $uidQuer))['UID'];


    

    $query = "INSERT INTO STUDENT (UID, FNAME, LNAME, EMAIL, PASSWORD, ADDRESS, PHONE_NUMBER, DATE_OF_REGISTRATION, TOTAL_SUBJECTS, SEMESTER, TOTAL_ECTS, AVERAGE, PASSED_SUBJECTS, DEPARTMENT, SPECIALTY_NAME) VALUES ('$newUid','$firstname','$lastname','$email', '','$address', '$phone', '$date', 0, 1, 0, 0, 0,'$Tmhma', '$Katuthinsi');";
  
    //execute query 
    $queryexe = mysqli_query($con, $query);
    
    if (!$queryexe){
        echo("Error description: " . mysqli_error($con));
    }else{
        echo("<p class=\"pag_title\" align=\"center\"><strong><font size=\"+2\">Success!</font></strong><br/>");
    }

?>
      </p>
    <a href="admin_student_table.php">Πίσω</a><BR>
</div>
</body>
</html>