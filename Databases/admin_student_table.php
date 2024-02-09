<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Φοιτητές</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.css">

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.js"></script>

<script>
    $(document).ready(function () {
      $('.data').DataTable({
        columns: [
          {searchable: false, orderable: true},
          {searchable: true, orderable: false},
          {orderable: true, searchable: true},
          {orderable: true, searchable: true},
          {orderable: true, searchable: true}],
        "aLengthMenu": [[50, 100, 150, -1], [50, 100, 150, "All"]]
      });
    });
  </script>

<style type="text/css">
<!--

.pag_title {
    margin-top: 10%;
    margin-bottom: 50px;
}

.style1 {
	font-size: 24px;
	font-weight: bold;
	font-family: "Times New Roman", Times, serif;
}
body {
	background-color: #FFEBCD;
}
.style3 {font-size: 9px}

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

 #container{ 
    margin-left: 10%;
    margin-right: 10%;
    border: none;
 }

<?php include("base_css.php"); ?>
-->
</style>


</head>

<body>
    <header id="header">
        <a href="profile.php" class="logo">UniSystem</a>
        <div id="toggle"></div>
        <nav id="navbar">
            <ul>
                <li><a href="#" class="active">Φοιτητές</a></li>
                <li><a href="admin_add_student.php">Προσθήκη Νέου</a></li>
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

<p class="pag_title" align="center"><strong><font size="+4">Εγγεγραμμένοι Φοιτητές</font></strong><br></p>
<center>
    <div id="container">
<table class="table table-striped table-bordered  rad_tabl data" border="2" bgcolor="white">
<thead>
 <tr>
  <th><div align="center">
   ID</div>
  </th>
  <th><div align="center">
   Όνομα</div>
  </th>
  <th><div align="center">
   Επώνυμο</div>
  </th>  
  <th><div align="center">
   Τμήμα</div>
  </th>
  <th><div align="center">
   Κατευθυνση</div>
  </th>      
 </tr>
</thead>
<tbody>
<?php
    include('connect.php');

    //SQL query 
    $query = "SELECT UID,FNAME,LNAME,DEPARTMENT,SPECIALTY_NAME FROM STUDENT;"; 
     
    //execute query 
    $result = mysqli_query($con, $query); 

    if (!$result){
        echo("Error description: " . mysqli_error($con));
    }
    
    //query database 
    while($rows = mysqli_fetch_array($result)){
        $id = $rows['UID'];
        $FirstName = $rows['FNAME'];
        $LastName = $rows['LNAME'];
        $Tmhma = $rows['DEPARTMENT'];
        $Specialty = $rows['SPECIALTY_NAME'];
    //format results 

        echo ("<tr><td><div align=\"center\"> $id </div></td> <td><div align=\"center\"> $FirstName </div></td> <td><div align=\"center\"> $LastName </div></td> <td><div align=\"center\"> $Tmhma </div></td><td><div align=\"center\"> $Specialty </div></td>");  
        echo ("</tr>");
    
    }  

    ?> 

</tbody>
	</table>
    </div>
    </center>
<br><br>
</body>
</html>
