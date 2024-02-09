<?php
    include("cookie_utils.php");
    $login_data = check_login("student");
    $sUID = $login_data["userID"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Βαθμολογία</title>
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



<style type="text/css">
<!--
.pag_title {
    margin-top: 5%;
    margin-bottom: 50px;
}

.style1 {
    font-size: 24px;
    font-weight: bold;
    font-family: "Times New Roman", Times, serif;
}

<?php 
    include("base_css.php");
?>

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

 a{
    text-decoration: none;
    color: #6C4AB6;
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
                <li><a href="#" class="active">Βαθμολογία</a></li>
                <li><a href="profile.php">Προφίλ</a></li>
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

    <p class="pag_title" align="center"><strong><font size="+4">Αναλυτική Βαθμολογία</font></strong><br/>
    <center>
    <div class="container">
        
                <?php
                    include('connect.php');
                    $PassedSubj=0;
                    $allSubj=0;
   
                    for($i=1; $i<10; $i++)
                    {



                            $ViewQuery = "CREATE VIEW SEMESTER_GRADE_TABLE$i AS SELECT sub.SID, sub.NAME, sub.ECTS, eg.GRADE, sub.SEMESTER, rf.REG_ID FROM STUDENT st, SUBJECT sub, REGISTERS_FOR rf, EXAM_GRADES eg WHERE rf.STUDENT_UID=st.UID AND sub.SID=rf.SUBJECT_ID AND rf.REG_ID=eg.REG_ID AND st.UID=$sUID AND sub.SEMESTER=$i;";

                            $resultView = mysqli_query($con, $ViewQuery); 

                            $query = "SELECT * FROM SEMESTER_GRADE_TABLE$i WHERE (SID, REG_ID) IN ( SELECT SID, MAX(REG_ID) AS REG_ID FROM SEMESTER_GRADE_TABLE$i GROUP BY SID );";

                            $result = mysqli_query($con, $query); 

                            if (!$result){
                                echo("Error description: " . mysqli_error($con));
                            }
                            
                            //query database 

                            echo ("<h4>Εξάμηνο $i</h4>");
                                echo("<div class=\"table_container\">");
                                echo("<table class=\"table table-striped table-bordered  rad_tabl data \" bgcolor=\"white\">
                                    <thead>
                                         <tr>
                                          <th class=\"table_sid\" data-mdb-sort=\"false\"><div align=\"center\">
                                           ID
                                            </div>
                                          </th>
                                          <th  class=\"table_title\"><div align=\"center\">
                                           Μάθημα
                                            </div>
                                          </th>
                                          <th  class=\"ects\"><div align=\"center\">
                                           ECTS
                                           </div>
                                          </th>  
                                          <th  class=\"grade\"><div align=\"center\">
                                           Βαθμός
                                           </div>
                                          </th>         
                                         </tr>
                                    </thead>
                                    <tbody>");

                            while($rows= mysqli_fetch_array($result)){
                            
                                if ($rows['SEMESTER'] == $i )
                                {   
                                    

                                    $sid = $rows['SID'];
                                    $SubjectName = $rows['NAME'];
                                    $ECTS = $rows['ECTS'];
                                    $Vathmos = $rows['GRADE'];
                                    $allSubj++ ;
                                    if ($Vathmos>=5) {
                                        $PassedSubj++ ;
                                    }


                                    echo ("<tr><td><div align=\"center\"> $sid </div></td> <td><div align=\"center\"><a class=\"history\" href=\"subject_history.php?sSID=$sid\"> $SubjectName </a></div></td> <td><div align=\"center\"> $ECTS </div></td>");     
                                    echo ("<td><div align=\"center\"> $Vathmos </div></td>");  
                                    echo ("</tr>");
                                   
                                    
                                }
                            }

                            $foot_query1 = "SELECT CAST(AVG(GRADE) AS DECIMAL(4,2)) AS SEM_AVERAGE FROM SEMESTER_GRADE_TABLE$i WHERE GRADE>=5 AND (SID, REG_ID) IN ( SELECT SID, MAX(REG_ID) AS REG_ID FROM SEMESTER_GRADE_TABLE$i GROUP BY SID);";

                            $foot_query2 = "SELECT SUM(ECTS) AS ECTS_SUM FROM SEMESTER_GRADE_TABLE$i WHERE GRADE>=5 AND (SID, REG_ID) IN ( SELECT SID, MAX(REG_ID) AS REG_ID FROM SEMESTER_GRADE_TABLE$i GROUP BY SID);";

                                $foot_result1 = mysqli_query($con, $foot_query1);
                                $foot_result2 = mysqli_query($con, $foot_query2);

                                $Mesos_Examhnou = mysqli_fetch_array($foot_result1)['SEM_AVERAGE'];
                                $Synolo = mysqli_fetch_array($foot_result2)['ECTS_SUM'];


                                echo ("</tbody> <tfoot> <tr><th><div align=\"center\">Μ.O. Εξαμήνου</div></th>
                                              <th><div align=\"center\"> $Mesos_Examhnou </div></th>
                                              <th><div align=\"center\">Συνολικά ECTS</div></th>  
                                              <th><div align=\"center\">$Synolo</div></th></tr></tfoot> </table>");
                                echo("</div>");

                            $queryDrop = "DROP VIEW SEMESTER_GRADE_TABLE$i;";

                            $resultDrop = mysqli_query($con, $queryDrop); 
                    }                    
                    
                    ?> 
        
    </div>

    <div class="Total">
        <?php
            include('connect.php');

                    //SQL query 
                    $query_tot = "SELECT AVERAGE, TOTAL_ECTS, TOTAL_SUBJECTS, PASSED_SUBJECTS FROM STUDENT WHERE UID=$sUID;";


                    //execute query 
                    $result_tot = mysqli_query($con, $query_tot); 

                    if (!$result_tot){
                        echo("Error description: " . mysqli_error($con));
                    }

                    $column = mysqli_fetch_array($result_tot);

                    $average = $column['AVERAGE'];
                    $all_ects = $column['TOTAL_ECTS'];

                    echo("<div><img src=\"personIcon.png\"></div><div class=\"stats\">
                                <ul>
                                    <li>Μέσος Όρος: $average</li>
                                    <li>Συνολικά ECTS: $all_ects</li>
                                    <li>Περασμένα Μαθήματα: $PassedSubj</li>
                                    <li>Συνολικά Μαθήματα: $allSubj</li>
                                </ul>
                            </div>");
        ?>
    </div>

    </center>
    <br><br>

</body>
</html>