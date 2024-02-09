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

<script>
    $(document).ready(function () {
      $('.table').DataTable({
        columns: [
          null,
          {searchable: true},
          {orderable: true, searchable: false},
          {orderable: true, searchable: false}],
        "bPaginate": false,
        "bInfo": false,
        "bFilter": false
      });
    });
  </script>

<script>
      $(function(){    
        $('.history').click(function(event){
           // prevent browser opening in new page
           event.preventDefault();
           // `this` is `<a>` instance and it has an `href` property that is full url needed
           $.getJSON( this.href, function(data) {
              // do stuff with response data
              
           });  
        });    
    });
</script>



<style type="text/css">
<!--
html {
    overflow-y: scroll;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    /*scroll-behavior: smooth;*/
}

.pag_title {
    margin-top: 5%;
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

/* ------------ Navigation Bar Start ------------ */

header {
    position: fixed;
    top: 0;
    right: 0;
    display: flex;
    justify-content: space-between;
    width: 100%;
    background: #98A8F8;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.25);
    z-index: 1000;
    border-radius: 0 0 0 40px;
}

.logo {
    height: 60px;
    line-height: 60px;
    color: #12334e;
    font-weight: 700;
    font-size: 2em;
    text-decoration: none;
    cursor: pointer;
    padding-left: 20px;
}

#toggle {
    position: absolute;
    top: 0;
    right: 0;
    width: 60px;
    height: 60px;
    background: #98A8F8;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
}

#toggle::before {
    content: '';
    position: absolute;
    width: 28px;
    height: 2px;
    background: #fff;
    transform: translateY(-5px);
    transition: 0.2s;
}

#toggle::after {
    content: '';
    position: absolute;
    width: 28px;
    height: 2px;
    background: #fff;
    transform: translateY(5px);
    transition: 0.2s;
}

#toggle.active::before {
    transform: translateY(0px) rotate(45deg);
}

#toggle.active::after {
    transform: translateY(0px) rotate(-45deg);
}

#toggle.active{
    background:  #BCCEF8;
}

#navbar {
    position: relative;
    height: 60px;
    right: 60px;
    background: #98A8F8;
    transition: 0.5s;
    width: 0px;
    overflow: hidden;
}

#navbar.active {
    width: 360px;
}

#navbar ul {
    position: relative;
    display: flex;
    flex-direction: row;
}

#navbar ul li{
    list-style: none;
}

#navbar ul li a {
    color: #12334e;
    height: 60px;
    line-height: 60px;
    display: inline-block;
    text-decoration: none;
    font-size: 1.2em;
    padding: 0 15px;
    letter-spacing: 2px;
}

#navbar ul li a:hover {
    color: #98A8F8;
    background: #12334e;
}

section{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 20vh;
    color: #98A8F8;
    font-size: 10vw;
    font-weight: 700;
}

.pag_title {
    margin-top: 75px;
}

@media (max-width: 990px) {
    #navbar{
        position: fixed;
        bottom: -100%;
        right: 0;
        width: 100%;
        transition: 0.5s;
        display: flex;
        justify-content: center;
        align-items: center;
        height: calc(100vh - 60px);
    }

    #navbar.active {
        height: calc(100vh - 60px);
        bottom: 0;
        width: 100%;
    }

    #navbar ul {
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
}


/* ------------ Navigation Bar End ------------ */

.style3 {font-size: 9px}

#container{ 
    margin-left: 10%;
    margin-right: 10%;
    border: none;
 }

 .table_container{
    margin-bottom: 40px;
 }

 .rad_tabl {
    width: 100%;
    border-radius: 25px;
    border: none;
    border-color: #CDFCF6;
    margin-top: 10px !important;
    margin-bottom: 20px !important;
 }

 th.table_sid{
    width: 13%;
 }

 th.grade{
    width: 10%;
 }

 th.ects{
    width: 15%;
 }

 tfoot {
    border: none;
    border-color: #CDFCF6;
 }

 .Total {
    margin-top: 125px;
    margin-bottom: 50px;
    height: 300px;
    width: 600px;
    background: white;
    border-radius: 25px;
    display: flex;
    justify-content: space-around;
    flex-direction: row;
    align-items: center;
    background: linear-gradient(to bottom, #98A8F8, #98A8F8 10%, white 10%, white, white 90%, #98A8F8 90%, #98A8F8);
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.5);
 }

 .Total ul li {
    list-style: none;
    font-size: 24px;
    font-weight: bold;
 }

 img {
    margin-left: 15%;
    width: 150px;
    height: 150px;

 }

-->
</style>

</head>

<body>
    <header id="header">
        <a href="professor_profile.php" class="logo">UniSystem</a>
        <div id="toggle"></div>
        <nav id="navbar">
            <ul>
                <li><a href="professor_subjects.php">Μαθήματα</a></li>
                <li><a href="professor_profile.php">Προφίλ</a></li>
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

    <p class="pag_title" align="center"><strong><font size="+4">ΛΙΣΤΑ ΦΟΙΤΗΤΩΝ</font></strong><br/>
    <center>
    <div class="container">

<body style="margin: 50px;">
    
    <br>
    <form action="insert_db.php" method="POST">


        <table class="table">
            <thead>
                <tr>
                    <th>Student UID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Reg_Id</th>
                    <th>Grade</th>


                </tr>
            </thead>

            <tbody>
                <?php
                include('connect.php');
                $SID = $_GET["subjectID"];

                $ViewQuery = "CREATE VIEW STUDENT_LAST_REG_ID AS SELECT student.UID, student.FNAME,student.LNAME,registers_for.REG_ID FROM STUDENT student LEFT OUTER JOIN REGISTERS_FOR registers_for ON registers_for.STUDENT_UID = student.UID LEFT JOIN EXAM_GRADES eg ON registers_for.REG_ID=eg.REG_ID WHERE registers_for.SUBJECT_ID = $SID AND EXAM_PERIOD=\"February 2022\";";
                $Viewqueryexe = mysqli_query($con, $ViewQuery);

                $sql = "SELECT * FROM STUDENT_LAST_REG_ID WHERE (UID, REG_ID) IN ( SELECT UID, MAX(REG_ID) AS REG_ID FROM STUDENT_LAST_REG_ID GROUP BY UID );";
                $queryexe = mysqli_query($con, $sql);
                

                while ($row = $queryexe->fetch_assoc()) {
                    echo "
                <tr>
                <td>" . $row["UID"] . "</td>
                <td>" . $row["FNAME"] . "</td>
                <td>" . $row["LNAME"] . "</td>
                <td>" . $row["REG_ID"] . "</td>
                <td> <input type='number' name='grade-". $row["REG_ID"]."' placeholder='1.0' step='0.5' min='1' max='10' id='grade'></td>
                
                
                
               
                </tr>";
                }

                $dropQuery = "DROP VIEW STUDENT_LAST_REG_ID;";
                $DROPqueryexe = mysqli_query($con, $dropQuery);

                ?>

            </tbody>
        </table>
        <input type="submit" value="Submit">
    </form>
</body>

</html>