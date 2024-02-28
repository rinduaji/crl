<?php
include("sidebar.php");

if ($_GET) {
    extract($_GET, EXTR_OVERWRITE);
}
if ($_POST) {
    extract($_POST, EXTR_OVERWRITE);
}

include("../../assets/conn2.php");


$username = $_SESSION["username"];

$id_data2 = $_GET['id'];
$link = "tapping_decline.php?id=".$id_data2;
$sql = "SELECT * FROM app_tam_data2 AS a INNER JOIN cc147_main_users_extended AS b ON a.login = b.user1
WHERE a.id='$id_data2'";
$hasil = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($hasil);

$tgl = $row['tgl'];
$login = $row['login'];
$nama = $row['user2'];
$no_pelanggan = $row['no_pelanggan'];
$fastel = $row['fastel'];
$nama_dm = $row['nama_dm'];
$tlp = $row['tlp'];
$site = $row['user5'];
$reg = $row['reg'];
$jenis = $row['jenis'];
$status = $row['status'];
$kategori = $row['kategori'];
$reason = $row['reason'];
$penerima = $row['penerima'];
$ket = $row['ket'];
$follow = $row['follow'];
$upd_qco = $row['upd_qco'];
$rec_qco = $row['rec_qco'];
$tgl_qco1 = $row['tgl_qco1'];
$valid = $row['valid'];
$input = $row['input'];
$poin = $row['poin'];
$rekom_qa = $row['rekom_qa'];
$nba = $row['nba'];
$detil_nba = $row['detil_nba'];
$harga = $row['harga'];
$lup = date("Y-m-d H:i:s");
$upd = $username;

if (isset($ubah_tapping_decline)) {
    include("../../assets/conn.php");
    if ($username != NULL or $username != "") {
        $tanggal_now = date("Y-m-d H:i:s");
        // $query1 = "insert into app_tam_t2 (tgl, login, nama, no_pelanggan, fastel, nama_dm, tlp, site, reg, jenis, status, kategori, reason, penerima, 
        // ket, follow, upd_qco, rec_qco, tgl_qco1, valid, input, poin, rekom_qa, nba, detil_nba, harga, lup, upd, status_t2, alasan, rekom_t2) VALUES 
        // ('$tgl', '$login', '$nama', '$no_pelanggan', '$fastel', '$nama_dm', '$tlp', '$site', '$reg', '$jenis', '$status', '$kategori', '$reason', '$penerima', 
        // '$ket', '$follow', '$upd_qco', '$rec_qco', '$tgl_qco1', '$valid', '$input', '$lup', '$upd', '$status_t2', '$alasan', '$rekom_t2')";

		$query1 = "insert into app_tam_t2 (tgl, login, nama, no_pelanggan, fastel, nama_dm, tlp, site, reg, jenis, status, kategori, reason, penerima, 
        ket, follow, upd_qco, rec_qco, tgl_qco1, valid, input, lup, upd, status_t2, alasan, rekom_t2) VALUES 
        ('$tgl', '$login', '$nama', '$no_pelanggan', '$fastel', '$nama_dm', '$tlp', '$site', '$reg', '$jenis', '$status', '$kategori', '$reason', '$penerima', 
        '$ket', '$follow', '$upd_qco', '$rec_qco', '$tgl_qco1', '$valid', '$input', '$lup', '$upd', '$status_t2', '$alasan', '$rekom_t2')";
		// echo "<script>alert('$query1')</script>";
        if (!mysqli_query($con, $query1)) {
            echo "<script>window.location.href = window.location.origin + window.location.pathname + '?id=".$id_data2."&status=gagal'</script>";
        } else {
            echo "<script>window.location.href = window.location.origin + window.location.pathname + '?id=".$id_data2."&status=succes'</script>";
        }
    }
}
if(isset($_GET['status'])) {
    if($_GET['status'] == 'succes') {
        header("Location: form_wo_tappingtam_agree.php");
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
                            <li class="breadcrumb-item"><a href="index.php" class="text-muted">Tapping</a></li>
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
                        <form action="<?=$link?>" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <h4 class="card-title">Data Detail Decline</h4>
                                <br>
                                <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>">
                                <div class="form-group row">
                                    <label class="col-md-2" for="tgl">Tanggal</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="tgl" class="form-control" id="tgl" value="<?= $row['tgl'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="login">Login</label>
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
                                    <label class="col-md-2" for="nama">Nama Agent</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $row['user2'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="fastel">Fastel</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="fastel" class="form-control" id="fastel" value="<?= $row['fastel'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="nama_dm">Nama Pelanggan</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="nama_dm" class="form-control" id="nama_dm" value="<?= $row['nama_dm'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="jenis">Jenis Add On</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="jenis" class="form-control" id="jenis" value="<?= $row['jenis'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="kategori">Kategori</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="kategori" class="form-control" id="kategori" value="<?= $row['kategori'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="reason">Reason</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="reason" class="form-control" id="reason" value="<?= $row['reason'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="tlp">No HP</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="tlp" class="form-control" id="tlp" value="<?= $row['tlp'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="site">Site</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="site" class="form-control" id="site" value="<?= $row['user5'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
								
                                
								<h4 class="card-title">Tapping Decline</h4>
                                <br>
                                <div class="form-group row">
                                    <label class="col-md-2" for="status_t2">Status</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="status_t2" class="form-control" placeholder="Pilih Channel Fix" id="status_t2">
                                                        <option value="" selected>-- Pilih status</option>
                                                        <option value="Valid">Valid</option>
                                                        <option value="Not Valid">Not Valid</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="alasan">Alasan NOK</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
												    <select name="alasan" class="form-control" placeholder="Pilih alasan nok" id="alasan">
                                                        <option value="" selected>-- Pilih alasan</option>
                                                        <option value="Produk knowledge">Produk knowledge</option>
                                                        <option value="Sales skill">Sales skill</option>
														<option value="Respond to customer">Respond to customer</option>
														<option value="Voice quality">Voice quality</option>
														<option value="Closing">Closing</option>  
                                                    </select>                                                
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
                            <div class="form-actions">
                                <div class="text-left">
                                    <button type="submit" name="ubah_tapping_decline" class="btn btn-info" value="1">Simpan Tapping Decline</button>
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