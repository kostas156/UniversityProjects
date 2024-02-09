<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Εισαγωγή Φοιτητή</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.css">

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.js"></script>


<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
	font-family: "Times New Roman", Times, serif;
}
body {
	background-color: #FFFACE;
}
.style3 {font-size: 9px}
-->

<?php
  include('base_css.php');
?>

</style>
<script type='text/JavaScript' src='files/scw.js'></script>
<script language="JavaScript" src="files/gen_validatorv31.js" type="text/javascript"></script>
</head>

<body>
  <header id="header">
        <a href="profile.php" class="logo">UniSystem</a>
        <div id="toggle"></div>
        <nav id="navbar">
            <ul>
                <li><a href="admin_student_table.php" class="active">Φοιτητές</a></li>
                <li><a href="">Προσθήκη Νέου</a></li>
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

<p class="pag_title" align="center"><strong><font size="+4">Προσθήκη Φοιτητή</font></strong><br></p>

<center>
  <table width="400" border="0">
  </table>
  <p align="center">&nbsp;</p>
</center>
    <form method="POST" action="submit_insert.php"  name="myform">
      <center>
      <table>
        <tr>
        <td>
      <div align="center"><strong>Όνομα: </strong> <input name="firstname" type="text" size="50"/></div><br>
      <div align="center"><strong>Επώνυμο: </strong> <input name="lastname" type="text" size="50"/></div><br>
      <div align="center"><strong>E-mail: </strong> <input name="email" type="text" size="50"/></div><br>
      <div align="center"><strong>Διεύθυνση: </strong> <input name="address" type="text" size="50"/></div><br>
      <div align="center"><strong>Τηλέφωνο: </strong> <input name="phone" type="text" size="50"/></div><br>

      <center>
        <table border="0">
          <tr>
            <td width="380" valign="top"><div align="left"><strong>Ιδιότητα στο Δ.Π.Θ.:</strong> <br />
                <input type="radio" name="RadioWork" value="Department of Chemical Engineering" id="RadioGroup5_0" />
                <label>Τμήμα Χημικών Μηχανικών</label>
                <br />
                <input type="radio" name="RadioWork" value="Department of Electrical Engineering" id="RadioGroup5_1" />
                <label>Τμήμα Ηλεκτρολόγων Μηχανικών</label>
                <br />
                <input type="radio" name="RadioWork" value="Department of Greek Philology" id="RadioGroup5_2" />
                <label>Τμήμα Ελληνικής Φιλολογίας</label>
                <br />
                <input type="radio" name="RadioWork" value="Department of Mechanical Engineering" id="RadioGroup5_3" />
                <label>Τμήμα Μηχανολόγων Μηχανικών</label>
                <br />
                <input type="radio" name="RadioWork" value="Department of Medicine" id="RadioGroup5_4" />
                <label>Τμήμα Ιατρικής</label>
                <br />
            </div></td>
          </tr>
        </table>
        </center>
        
        <br/>
        <center>
		    <table border="0">
          <tr>
            <td width="620" valign="top"><div align="center"><strong>Τμήμα: </strong>
                <select class="select" name="Tmhma">
                <option value="">Επιλέξτε...</option>
                <option value="Main Branch of Chemical Engineering">Main Branch of Chemical Engineering</option>
                <option value="Electrical Energy">Electrical Energy</option>
                <option value="Electronics">Electronics</option>
                <option value="Main Branch of Electrical Engineering">Main Branch of Electrical Engineering</option>
                <option value="Telecommunications">Telecommunications</option>
                <option value="Main Branch of Greek Philology">Main Branch of Greek Philology</option>
                <option value="Classics">Classics</option>
                <option value="Linguistics">Linguistics</option>
                <option value="Medieval and Modern Greek Philology">Medieval and Modern Greek Philology</option>
                <option value="Main Branch of Mechanical Engineering">Main Branch of Mechanical Engineering</option>
                <option value="Manufacturing Technology">Manufacturing Technology</option>
                <option value="Nuclear Engineering">Nuclear Engineering</option>
                <option value="Thermal Engineering">Thermal Engineering</option>
                <option value="Main Branch of Medicine">Main Branch of Medicine</option>
              </select>
            </div>
            </td>

          </tr>
        </table>
        </center>
        </td>
        </tr>
        </table>
        <br/><br/>
        <table width="200" border="0">
          <tr>
            <td width="90"><div align="center">
              <input type="submit" value="Εισαγωγή" />
            </div></td>
            <td width="100"><div align="center">
              <input type="reset" value="Καθαρισμός" />
            </div></td>
          </tr>
        </table>
    </center>
</form>
<script language="JavaScript" type="text/javascript">
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
  frmvalidator.EnableMsgsTogether();
  frmvalidator.addValidation("firstname","req","Συμπληρώστε πρώτα το πεδίο 'Όνομα' !");
  frmvalidator.addValidation("lastname","req","Συμπληρώστε πρώτα το πεδίο 'Επώνυμο' !");
  frmvalidator.addValidation("email","req","Συμπληρώστε πρώτα το πεδίο 'E-mail' !");
  frmvalidator.addValidation("address","req","Συμπληρώστε πρώτα το πεδίο 'Διεύθυνση' !");
  frmvalidator.addValidation("phone","req","Συμπληρώστε πρώτα το πεδίο 'Τηλέφωνο' !");
  frmvalidator.addValidation("RadioFylo","selone_radio","Επιλέξτε Φύλο!");
  frmvalidator.addValidation("Tmhma","dontselect=0","Επιλέξτε Τμήμα!");
      </script>
</body>
</html>
