<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php
    //$sSID = $_GET['sSID'];
    include("cookie_utils.php");
    $login_data = check_login("student");
    $sUID = $login_data["userID"];
    $ExPer = str_replace("%20", " ", $_GET['ExPer']);
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
    echo("<title>$ExPer</title>");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.css">

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.js"></script>


<style type="text/css">
<!--
<?php include("base_css.php"); ?>

.pag_title {
    margin-top: 150px;
    margin-bottom: 50px;
}

.style1 {
    font-size: 24px;
    font-weight: bold;
    font-family: "Times New Roman", Times, serif;
}

body {
    background-color: #CDFCF6;
    min-height: 100vh;
    overflow: hidden;
    background: linear-gradient(to right, white, #CDFCF6 5%, #CDFCF6 95%, white);
}

.style3 {font-size: 9px}

.card{
    border-radius: 25px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    height: 80px;
    margin-bottom: 20px;
}

.period{
    color: #144272;
}

a{
    text-decoration: none;
}

-->
</style>

</head>

<body>
    <header id="header">
        <a href="profile.php" class="logo">UniSystem</a>
        <div id="toggle"></div>
        <nav id="navbar">
            <ul>
                <li><a href="detailed_grades.php">Βαθμολογία</a></li>
                <li><a href="profile.php" class="active">Προφίλ</a></li>
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

    <?php

    echo("<p class=\"pag_title\" align=\"center\"><strong><font size=\"+4\"> $ExPer </font></strong><br></p>");

    ?>
    <center>
    <div class="container">
        
                <?php
                    include('connect.php');

                    //SQL query 
                    $query = "SELECT sub.NAME, eg.GRADE, sub.SID FROM SUBJECT sub,  REGISTERS_FOR rf, EXAM_GRADES eg WHERE eg.EXAM_PERIOD='$ExPer' AND rf.REG_ID=eg.REG_ID AND rf.STUDENT_UID=$sUID AND sub.SID=rf.SUBJECT_ID;";


                    //execute query 
                    $result = mysqli_query($con, $query); 

                    if (!$result){
                        echo("Error description: " . mysqli_error($con));
                    }
                    
                    //query database 
                    while($rows = mysqli_fetch_array($result)){
                        
                        
                                
                        $subj_name = $rows['NAME'];
                        $grade = $rows['GRADE'];
                        $sid = $rows['SID'];

                        echo("<div class=\"card\">");
                        echo ("<div class=\"period\" align=\"center\"><strong><font size=\"+2\"><a class=\"history\" href=\"subject_history.php?sSID=$sid\">$subj_name</a></font></strong></div><div align=\"center\"><strong><font size=\"+2\">Βαθμός: $grade </font></strong></div>");     
                        echo("</div>");
                 
                    }  

                

                ?> 
        
    </div>

    </center>
    <br><br>

</body>
</html>