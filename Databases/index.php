<?php
include("cookie_utils.php");
// echo "<br>Test1<br>";
$login_data = check_login(null, false);
// echo "<br>Test2<br>";

if ($login_data != null) {
  if ($login_data["userType"]=="student") {
    header("Location: profile.php");
    exit("Redirecting to the <a href='profile.php'>student profile</a>");
  } else {
    header("Location: professor_profile.php");
    exit("Redirecting to the <a href='professor_profile.php'>professor profile</a>");
  }
}

echo '
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>';
  include("base_css.php");
echo '</style>
  </head>

<body>
  <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <div class="card">
      <div class="card-body">
        <form action="login.php" method="post">
          <div class="mb-3">
            <label for="userID" class="form-label">ΑΜ</label>
            <input type="num" class="form-control" id="userID" name="userID">
          </div>
          <div class="mb-3">
            <label for="userPassword" class="form-label">Κωδικός</label>
            <input type="password" class="form-control" id="userPassword" name="userPassword">
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="userTypeRadio" id="userTypeRadioStudent" value="student" checked>
            <label class="form-check-label" for="userTypeRadioStudent">
              Φοιτητής
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="userTypeRadio" id="userTypeRadioProfessor" value="professor">
            <label class="form-check-label" for="userTypeRadioProfessor">
              Καθηγητής
            </label>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>';
?>