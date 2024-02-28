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

  $sql = "INSERT INTO caring_smooa (ndem, addon, sub_addon, kawasan, witel, datel, sto, channel, tgl_va, umur, group_tti, external_order_id, kkontact, status_sc, order_status_id, order_status_detail, hvc, tgl_upload, `status`) VALUES ";
  $angka = 2;
  for ($i = 2; $i <= count($sheets); $i++) {
    $ndem = $sheets[$i]['A'];
    $addon = $sheets[$i]['B'];
    $sub_addon = $sheets[$i]['C'];
    $kawasan = $sheets[$i]['D'];
    $witel = $sheets[$i]['E'];
    $datel = $sheets[$i]['F'];
    $sto = $sheets[$i]['G'];
    $channel = $sheets[$i]['H'];
    $tgl_va = date("Y-m-d",strtotime($sheets[$i]['I']));
    $umur = $sheets[$i]['J'];
    $group_tti = $sheets[$i]['K'];
    $external_order_id = $sheets[$i]['L'];
    $kkontact = $sheets[$i]['M'];
    $status_sc = $sheets[$i]['N'];
    $order_status_id = $sheets[$i]['O'];
    $order_status_detail = $sheets[$i]['P'];
    $hvc = $sheets[$i]['Q'];
    $tgl_upload = date("Y-m-d");

    $input = 0;
    $angka++;

    if ($ndem != "" and $addon != "") {
      $sql .= "('$ndem', '$addon', '$sub_addon', '$kawasan', '$witel', '$datel', '$sto', '$channel', '$tgl_va', '$umur', '$group_tti', '$external_order_id','$kkontact', '$status_sc', '$order_status_id', '$order_status_detail', '$hvc', '$tgl_upload', '$input')";
      if($sheets[$angka]['A'] != "" and $sheets[$angka]['B'] != "") {
        $sql .= ", ";
      }
    }
  }
  // $sql = substr($sql, 0, -1);
  // var_dump($sql);
  // exit();
  
  mysqli_query($con, $sql) or die(mysqli_error($con));

  unlink($target_dir1);

  header("Location: form_wo_caring_smooa.php?status=succes");
} else {
  header("Location: form_wo_caring_smooa.php?status=gagal");
}
