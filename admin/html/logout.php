<?php
session_start();

unset($_SESSION["username"]);
unset($_SESSION["jabatan"]);
session_destroy();
header("Location: ../../index.php");
?>