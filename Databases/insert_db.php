<!DOCTYPE html>
<html>
<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php
        include('connect.php');

        //$grade = $_REQUEST['grade'];

        $keys = array_keys($_REQUEST);
        // var_dump($keys);
        // var_dump($keys[0]);
        $posted_grades= [];
        for($k=0;$k < count($keys); $k++){
            if( substr($keys[$k],0,6) == "grade-") {
            //$posted_grades += $keys[$k];
                if ($_REQUEST[$keys[$k]] != null && $_REQUEST[$keys[$k]] != "") {
                    array_push($posted_grades,$keys[$k]);
                }
            }
        }
        var_dump($posted_grades);

        for($k=0;$k < count($posted_grades); $k++){
            
            //$sql = "INSERT INTO `exam_grades` (`REG_ID`,`EXAM_PERIOD`,`GRADE`) VALUES('".substr($posted_grades[$k],6)."','February 2022','".$_REQUEST[$posted_grades[$k]]."');"; 
            //$sql1= "SELECT REG_ID FROM exam_grades WHERE REG_ID = 10;";
            $sql = "UPDATE EXAM_GRADES exam_grades SET GRADE = '".$_REQUEST[$posted_grades[$k]]."' WHERE  REG_ID= 4;";
            $result = mysqli_query($con, $sql);
            

        if(mysqli_query($con, $sql)){
            echo "<h3>data stored in a database successfully.";
        }else{
            echo "ERROR: Hush! Sorry $sql. ";
                mysqli_error($con);
        }
        }
        
        
?>
    </center>
</body>
</html>
