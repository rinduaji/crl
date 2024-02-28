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

  $sql_agent = "select a.username FROM main_users as a INNER JOIN main_users_extended as b ON a.user_id=b.user_id where b.user3='Agent T2' AND b.user1 IN ('143272','31184') ORDER BY a.username ASC";
  $hasil_agent = mysqli_query($con, $sql_agent);

  $list_agent = array();
  $angka = 0;
  while ($row_agent = mysqli_fetch_assoc($hasil_agent)) {
    $list_agent[$angka] = $row_agent["username"];
    $angka++;
  }

  $sql_jumlah_agent = "select COUNT(*) AS jumlah FROM main_users as a INNER JOIN main_users_extended as b ON a.user_id=b.user_id where b.user3='Agent T2' AND b.user1 IN ('143272','31184') ORDER BY a.username ASC";
  $hasil_jumlah = mysqli_query($con, $sql_jumlah_agent);
  $row_jumlah = mysqli_fetch_assoc($hasil_jumlah);

  $data_array = array();
  $angka = 0;

  if ($total_data >= $row_jumlah["jumlah"]) {
    $modulus_agent = $total_data % $row_jumlah["jumlah"];
    if ($modulus_agent == 0) {
      for ($i = 0; $i < $total_data; $i++) {
        if ($angka == (COUNT($list_agent))) {
          $angka = 0;
        }

        $data_array[$i] = $list_agent[$angka];
        $angka++;
      }
    } else {
      $list_agent_acak = $list_agent;
      $acak = 0;
      shuffle($list_agent_acak);
      for ($i = 0; $i < $total_data; $i++) {
        if ($i > ($total_data - $modulus_agent)) {
          $data_array[$i] = $list_agent_acak[$acak];
          $acak++;
        } else {
          if ($angka == (COUNT($list_agent))) {
            $angka = 0;
          }
          $data_array[$i] = $list_agent[$angka];
          $angka++;
        }
      }
    }
  } else {
    for ($i = 0; $i < $total_data; $i++) {
      $data_array[$i] = $list_agent[$angka];
      $angka++;
    }
  }

  $sql_agent1 = "select a.username FROM main_users as a INNER JOIN main_users_extended as b ON a.user_id=b.user_id where b.user3='Agent T2' AND b.user1 IN ('143272','31184') ORDER BY a.username ASC";
  $hasil_agent1 = mysqli_query($con, $sql_agent1);

  $list_agent1 = array();
  $angka1 = 0;
  while ($row_agent1 = mysqli_fetch_assoc($hasil_agent1)) {
    $list_agent1[$angka1] = $row_agent1["username"];
    $angka1++;
  }

  $total_data1 = count($sheets) - 1;

  $sql_jumlah_agent1 = "select COUNT(*) AS jumlah FROM main_users as a INNER JOIN main_users_extended as b ON a.user_id=b.user_id where b.user3='Agent T2' AND b.user1 IN ('143272','31184') ORDER BY a.username ASC";
  $hasil_jumlah1 = mysqli_query($con, $sql_jumlah_agent1);
  $row_jumlah1 = mysqli_fetch_assoc($hasil_jumlah1);

  $data_array1 = array();
  $angka1 = 0;

  if ($total_data1 >= $row_jumlah1["jumlah"]) {
    $modulus_agent1 = $total_data1 % $row_jumlah1["jumlah"];
    if ($modulus_agent1 == 0) {
      for ($i = 0; $i < $total_data1; $i++) {
        if ($angka1 == (COUNT($list_agent1))) {
          $angka1 = 0;
        }

        $data_array1[$i] = $list_agent1[$angka1];
        $angka1++;
      }
    } else {
      $list_agent_acak1 = $list_agent1;
      $acak1 = 0;
      shuffle($list_agent_acak1);
      for ($i = 0; $i < $total_data1; $i++) {
        if ($i > ($total_data1 - $modulus_agent1)) {
          $data_array1[$i] = $list_agent_acak1[$acak1];
          $acak1++;
        } else {
          if ($angka1 == (COUNT($list_agent1))) {
            $angka1 = 0;
          }
          $data_array1[$i] = $list_agent1[$angka1];
          $angka1++;
        }
      }
    }
  } else {
    for ($i = 0; $i < $total_data1; $i++) {
      $data_array1[$i] = $list_agent1[$angka1];
      $angka1++;
    }
  }

  $sql = "INSERT INTO hasil_survey (kawasan, c_witel, ndem, ndem_ps, ndem_cabut, nd_speedy, addon, item, item_ps, item_cabut, kcontact, tgl_ps, tgl_cabut,
          umur, channel_cabut, no_hp, kcontact_ps, kcontact_cabut, timsurvey, status, witel, tgl_upload, input, login, upd) VALUES";
  $angka_login = 0;
  for ($i = 2; $i <= count($sheets); $i++) {
    $kawasan = $sheets[$i]['A'];
    $c_witel = $sheets[$i]['B'];
    $ndem = $sheets[$i]['C'];
    $ndem_ps = $sheets[$i]['D'];
    $ndem_cabut = $sheets[$i]['E'];
    $nd_speedy = $sheets[$i]['F'];
    $addon = $sheets[$i]['G'];
    $item = $sheets[$i]['H'];
    $item_ps = $sheets[$i]['I'];
    $item_cabut = $sheets[$i]['J'];
    $kcontact = $sheets[$i]['K'];
    $tgl_ps = date("Y-m-d H:i:s", strtotime($sheets[$i]['L']));
    $tgl_cabut = date("Y-m-d H:i:s", strtotime($sheets[$i]['M']));
    $umur = $sheets[$i]['N'];
    $channel_cabut = $sheets[$i]['O'];
    $no_hp = $sheets[$i]['P'];
    $kcontact_ps = $sheets[$i]['Q'];
    $kcontact_cabut = $sheets[$i]['R'];
    $timsurvey = $sheets[$i]['S'];
    $status = $sheets[$i]['T'];
    $witel = $sheets[$i]['U'];
    $tgl_upload = date("Y-m-d H:i:s");
    $input = 0;

    if ($kawasan != "" and $c_witel != "") {
      $sql .= " ('$kawasan', '$c_witel', '$ndem', '$ndem_ps', '$ndem_cabut', '$nd_speedy', '$addon', '$item', '$item_ps', '$item_cabut', '$kcontact', '$tgl_ps',
     '$tgl_cabut', '$umur', '$channel_cabut', '$no_hp', '$kcontact_ps', '$kcontact_cabut', '$timsurvey', '$status', '$witel', '$tgl_upload', '$input', '$data_array[$angka_login]', '$data_array1[$angka_login]'),";
    }
    $angka_login++;
  }

  $sql = substr($sql, 0, -1);
  
  mysqli_query($con, $sql) or die(mysqli_error($con));

  unlink($target_dir1);

  header("Location: form_survey.php?status=succes");
} else {
  header("Location: form_survey.php?status=gagal");
}
