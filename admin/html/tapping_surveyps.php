<?php
include("sidebar.php");

if ($_GET) {
    extract($_GET, EXTR_OVERWRITE);
}
if ($_POST) {
    extract($_POST, EXTR_OVERWRITE);
}

include("../../assets/conn.php");
$upd = $_SESSION["username"];

$sql = "SELECT id, lup, login, addon, nd_speedy, no_hp, status_call, status, channel, aktif, info_aktif, kualitas_produk, penyampaian, mengerti_produk, harga, alasan_ps, saran, tepat_waktu, rapi, kcontact_ps  
FROM hasil_survey WHERE id='$id'";
$hasil = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($hasil);

if (isset($ubah_survey)) {
    if ($upd != NULL or $upd != "") {
        $tanggal_now = date("Y-m-d H:i:s");
        $query1 = "UPDATE hasil_survey SET hasil_tappingsurvey = '$hasil_tappingsurvey', nok_tappingsurvey = '$nok_tappingsurvey', lup2='$tanggal_now', input='2', upd='$upd', rekom_t2='$rekom_t2' WHERE id = '$id'";
        // echo "<script>alert('$query1')</script>";
        if (!mysqli_query($con, $query1)) {
            echo "<script>window.location.href = window.location.origin + window.location.pathname + '?id=".$id."&status=gagal'</script>";
        } else {
            echo "<script>window.location.href = window.location.origin + window.location.pathname + '?id=".$id."&status=succes'</script>";
        }
    }
}
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Form</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.php" class="text-muted">Tapping Survey</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">PS </li>
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
                        <form action="tapping_survey.php" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <h4 class="card-title">Data Survey</h4>
                                <br>
                                <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>">
                                
                                <div class="form-group row">
                                    <label class="col-md-2" for="lup">TANGGAL SURVEY</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="lup" class="form-control" placeholder="Masukkan Tanggal" id="lup" value="<?php if (date("d-m-Y", strtotime($row['lup'])) == '01-01-1970') {
                                                                                                                                                                    echo '';
                                                                                                                                                                } else {
                                                                                                                                                                    echo date("l, d F Y", strtotime($row['lup']));
                                                                                                                                                                } ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="login">LOGIN AGENT</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="login" class="form-control" id="login" value="<?= $row['login'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="addon">JENIS PENAWARAN</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="addon" class="form-control" placeholder="jenis addon" id="addon" value="<?= $row['addon'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="nd_speedy">TELPON TUMPANGAN</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="nd_speedy" class="form-control" id="nd_speedy" value="<?= $row['nd_speedy'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="no_hp">REKAMAN</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?= $row['no_hp'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="status">- STATUS -</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="status" class="form-control" id="status" value="<?= $row['status'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-2" for="channel">CHANNEL</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="channel" class="form-control" id="channel" value="<?= $row['channel'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="aktif">SUDAK AKTIF</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="aktif" class="form-control" id="aktif" value="<?= $row['aktif'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="info_aktif">INFO AKTIF</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="info_aktif" class="form-control" id="info_aktif" value="<?= $row['info_aktif'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
																
								
								<div class="form-group row">
                                    <label class="col-md-2" for="kualitas_produk">KUALITAS PRODUK</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="kualitas_produk" class="form-control" id="kualitas_produk" value="<?= $row['kualitas_produk'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="penyampaian">PENYAMPAIAN AGENT</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="penyampaian" class="form-control" id="penyampaian" value="<?= $row['penyampaian'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="mengerti_produk">MENGERTI PRODUK</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="mengerti_produk" class="form-control" id="mengerti_produk" value="<?= $row['mengerti_produk'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="harga">HARGA SESUAI ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="harga" class="form-control" id="harga" value="<?= $row['harga'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="alasan_ps">ALASAN PS</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="alasan_ps" class="form-control" id="alasan_ps" value="<?= $row['alasan_ps'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="tepat_waktu">KEDATANGAN TEKNISI TEPAT WAKTU</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="tepat_waktu" class="form-control" id="tepat_waktu" value="<?= $row['tepat_waktu'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="rapi">KINERJA TEKNISI</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="rapi" class="form-control" id="rapi" value="<?= $row['rapi'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								
								<div class="form-group row">
                                    <label class="col-md-2" for="saran">SARAN UTK TELKOM</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="saran" class="form-control" id="saran" value="<?= $row['saran'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-2" for="kcontact_ps">KKONTAK PS</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="kcontact_ps" class="form-control" id="kcontact_ps" value="<?= $row['kcontact_ps'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                                <h4 class="card-title">TAPPING</h4>
                                <br>
                                
								<div class="form-group row">
                                    <label class="col-md-2" for="hasil_tappingsurvey">Hasil Tapping ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="hasil_tappingsurvey" class="form-control" placeholder="Pilih hasil tapping" id="hasil_tappingsurvey">
                                                        <option value="" selected>-- Pilih Hasil</option>
                                                        <option value="OK">OK</option>
                                                        <option value="NOT OK">NOT OK</option>
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="nok_tappingsurvey">Alasan Not OK ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="nok_tappingsurvey" class="form-control" placeholder="Masukkan alasan" id="nok_tappingsurvey">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-2" for="rekom_t2">Rekomendasi</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="rekom_t2" class="form-control" placeholder="Rekomendasi QCO T2" id="rekom_t2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                            </div>
                            <div class="form-actions">
                                <div class="text-left">
                                    <button type="submit" name="ubah_survey" class="btn btn-info" value="1">Simpan Tapping</button>
                                    <button type="reset" class="btn btn-dark">Reset</button>
                                </div>
                            </div>
                        </form>
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
    <!-- ============================================================== -->
    <?php
    include("footer.php");
    ?>