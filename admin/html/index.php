<?php
include("sidebar.php");
?>
<?php
$data_login = $_SESSION['username'];
$year = date("Y");
$month = date("m");
$array_bulan = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

$sql_ps_cabut = "SELECT id, kawasan, c_witel, witel, ndem, ndem_ps, ndem_cabut, nd_speedy, addon, item, item_ps, item_cabut, kcontact, 
tgl_ps, tgl_cabut, umur, channel_cabut, no_hp, kcontact_ps, kcontact_cabut, timsurvey, status, lup FROM hasil_survey WHERE input='1' AND MONTH(lup)='$month' AND YEAR(lup)='$year'";
$sql_hasil_ps_cabut = mysqli_query($con, $sql_ps_cabut);
$total_ps_cabut = mysqli_num_rows($sql_hasil_ps_cabut);

$sql_survey_tam = "SELECT lup, login, addon, nd_speedy, status, upd, lup2 FROM hasil_survey WHERE MONTH(lup2)='$month' AND YEAR(lup2)='$year' AND input='2'";
$sql_hasil_survey_tam = mysqli_query($con, $sql_survey_tam);
$total_survey_tam = mysqli_num_rows($sql_hasil_survey_tam);


$sql_tam_agree = "SELECT id, lup, tgl, upd, nama, login, fastel, nama_dm, jenis, tlp, site, status_t2, alasan, rekom_t2 FROM app_tam_t2 WHERE status='Contacted' AND kategori='Agree' AND valid='Valid' AND MONTH(tgl)='$month' AND YEAR(tgl)='$year'";
$sql_hasil_tam_agree = mysqli_query($con, $sql_tam_agree);
$total_tam_agree = mysqli_num_rows($sql_hasil_tam_agree);

$sql_tam_decline = "SELECT id, lup, tgl, upd, nama, login, fastel, nama_dm, jenis, tlp, site, status_t2, alasan, rekom_t2, reason FROM app_tam_t2 WHERE status='Contacted' AND kategori='Not Agree' AND MONTH(tgl)='$month' AND YEAR(tgl)='$year'";
$sql_hasil_tam_decline = mysqli_query($con, $sql_tam_decline);
$total_tam_decline = mysqli_num_rows($sql_hasil_tam_decline);

$sql_login = "SELECT * FROM main_users_extended AS a INNER JOIN main_users AS b ON a.user_id = b.user_id WHERE a.user1='$data_login'";
$sql_hasil_login = mysqli_query($con, $sql_login);
$row_login = mysqli_fetch_array($sql_hasil_login);
$username = $row_login['username'];
$tanggal_awal = date("Y-m-d") . " 00:00:00";
$tanggal_akhir = date("Y-m-d") . " 23:59:59";

$sql_detail1 = "select * FROM hasil_survey WHERE login='$username' AND status='Cabut' AND input='1' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
$sql_detail2 = "select * FROM hasil_survey WHERE login='$username' AND status='ps' AND input='1' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
$sql_detail3 = "select * FROM hasil_survey WHERE upd='$username' AND input='2' AND lup2 BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
$sql_detail4 = "select * FROM app_tam_t2 WHERE status='Contacted' AND kategori='Agree' AND valid='Valid' AND upd='$username' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
$sql_detail5 = "select * FROM app_tam_t2 WHERE status='Contacted' AND kategori='Not Agree' AND upd='$username' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
$sql_detail6 = "select * FROM vr147 WHERE input='3' AND upd='$username' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";

$sql_hasil1 = mysqli_query($con, $sql_detail1);
$total1 = mysqli_num_rows($sql_hasil1);

$sql_hasil2 = mysqli_query($con, $sql_detail2);
$total2 = mysqli_num_rows($sql_hasil2);

$sql_hasil3 = mysqli_query($con, $sql_detail3);
$total3 = mysqli_num_rows($sql_hasil3);

$sql_hasil4 = mysqli_query($con, $sql_detail4);
$total4 = mysqli_num_rows($sql_hasil4);

$sql_hasil5 = mysqli_query($con, $sql_detail5);
$total5 = mysqli_num_rows($sql_hasil5);

$sql_hasil6 = mysqli_query($con, $sql_detail6);
$total6 = mysqli_num_rows($sql_hasil6);

