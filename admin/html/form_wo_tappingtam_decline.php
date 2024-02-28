<?php
include("sidebar.php");

?>
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Form TAPPING WO T1</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Form </a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Decline</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table1" class="display tabel1">
                                <thead class="thead-purple">
                                    <tr>
                                        <th>NO</th>
                                        <th>TGL</th>
                                        <th>LOGIN</th>
                                        <th>NAMA AGENT</th>
                                        <th>FASTEL</th>
                                        <th>NAMA PELANGGAN</th>
                                        <th>ADD ON</th>
										<th>KATEGORI</th>
										<th>REASON</th>
                                        <th>NO HP</th>
                                        <th>SITE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $upd = $_SESSION['username'];
                                    $no = 1;
                                    $i = 0;
                                    $tanggal_awal = date("Y-m-d") . " 14:00:00";
                                    $tanggal_akhir = date("Y-m-d") . " 23:59:59";
                                    $yesterday_awal = date("Y-m-d H:i:s", strtotime($tanggal_awal . "-1 days"));
                                    $yesterday_akhir = date("Y-m-d H:i:s", strtotime($tanggal_akhir . "-1 days"));

                                    $array_agent_t2 = array();
                                    $array_fastel = array();
                                    $sql_agent_t2 = "select a.username from main_users as a INNER JOIN main_users_extended as b ON a.user_id=b.user_id where b.user3='Agent T2' AND b.user1 <> '143272' AND b.user1 <> '31184' ORDER BY a.username ASC";
                                    $sql_hasil_agent_t2 = mysqli_query($con, $sql_agent_t2);
                                    while ($row_agent = mysqli_fetch_array($sql_hasil_agent_t2)) {
                                        $array_agent_t2[$i] = $row_agent['username'];
                                        $i++;
                                    }
  
                                    $i = 0;
                                    $sql_fastel = "select fastel, upd from app_tam_t2 where tgl between '$yesterday_awal' and '$yesterday_akhir' AND `status`='Contacted' AND kategori = 'Not Agree' AND upd='$upd' ORDER BY tgl ASC";
                                    $sql_hasil_fastel = mysqli_query($con, $sql_fastel);
                                    $total_fastel = mysqli_num_rows($sql_hasil_fastel);
                                    while ($row_fastel = mysqli_fetch_array($sql_hasil_fastel)) {
                                        $array_fastel['fastel'][$i] = $row_fastel['fastel'];
                                        $array_fastel['upd'][$i] = $row_fastel['upd'];
                                        $i++;
                                    }

                                    $i = 0;
                                    $bagi = 0;
                                    include("../../assets/conn2.php");

                                    $sql = "SELECT a.id, a.tgl, a.login, b.user2, a.fastel, a.nama_dm, a.jenis, a.kategori, a.reason, a.tlp, b.user5, a.kategori FROM app_tam_data2 AS a INNER JOIN cc147_main_users_extended AS b ON a.login = b.user1
                                           WHERE  a.tgl between '$yesterday_awal' and '$yesterday_akhir' AND a.`status`='Contacted' AND a.kategori = 'Not Agree' AND b.user1 <> '143272' AND b.user1 <> '31184' AND b.user1 <> '92734' and a.jenis<>'SMOOA' and a.jenis<>'PSB IH' and a.jenis<>'P2P' 
                                           ORDER BY a.tgl ASC limit 250";
                                    $sql_hasil = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($sql_hasil);
                                    
                                    if($upd != '143272') {
                                        if($upd != '31184') {
                                    if ($total > 0)
                                        while ($row = mysqli_fetch_array($sql_hasil)) {
                                            $check = 0;
                                            $link_tapping = $row['kategori'] == 'Not Agree' ? 'tapping_decline.php' : 'tapping_agree.php';
                                            $tanggal_cabut = date("Y-m-d", strtotime($row['tgl_cabut'])) == '1970-01-01' ? '' : date("l, d F Y", strtotime($row['tgl_ps']));
                                            if ($upd == $array_agent_t2[$i]) {
                                                if ($total_fastel > 0) {
                                                    for ($j = 0; $j < $total_fastel; $j++) {
                                                        if($row['fastel'] == $array_fastel['fastel'][$j] AND $upd == $array_fastel['upd'][$j]){
                                                            $check++;
                                                        }
                                                    }
                                                }
                                                if($check == 0) {
                                    ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= date("d/m/Y", strtotime($row['tgl'])) ?></td>
                                                <td><?= $row['login'] ?></td>
                                                <td><?= $row['user2'] ?></td>
                                                <td><?= $row['fastel'] ?></td>
                                                <td><?= $row['nama_dm'] ?></td>
                                                <td><?= $row['jenis'] ?></td>
							<td><?= $row['kategori'] ?></td>
							<td><?= $row['reason'] ?></td>
                                                <td><?= $row['tlp'] ?></td>
                                                <td><?= $row['user5'] ?></td>
                                                <td><a href="<?= $link_tapping . '?id=' . $row['id'] ?>" class="btn btn-primary">Tapping</a></td>
                                            </tr>
                                        <?php
                                                $no++;
                                                }
                                            }
                                            $bagi++;
                                            if ($bagi % 50 == 0) {
                                                $bagi = 0;
                                                $i++;
                                            }
                                        }
                                    else {
                                        ?>
                                        <tr>
                                            <th colspan="23">
                                                <center>Data Tidak Ditemukan</center>
                                            </th>
                                        </tr>
                                    <?php
                                    }
                                }
                                else {
                                    ?>
                                    <tr>
                                        <th colspan="23">
                                            <center>Data Tidak Ditemukan</center>
                                        </th>
                                    </tr>
                                <?php
                                }
                                }
                                else {
                                    ?>
                                    <tr>
                                        <th colspan="23">
                                            <center>Data Tidak Ditemukan</center>
                                        </th>
                                    </tr>
                                <?php
                                }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <?php
    include("footer.php");
    ?>