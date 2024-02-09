<?php
    //$sSID = $_GET['sSID'];
    include("cookie_utils.php");
    $login_data = check_login("student");
    $sUID = $login_data["userID"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Προσωπικό</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.css">

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.js"></script>

<style type="text/css">
<!--
<?php 
    include("base_css.php");
 ?>

.pag_title {
    margin-top: 5%;
    margin-bottom: 50px;
}

.style1 {
    font-size: 24px;
    font-weight: bold;
    font-family: "Times New Roman", Times, serif;
}

img{
    height: 200px;
    margin-bottom: 40px;
    justify-content: center;
}

.card{
    display: flex;
    flex-direction: row;
    justify-content: center;
    width: 1200px;
}

.card_con{
    display: flex;
    flex-direction: row;
    justify-content: center;
    width: 600px;
}

.sec div, .firs div{
    display: flex;
    flex-direction: column;
    border: 1px solid; 
}

.sec div{
    background-color: white;
    width: 400px;
}

.firs div{
    width: 200px;
    background-color: white;
}

-->
</style>

</head>

<body>
    <header id="header">
        <a href="#" class="logo">UniSystem</a>
        <div id="toggle"></div>
        <nav id="navbar">
            <ul>
                <li><a href="detailed_grades.php">Βαθμολογία</a></li>
                <li><a href="#" class="active">Προφίλ</a></li>
                <li><a href="logout.php">Έξοδος</a></li>
            </ul>
        </nav>
    </header>    

    <script>
      const header = document.getElementById('header');
      const toggle = document.getElementById('toggle');
      const navbar = document.getElementById('navbar');

      document.onclick = function(e) {
        if (e.target.id !== 'header' && e.target.id !== 'toggle' && e.target.id !== 'navbar'){
            toggle.classList.remove('active');
            toggle.classList.remove('active');
            toggle.classList.remove('active');
            navbar.classList.remove('active');
        }
      }

      toggle.onclick = function() {
        toggle.classList.toggle('active');
        navbar.classList.toggle('active');
      }
    </script>

    <p class="pag_title" align="center"><strong><font size="+4">Προφίλ Φοιτητή</font></strong><br></p>
    <center>
    <div class="container">
        <img src="personIcon.png">
        
                <?php
                    include('connect.php');

                    //SQL query 
                    $query = "SELECT * FROM STUDENT WHERE UID=$sUID;";


                    //execute query 
                    $result = mysqli_query($con, $query); 

                    if (!$result){
                        echo("Error description: " . mysqli_error($con));
                    }
                    
                    //query database 
                    while($rows = mysqli_fetch_array($result)){
                        
                        
                                
                        $uid = $rows['UID'];
                        $fname = $rows['FNAME'];
                        $lname = $rows['LNAME'];
                        $email = $rows['EMAIL'];
                        $address = $rows['ADDRESS'];
                        $phone_number = $rows['PHONE_NUMBER'];
                        $dor = $rows['DATE_OF_REGISTRATION'];
                        $semester = $rows['SEMESTER'];
                        $department = $rows['DEPARTMENT'];
                        $specialty = $rows['SPECIALTY_NAME'];

                        echo("<div class=\"card\">");
                        echo ("<div class=\"firs\" align=\"center\"><div><strong>Όνομα</strong></div><div><strong>Αριθμός Μητρώου</strong></div><div><strong>Διεύθυνση</strong></div><div><strong>Ημερομηνία Εγγραφής</strong></div><div><strong>Τμήμα</strong></div></div>
                            <div class=\"sec\" align=\"center\"><div>$fname</div><div>$uid</div><div>$address</div><div>$dor</div><div>$department</div></div>
                            <div class=\"firs\" align=\"center\"><div><strong>Επώνυμο</strong></div><div><strong>E-mail</strong></div><div><strong>Τηλέφωνο</strong></div><div><strong>Εξάμηνο</strong></div><div><strong>Κατέυθυνση</strong></div></div>
                            <div class=\"sec\" align=\"center\"><div>$lname</div><div>$email</div><div>$phone_number</div><div>$semester</div><div>$specialty</div></div>");     
                        echo("</div>");
                    }  

                

                ?> 
        
    </div>

    <p class="pag_title" align="center"><strong><font size="+4">Στοιχεία Επικοινωνίας Τμήματος</font></strong><br></p>
            <?php
                    include('connect.php');

                    //SQL query 
                    $query2 = "SELECT d.D_EMAIL, d.WEBSITE FROM STUDENT, DEPARTMENT d WHERE DEPARTMENT=d.D_NAME AND UID=$sUID;";
                    $query3 = "SELECT dpn.PHONE_NUMBER FROM STUDENT, DEPARTMENT d, DEPARTMENT_PHONE_NUMBERS dpn WHERE d.D_NAME=dpn.D_NAME AND d.D_NAME=DEPARTMENT AND UID=$sUID;";


                    //execute query 
                    $result2 = mysqli_query($con, $query2);
                    if (!$result2){
                        echo("Error description: " . mysqli_error($con));
                    }

                    $result3 = mysqli_query($con, $query3); 
                    if (!$result3){
                        echo("Error description: " . mysqli_error($con));
                    }

                    $row2 = mysqli_fetch_array($result2);
                    
                    $email_Dep = $row2['D_EMAIL'];
                    $website = $row2['WEBSITE'];
                    $i = 1;

                    echo("<div class=\"card_con\">");
                    echo ("<div class=\"firs\" align=\"center\"><div><strong>Website</strong></div><div><strong>E-mail</strong></div></div>
                        <div class=\"sec\" align=\"center\"><div>$website</div><div>$email_Dep</div></div>");
                    echo("</div>");
                    
                    echo("<div class=\"card\">");
                    while($row3 = mysqli_fetch_array($result3)){

                        $ph = $row3['PHONE_NUMBER'];

                        echo ("<div class=\"firs\" align=\"center\"><div><strong>Τηλέφωνο $i</strong></div></div>
                        <div class=\"sec\" align=\"center\"><div>$ph</div></div>");
                        $i = $i +1;
                    }
                    echo("</div>");
                    
   
                    
             


                

                ?> 
    </center>
    <br><br>

</body>
</html>