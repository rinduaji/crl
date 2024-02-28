<!DOCTYPE html>
<html lang="en">


<?php

if ($_GET) {
  extract($_GET, EXTR_OVERWRITE);
}
if ($_POST) {
  extract($_POST, EXTR_OVERWRITE);
}
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
session_start();

include_once("./assets/conn.php");

if (isset($username) and isset($password)) {
  //$username = $_POST['username'];
  //$username = addslashes(trim($_POST['username']));
  //$password = MD5($_POST['password']);
  $username1 = mysqli_escape_string($con, $_POST['username']);
  $password1 = MD5(mysqli_escape_string($con, $_POST['password']));

  $query = "SELECT a.user_id,a.`name`,a.username,b.user3 ,b.user5
FROM main_users AS a
INNER JOIN main_users_extended AS b ON a.user_id = b.id WHERE a.username = '$username1' AND a.user_password = '$password1' AND user_active <>'0'";
  $resul = mysqli_query($con, $query);
  $total = mysqli_num_rows($resul);
  if (mysqli_num_rows($resul) == 1) {
    $row = mysqli_fetch_row($resul);
    $_SESSION["user_id"] = $row[0];
    $_SESSION["username"] = $row[2];
    $_SESSION["name"] = $row[1];
    $_SESSION["jabatan"] = $row[3];
    $jb = explode(" ", trim($row[3]));
    $_SESSION["jb"] = $jb[0];
    $_SESSION["area"] = $row[4];
    $_SESSION['LAST_ACTIVITY'] = time();

    header("Location:./admin/html/index.php");
  } else {
    unset($_SESSION["username"]);
?> <script language="JavaScript">
      alert('Username atau Password yang anda masukkan tidak sesuai ...');
      document.location = 'index.php';
    </script>
<?php
  }
}

?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
  <title>TAMARA T2</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" class="sign-in-form" method="POST">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" />
          </div>
          <input type="submit" value="Login" class="btn solid" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h1>TAMARA T2</h1>
          <p>
            Monitoring Quality by TIER2 CRL
          </p>
        </div>
        <img src="img/log2.png" class="image" alt="" />
      </div>
    </div>
  </div>
  
  <script src="app.js"></script>
</body>

</html>