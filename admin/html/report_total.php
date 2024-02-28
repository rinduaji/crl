<?php
include("sidebar.php");
if ($_GET) {
    extract($_GET, EXTR_OVERWRITE);
}
if ($_POST) {
    extract($_POST, EXTR_OVERWRITE);
}
?>
<?php
$sql_login = "SELECT * FROM main_users_extended AS a INNER JOIN main_users AS b ON a.user_id = b.user_id WHERE a.user2='$nama_agent'";
$sql_hasil_login = mysqli_query($con, $sql_login);
$row_login = mysqli_fetch_array($sql_hasil_login);
$username = $row_login['username'];
if ($tanggal != "" or $tanggal != NULL) {
    $tanggal_awal = date("Y-m-d", strtotime($tanggal)) . " 00:00:00";
    $tanggal_akhir = date("Y-m-d", strtotime($tanggal)) . " 23:59:59";

    $sql_detail1 = "select * FROM hasil_survey WHERE login='$username' AND status='Cabut' AND input='1' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
    $sql_detail2 = "select * FROM hasil_survey WHERE login='$username' AND status='ps' AND input='1' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
    $sql_detail3 = "select * FROM hasil_survey WHERE upd='$username' AND input='2' AND lup2 BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
    $sql_detail4 = "select * FROM app_tam_t2 WHERE status='Contacted' AND kategori='Agree' AND valid='Valid' AND upd='$username' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
    $sql_detail5 = "select * FROM app_tam_t2 WHERE status='Contacted' AND kategori='Not Agree' AND upd='$username' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
    $sql_detail6 = "select * FROM vr147 WHERE input='3' AND upd='$username' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
} else if ($bulan_tahun != "" or $bulan_tahun != NULL) {
    $month = date("m", strtotime($bulan_tahun));
    $year = date("Y", strtotime($bulan_tahun));
    $sql_detail1 = "select * FROM hasil_survey WHERE login='$username' AND status='Cabut' AND input='1' AND MONTH(lup) = '$month' AND YEAR(lup) = '$year'";
    $sql_detail2 = "select * FROM hasil_survey WHERE login='$username' AND status='ps' AND input='1' AND MONTH(lup) = '$month' AND YEAR(lup) = '$year'";
    $sql_detail3 = "select * FROM hasil_survey WHERE upd='$username' AND input='2' AND MONTH(lup2) = '$month' AND YEAR(lup2) = '$year'";
    $sql_detail4 = "select * FROM app_tam_t2 WHERE status='Contacted' AND kategori='Agree' AND valid='Valid' AND upd='$username' AND MONTH(lup) = '$month' AND YEAR(lup) = '$year'";
    $sql_detail5 = "select * FROM app_tam_t2 WHERE status='Contacted' AND kategori='Not Agree' AND upd='$username' AND MONTH(lup) = '$month' AND YEAR(lup) = '$year'";
    $sql_detail6 = "select * FROM vr147 WHERE input='3' AND upd='$username' AND MONTH(lup) = '$month' AND YEAR(lup) = '$year'";
}
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Report Total Tapping</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Report</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Report Total Tapping</li>
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
                        <form method="POST" action="" id="myForm">
                            <div class="form-group">
                                <label for="nama_agent">Nama Agent T2 :</label>
                                <select class="form-control" id="nama_agent" name="nama_agent">
                                    <option value="">-- Pilih Nama Agent --</option>
                                    <?php
                                    $sql = "SELECT * FROM main_users_extended AS a INNER JOIN main_users AS b ON a.user_id = b.user_id WHERE a.user3='Agent T2'";
                                    $sql_hasil = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($sql_hasil);
                                    if ($total > 0) {
                                        while ($row = mysqli_fetch_array($sql_hasil)) {
                                    ?>
                                            ?>
                                            <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-12 pt-0">Cari berdasarkan : </legend>
                                        <div class="form-check col-sm-2" style="margin-left: 40px;">
                                            <input class="form-check-input" type="radio" name="cari_dt" id="hari" value="Tanggal atau Hari">
                                            <label class="form-check-label" for="hari">
                                                Tanggal atau Hari
                                            </label>
                                        </div>
                                        <div class="form-check col-sm-2">
                                            <input class="form-check-input" type="radio" name="cari_dt" id="bulan" value="Bulan">
                                            <label class="form-check-label" for="bulan">
                                                Bulan
                                            </label>
                                        </div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <label for="tanggal">Tanggal :</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                            <div class="form-group">
                                <label for="bulan_tahun">Bulan dan Tahun :</label>
                                <input type="month" class="form-control" id="bulan_tahun" name="bulan_tahun">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary cari" name="cari">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    if(isset($_POST['cari'])) {
                ?>
                <div class="card" id="tampilDetail">
                    <div class="card-title">
                        Detail Total Tapping Agent :
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="login" class="col-sm-3 col-form-label">Login</label>
                            <div class="col-sm-9">
                                <label id="login" class="fomr-group"><?= $username ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_agent" class="col-sm-3 col-form-label">Nama Agent</label>
                            <div class="col-sm-9">
                                <label id="nama_agent" class="fomr-group"><?= $nama_agent ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <?php if ($tanggal != NULL or $tanggal != '') { ?>
                                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <label id="tanggal" class="fomr-group"><?= date("l, d F Y", strtotime($tanggal)) ?></label>
                                </div>
                            <?php } else if ($bulan_tahun != NULL or $bulan_tahun != '') { ?>
                                <label for="tanggal" class="col-sm-3 col-form-label">Bulan dan Tahun</label>
                                <div class="col-sm-9">
                                    <label id="tanggal" class="fomr-group"><?= date("F Y", strtotime($bulan_tahun)) ?></label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="form-group row">
                            <label for="cabut" class="col-sm-3 col-form-label">Total Tapping Survey Cabut</label>
                            <div class="col-sm-9">
                                <label id="cabut" class="fomr-group"><?= $total1 ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ps" class="col-sm-3 col-form-label">Total Tapping Survey PS</label>
                            <div class="col-sm-9">
                                <label id="ps" class="fomr-group"><?= $total2 ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="survey" class="col-sm-3 col-form-label">Total Tapping Survey</label>
                            <div class="col-sm-9">
                                <label id="survey" class="fomr-group"><?= $total3 ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="approve" class="col-sm-3 col-form-label">Total Tapping Approve</label>
                            <div class="col-sm-9">
                                <label id="approve" class="fomr-group"><?= $total4 ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="decline" class="col-sm-3 col-form-label">Total Tapping Decline</label>
                            <div class="col-sm-9">
                                <label id="decline" class="fomr-group"><?= $total5 ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vr" class="col-sm-3 col-form-label">Total Tapping VR 147</label>
                            <div class="col-sm-9">
                                <label id="vr" class="fomr-group"><?= $total6 ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
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