?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
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
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Semangat Pagi <?= $_SESSION['name'] ?>!</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                            </li>
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
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <h4>Data Bulan <?= $array_bulan[$month - 1] ?></h4>
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?= $total_ps_cabut ?></h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Survey PS dan Cabut</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="check-square"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><?= $total_survey_tam ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Tapping Survey
                            </h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="check-square"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium"><?= $total_tam_agree ?></h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Tapping Approve</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="check-square"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium"><?= $total_tam_decline ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Tapping Decline</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="check-square"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($_SESSION['jabatan'] == "Agent T2") {
        ?>
            <h3>Total Tapping : <strong><?= date("l, d F Y") ?></strong></h3><br>
            <!-- Container fluid  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="card-group">
                            <div class="card border-right" style="background-color:  #1f3fdb; color:white;">
                                <div class="card-body">
                                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                                        <div>
                                            <h2 class="mb-1 font-weight-medium"><?= $total1 ?></h2><br>
                                            <h3 class="font-weight-normal mb-0 w-100 text-truncate">Survey Cabut Closed</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Container fluid  -->
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card-group">
                            <div class="card border-right" style="background-color:  #1f3fdb; color:white;">
                                <div class="card-body">
                                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                                        <div>
                                            <h2 class="mb-1 font-weight-medium"><?= $total2 ?></h2><br>
                                            <h3 class="font-weight-normal mb-0 w-100 text-truncate">Survey PS Closed</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Container fluid  -->
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card-group">
                            <div class="card border-right" style="background-color:  #1f3fdb; color:white;">
                                <div class="card-body">
                                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                                        <div>
                                            <h2 class="mb-1 font-weight-medium"><?= $total3 ?></h2><br>
                                            <h3 class="font-weight-normal mb-0 w-100 text-truncate">Tapp Survey Closed</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Container fluid  -->
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card-group">
                            <div class="card border-right" style="background-color:  #1f3fdb; color:white;">
                                <div class="card-body">
                                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                                        <div>
                                            <h2 class="mb-1 font-weight-medium"><?= $total4 ?></h2><br>
                                            <h3 class="font-weight-normal mb-0 w-100 text-truncate">Approve Closed</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Container fluid  -->
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card-group">
                            <div class="card border-right" style="background-color:  #1f3fdb; color:white;">
                                <div class="card-body">
                                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                                        <div>
                                            <h2 class="mb-1 font-weight-medium"><?= $total5 ?></h2><br>
                                            <h3 class="font-weight-normal mb-0 w-100 text-truncate">Decline Closed</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Container fluid  -->
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card-group">
                            <div class="card border-right" style="background-color:  #1f3fdb; color:white;">
                                <div class="card-body">
                                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                                        <div>
                                            <h2 class="mb-1 font-weight-medium"><?= $total6 ?></h2><br>
                                            <h3 class="font-weight-normal mb-0 w-100 text-truncate">VR 147 Closed</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Container fluid  -->
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Grafik Tahun <?= date("Y") ?></h4>
                                <ul class="list-inline text-center mt-5">
                                    <li class="list-inline-item">
                                        <h5><i class="fa fa-circle mr-1 text-cyan"></i>Survey Cabut</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5><i class="fa fa-circle mr-1 text-info"></i>Survey PS</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5><i class="fa fa-circle mr-1 text-danger"></i>Tapping Survey</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5><i class="fa fa-circle mr-1 text-muted"></i>Tapping Approve</h5>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5><i class="fa fa-circle mr-1 text-success"></i>Tapping Decline</h5>
                                    </li>
                                </ul>
                                <div id="morris-bar-chart" style="width:100%; height:500px"></div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
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
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <?php
            if ($_SESSION['jabatan'] == "Supervisor TAM DCS" or $_SESSION['jabatan'] == "Duktek") {
            ?>
                <h3>Total Tapping : <strong><?= date("l, d F Y") ?></strong></h3><br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Survey Cabut Closed</h4>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-primary">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Nama Agent</th>
                                                    <th scope="col">Total Survey</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $sql_tabel_survey_cabut = "select b.username, b.name, COUNT(*) AS total FROM hasil_survey AS a INNER JOIN main_users AS b ON a.login = b.username INNER JOIN main_users_extended AS c ON b.username = c.user1 WHERE a.input='1' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND a.status = 'Cabut' GROUP BY a.login";
                                                $sql_tabel_survey_cabut1 = mysqli_query($con, $sql_tabel_survey_cabut);
                                                $total_tabel_survey_cabut1 = mysqli_num_rows($sql_tabel_survey_cabut1);

                                                while ($row_tabel_sc = mysqli_fetch_assoc($sql_tabel_survey_cabut1)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++ ?></th>
                                                        <td><?= $row_tabel_sc['username'] ?></td>
                                                        <td><?= $row_tabel_sc['name'] ?></td>
                                                        <td><?= $row_tabel_sc['total'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Survey Pasang Closed</h4>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-primary">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Nama Agent</th>
                                                    <th scope="col">Total Survey</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $sql_tabel_survey_cabut = "select b.username, b.name, COUNT(*) AS total FROM hasil_survey AS a INNER JOIN main_users AS b ON a.login = b.username INNER JOIN main_users_extended AS c ON b.username = c.user1 WHERE a.input='1' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND a.status = 'ps' GROUP BY a.login";
                                                $sql_tabel_survey_cabut1 = mysqli_query($con, $sql_tabel_survey_cabut);
                                                $total_tabel_survey_cabut1 = mysqli_num_rows($sql_tabel_survey_cabut1);

                                                while ($row_tabel_sc = mysqli_fetch_assoc($sql_tabel_survey_cabut1)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++ ?></th>
                                                        <td><?= $row_tabel_sc['username'] ?></td>
                                                        <td><?= $row_tabel_sc['name'] ?></td>
                                                        <td><?= $row_tabel_sc['total'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tapping Survey Closed</h4>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-primary">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Nama Agent</th>
                                                    <th scope="col">Total Tapping</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $sql_tabel_survey_cabut = "select b.username, b.name, COUNT(*) AS total FROM hasil_survey AS a INNER JOIN main_users AS b ON a.upd = b.username INNER JOIN main_users_extended AS c ON b.username = c.user1 WHERE a.input='2' AND lup2 BETWEEN '$tanggal_awal' AND '$tanggal_akhir' GROUP BY a.upd";
                                                $sql_tabel_survey_cabut1 = mysqli_query($con, $sql_tabel_survey_cabut);
                                                $total_tabel_survey_cabut1 = mysqli_num_rows($sql_tabel_survey_cabut1);

                                                while ($row_tabel_sc = mysqli_fetch_assoc($sql_tabel_survey_cabut1)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++ ?></th>
                                                        <td><?= $row_tabel_sc['username'] ?></td>
                                                        <td><?= $row_tabel_sc['name'] ?></td>
                                                        <td><?= $row_tabel_sc['total'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Approve Closed</h4>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-primary">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Nama Agent</th>
                                                    <th scope="col">Total Tapping</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $sql_tabel_survey_cabut = "select b.username, b.name, COUNT(*) AS total FROM app_tam_t2 AS a INNER JOIN main_users AS b ON a.upd = b.username INNER JOIN main_users_extended AS c ON b.username = c.user1 WHERE a.status='Contacted' AND a.kategori='Agree' AND a.valid='Valid' AND a.lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir' GROUP BY a.upd";
                                                $sql_tabel_survey_cabut1 = mysqli_query($con, $sql_tabel_survey_cabut);
                                                $total_tabel_survey_cabut1 = mysqli_num_rows($sql_tabel_survey_cabut1);

                                                while ($row_tabel_sc = mysqli_fetch_assoc($sql_tabel_survey_cabut1)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++ ?></th>
                                                        <td><?= $row_tabel_sc['username'] ?></td>
                                                        <td><?= $row_tabel_sc['name'] ?></td>
                                                        <td><?= $row_tabel_sc['total'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Decline Closed</h4>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-primary">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Nama Agent</th>
                                                    <th scope="col">Total Tapping</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $sql_tabel_survey_cabut = "select b.username, b.name, COUNT(*) AS total FROM app_tam_t2 AS a INNER JOIN main_users AS b ON a.upd = b.username INNER JOIN main_users_extended AS c ON b.username = c.user1 WHERE a.status='Contacted' AND a.kategori='Not Agree' AND a.lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir' GROUP BY a.upd";
                                                $sql_tabel_survey_cabut1 = mysqli_query($con, $sql_tabel_survey_cabut);
                                                $total_tabel_survey_cabut1 = mysqli_num_rows($sql_tabel_survey_cabut1);

                                                while ($row_tabel_sc = mysqli_fetch_assoc($sql_tabel_survey_cabut1)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++ ?></th>
                                                        <td><?= $row_tabel_sc['username'] ?></td>
                                                        <td><?= $row_tabel_sc['name'] ?></td>
                                                        <td><?= $row_tabel_sc['total'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">VR147 Closed</h4>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-primary">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Nama Agent</th>
                                                    <th scope="col">Total Tapping</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $sql_tabel_survey_cabut = "select b.username, b.name, COUNT(*) AS total FROM vr147 AS a INNER JOIN main_users AS b ON a.upd = b.username INNER JOIN main_users_extended AS c ON b.username = c.user1 WHERE a.input='3' AND a.lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir' GROUP BY a.upd";
                                                $sql_tabel_survey_cabut1 = mysqli_query($con, $sql_tabel_survey_cabut);
                                                $total_tabel_survey_cabut1 = mysqli_num_rows($sql_tabel_survey_cabut1);

                                                while ($row_tabel_sc = mysqli_fetch_assoc($sql_tabel_survey_cabut1)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++ ?></th>
                                                        <td><?= $row_tabel_sc['username'] ?></td>
                                                        <td><?= $row_tabel_sc['name'] ?></td>
                                                        <td><?= $row_tabel_sc['total'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }

            $total_cabut = array();

            for ($i = 1; $i <= 12; $i++) {
                $sql_cabut = "SELECT id, kawasan, c_witel, witel, ndem_ps, ndem_cabut, nd_speedy, addon, item_ps, item_cabut,  
            tgl_ps, tgl_cabut, umur, channel_cabut, no_hp, kcontact_ps, kcontact_cabut, timsurvey, status, login, lup, channel, nama_pelanggan, 
            relasi, cabut_addon, alasan_cabut, detail1, detail2, kisaran_harga, kualitas_produk, penyampaian, alasan_ps, saran, proses_cabut
            FROM hasil_survey WHERE input='1' AND status='Cabut' AND MONTH(lup)='$i' AND YEAR(lup)='$year'";
                $sql_hasil_cabut = mysqli_query($con, $sql_cabut);
                $total_cabut[$i] = mysqli_num_rows($sql_hasil_cabut);
            }

            for ($i = 1; $i <= 12; $i++) {
                $sql_ps = "SELECT id, kawasan, c_witel, ndem, ndem_ps, nd_speedy, addon, item, item_ps, kcontact, 
                                    tgl_ps, no_hp, kcontact_ps, timsurvey, status, login, lup, channel, aktif, info_aktif,  
									kualitas_produk, penyampaian, mengerti_produk, harga, alasan_ps, tepat_waktu, rapi, saran FROM 
                                    hasil_survey WHERE input='1' AND status='PS' AND MONTH(lup)='$i' AND YEAR(lup)='$year'";
                $sql_hasil_ps = mysqli_query($con, $sql_ps);
                $total_ps[$i] = mysqli_num_rows($sql_hasil_ps);
            }

            for ($i = 1; $i <= 12; $i++) {
                $sql_tam = "SELECT lup, login, addon, nd_speedy, status, hasil_tappingsurvey, upd, lup2 FROM hasil_survey WHERE input='2' AND MONTH(lup2)='$i' AND YEAR(lup2)='$year'";
                $sql_hasil_tam = mysqli_query($con, $sql_tam);
                $total_tam[$i] = mysqli_num_rows($sql_hasil_tam);
            }

            for ($i = 1; $i <= 12; $i++) {
                $sql_agree = "SELECT id, lup, tgl, upd, nama, login, fastel, nama_dm, jenis, tlp, site, status_t2, alasan, rekom_t2 FROM app_tam_t2 WHERE status='Contacted' AND kategori='Agree' AND valid='Valid' AND MONTH(lup)='$i' AND YEAR(lup)='$year'";
                $sql_hasil_agree = mysqli_query($con, $sql_agree);
                $total_agree[$i] = mysqli_num_rows($sql_hasil_agree);
            }

            for ($i = 1; $i <= 12; $i++) {
                $sql_decline = "SELECT id, lup, tgl, upd, nama, login, fastel, nama_dm, jenis, tlp, site, status_t2, alasan, rekom_t2, reason FROM app_tam_t2 WHERE status='Contacted' AND kategori='Not Agree' AND MONTH(lup)='$i' AND YEAR(lup)='$year'";
                $sql_hasil_decline = mysqli_query($con, $sql_decline);
                $total_decline[$i] = mysqli_num_rows($sql_hasil_decline);
            }
            ?>
            <?php
            include("footer.php");
            ?>
            <script type="text/javascript">
                setInterval(function() {
                    window.location.reload();
                }, 600000);

                $(function() {
                    "use strict";
                    Morris.Bar({
                        element: 'morris-bar-chart',
                        data: [{
                            y: 'January',
                            a: <?= $total_cabut[1] ?>,
                            b: <?= $total_ps[1] ?>,
                            c: <?= $total_tam[1] ?>,
                            d: <?= $total_agree[1] ?>,
                            e: <?= $total_decline[1] ?>
                        }, {
                            y: 'February',
                            a: <?= $total_cabut[2] ?>,
                            b: <?= $total_ps[2] ?>,
                            c: <?= $total_tam[2] ?>,
                            d: <?= $total_agree[2] ?>,
                            e: <?= $total_decline[2] ?>
                        }, {
                            y: 'March',
                            a: <?= $total_cabut[3] ?>,
                            b: <?= $total_ps[3] ?>,
                            c: <?= $total_tam[3] ?>,
                            d: <?= $total_agree[3] ?>,
                            e: <?= $total_decline[3] ?>
                        }, {
                            y: 'April',
                            a: <?= $total_cabut[4] ?>,
                            b: <?= $total_ps[4] ?>,
                            c: <?= $total_tam[4] ?>,
                            d: <?= $total_agree[4] ?>,
                            e: <?= $total_decline[4] ?>
                        }, {
                            y: 'May',
                            a: <?= $total_cabut[5] ?>,
                            b: <?= $total_ps[5] ?>,
                            c: <?= $total_tam[5] ?>,
                            d: <?= $total_agree[5] ?>,
                            e: <?= $total_decline[5] ?>
                        }, {
                            y: 'June',
                            a: <?= $total_cabut[6] ?>,
                            b: <?= $total_ps[6] ?>,
                            c: <?= $total_tam[6] ?>,
                            d: <?= $total_agree[6] ?>,
                            e: <?= $total_decline[6] ?>
                        }, {
                            y: 'July',
                            a: <?= $total_cabut[7] ?>,
                            b: <?= $total_ps[7] ?>,
                            c: <?= $total_tam[7] ?>,
                            d: <?= $total_agree[7] ?>,
                            e: <?= $total_decline[7] ?>
                        }, {
                            y: 'August',
                            a: <?= $total_cabut[8] ?>,
                            b: <?= $total_ps[8] ?>,
                            c: <?= $total_tam[8] ?>,
                            d: <?= $total_agree[8] ?>,
                            e: <?= $total_decline[8] ?>
                        }, {
                            y: 'September',
                            a: <?= $total_cabut[9] ?>,
                            b: <?= $total_ps[9] ?>,
                            c: <?= $total_tam[9] ?>,
                            d: <?= $total_agree[9] ?>,
                            e: <?= $total_decline[9] ?>
                        }, {
                            y: 'October',
                            a: <?= $total_cabut[10] ?>,
                            b: <?= $total_ps[10] ?>,
                            c: <?= $total_tam[10] ?>,
                            d: <?= $total_agree[10] ?>,
                            e: <?= $total_decline[10] ?>
                        }, {
                            y: 'November',
                            a: <?= $total_cabut[11] ?>,
                            b: <?= $total_ps[11] ?>,
                            c: <?= $total_tam[11] ?>,
                            d: <?= $total_agree[11] ?>,
                            e: <?= $total_decline[11] ?>
                        }, {
                            y: 'December',
                            a: <?= $total_cabut[12] ?>,
                            b: <?= $total_ps[12] ?>,
                            c: <?= $total_tam[12] ?>,
                            d: <?= $total_agree[12] ?>,
                            e: <?= $total_decline[12] ?>
                        }],
                        xkey: 'y',
                        ykeys: ['a', 'b', 'c', 'd', 'e'],
                        labels: ['Survey Cabut', 'Survey PS', 'Tapping Survey', 'Tapping Approve', 'Tapping Decline'],
                        barColors: ['#01caf1', '#5f76e8', 'red', '#7D858C', 'green'],
                        hideHover: 'auto',
                        gridLineColor: '#eef0f2',
                        resize: true,
                        continuousLine: false
                    });
                });
            </script>