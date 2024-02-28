<?php
session_start();
include("../../assets/conn.php");

if ($_POST['upload'] != "") {
  require('../../assets/PHPOffice/Classes/PHPExcel.php');
  require('../../assets/PHPOffice/Classes/PHPExcel/IOFactory.php');

  //upload data excel kedalam folder uploads
  $target_dir1 = "../../uploads/" . basename($_FILES['excel1']['name']);

  // var_dump($target_dir1);
  // header("Location: ../../uploads/".basename($_FILES['excel1']['name']));
  move_uploaded_file($_FILES['excel1']['tmp_name'], $target_dir1);

  $load = PHPExcel_IOFactory::load($target_dir1);
  $sheets = $load->getActiveSheet()->toArray(null, true, true, true);

  $total_data = count($sheets) - 1;

  $sql = "INSERT INTO app_tam_t2 (tgl, nama, jenis, fastel, tlp, input, upd, input2) VALUES";

  for ($i = 2; $i <= count($sheets); $i++) {
    $tgl = date("Y-m-d H:i:s", strtotime($sheets[$i]['A']));
    $nama = $sheets[$i]['B'];
    $jenis = $sheets[$i]['C'];
    $fastel = $sheets[$i]['D'];
    $tlp = $sheets[$i]['E'];
	$input = $sheets[$i]['F'];
	$upd = $sheets[$i]['G'];
    $input2 = 2;

    if ($tgl != "" and $nama != "") {
      $sql .= " ('$tgl', '$nama', '$jenis', '$fastel', '$tlp', '$input', '$upd','$input2') ";
      if($i != count($sheets)) {
        $sql .= ", ";
      }
    }
  }

  $sql = substr($sql, 0, -1);

  mysqli_query($con, $sql) or die(mysqli_error($con));

  unlink($target_dir1);

  header("Location: form_survey_tam.php?status=succes");
} else {
  header("Location: form_survey_tam.php?status=gagal");
}
