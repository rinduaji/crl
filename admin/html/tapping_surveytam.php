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

$sql = "SELECT id, lup, login, addon, nd_speedy, no_hp, status_call, status, umur, channel, nama_pelanggan, relasi, alasan_cabut, kualitas_produk, penyampaian, mengerti_produk, saran, detail1, detail2, proses_cabut, proses_cabut2  
FROM hasil_survey WHERE id='$id'";
$hasil = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($hasil);

$cari_agent = $row['login'];
$sql_agent = "SELECT * FROM main_users AS a INNER JOIN main_users_extended AS b ON a.user_id = b.user_id WHERE a.username='$cari_agent'";
$hasil_agent = mysqli_query($con, $sql_agent);
$row_agent = mysqli_fetch_assoc($hasil_agent);

if (isset($ubah_survey)) {
    if ($upd != NULL or $upd != "") {
        $tanggal_now = date("Y-m-d H:i:s");
        $query1 = "UPDATE hasil_survey SET hasil_tappingsurvey = '$status_t2', nok_tappingsurvey = '$alasan', lup2='$tanggal_now', input='2' WHERE id = '$id'";
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
                            <li class="breadcrumb-item text-muted active" aria-current="page">TAM </li>
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
                        <form action="tapping_surveytam.php" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <h4 class="card-title">Data Survey</h4>
                                <br>
                                <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>">
                                
                                <div class="form-group row">
                                    <label class="col-md-2" for="tgl">TANGGAL</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="tgl" class="form-control" placeholder="Masukkan Tanggal" id="tgl" value="<?php if (date("d-m-Y h:i:s", strtotime($row['lup'])) == '01-01-1970') {
                                                                                                                                                                    echo '';
                                                                                                                                                                } else {
                                                                                                                                                                    echo date("l, d F Y h:i:s", strtotime($row['lup']));
                                                                                                                                                                } ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="nama">LOGIN AGENT</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $row['login'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="nama">NAMA AGENT</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $row_agent['name'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="jenis">JENIS PENAWARAN</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="jenis" class="form-control" placeholder="Masukkan jenis" id="jenis" value="<?= $row['addon'] ?>" disabled>
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
                                    <label class="col-md-2" for="umur">UMUR</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="umur" class="form-control" id="umur" value="<?= $row['umur'] ?>" disabled>
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
                                    <label class="col-md-2" for="nama_pelanggan">NAMA PLG</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" value="<?= $row['nama_pelanggan'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="relasi">RELASI</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="relasi" class="form-control" id="relasi" value="<?= $row['relasi'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="alasan_cabut">ALASAN CABUT</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="alasan_cabut" class="form-control" id="alasan_cabut" value="<?= $row['alasan_cabut'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-2" for="detail1">DETIL</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="detail1" class="form-control" id="detail1" value="<?= $row['detail1'] ?>" disabled>
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
                                    <label class="col-md-2" for="mengerti_produk">AWAL BERLANGGANAN</label>
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
                                    <label class="col-md-2" for="proses_cabut">PROSES CABUT SULIT</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="proses_cabut" class="form-control" id="proses_cabut" value="<?= $row['proses_cabut'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="proses_cabut2">KETERANGAN</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="proses_cabut2" class="form-control" id="proses_cabut2" value="<?= $row['proses_cabut2'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>							
                                <h4 class="card-title">Survey TAM</h4>
                                <br>
                                
								<div class="form-group row">
                                    <label class="col-md-2" for="status_t2">Hasil Survey ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="status_t2" class="form-control" placeholder="Pilih status" id="status_t2">
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
                                    <label class="col-md-2" for="alasan">Alasan ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="alasan" class="form-control" placeholder="Masukkan alasan" id="alasan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-left">
                                    <button type="submit" name="ubah_survey" class="btn btn-info" value="1">Simpan Survey</button>
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