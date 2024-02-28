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

$sql = "SELECT tgl_upload,id, nd, caring_id, service, item, tgl_apprv, tgl_create, getsim_msg, keterangan, orderid, xs5, xs6, ndem, x_last_milestone, x_integration_message, scid, xs7, no_hp, email, status_prov  
FROM caring_cancel WHERE id='$id'";
$hasil = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($hasil);
// print_r($sql);
// print_r($ubah_caring);
// exit();

if (isset($ubah_caring)) {
    if ($upd != NULL or $upd != "") {
        $tanggal_now = date("Y-m-d");
        $query1 = "UPDATE caring_cancel SET input='1', 
		upd = '$upd',
		lup = '$tanggal_now', 
		status_call = '$status_call', 
		nama_plg='$nama_plg', 
		relasi='$relasi', 
		info_penawaran='$info_penawaran', 
		penyampaian_agent='$penyampaian_agent',
		alasan_cancel='$alasan_cancel', 
		detail='$detail' , 
		saran='$saran', 
		hasil_call='$hasil_call', 
		ket='$ket'
		WHERE id = '$id'";
        //echo "<script>alert('$query1')</script>";
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
                            <li class="breadcrumb-item"><a href="index.php" class="text-muted">Caring Cancel</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">- </li>
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
                        <form action="caring_cancel.php" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <h4 class="card-title">Data Caring</h4>
                                <br>
                                <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>">
                                
                                <div class="form-group row">
                                    <label class="col-md-2" for="tgl_upload">TANGGAL UPLOAD</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="tgl_upload" class="form-control" id="tgl_upload" value="<?= $row['tgl_upload'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="nd">ND</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="nd" class="form-control" id="nd" value="<?= $row['nd'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="caring_id">CARING ID</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="caring_id" class="form-control" placeholder="caring id" id="caring_id" value="<?= $row['caring_id'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="service">SERVICE</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="service" class="form-control" id="service" value="<?= $row['service'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="item">ITEM</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="item" class="form-control" id="item" value="<?= $row['item'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="tgl_apprv">TGL_APPRV</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="tgl_apprv" class="form-control" id="tgl_apprv" value="<?= $row['tgl_apprv'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-2" for="tgl_create">TGL_CREATE</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="tgl_create" class="form-control" id="tgl_create" value="<?= $row['tgl_create'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="getsim_msg">GETSIM_MSG</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="getsim_msg" class="form-control" id="getsim_msg" value="<?= $row['getsim_msg'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="keterangan">KETERANGAN</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $row['keterangan'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
																
								
								<div class="form-group row">
                                    <label class="col-md-2" for="orderid">ORDER_ID</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="orderid" class="form-control" id="orderid" value="<?= $row['orderid'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="xs5">XS5</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="xs5" class="form-control" id="xs5" value="<?= $row['xs5'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="xs6">XS6</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="xs6" class="form-control" id="xs6" value="<?= $row['xs6'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="ndem">NDEM</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="ndem" class="form-control" id="ndem" value="<?= $row['ndem'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="x_last_milestone">X LAST MILESTONE</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="x_last_milestone" class="form-control" id="x_last_milestone" value="<?= $row['x_last_milestone'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="x_integration_message">INTEGRATION MESSAGE</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="x_integration_message" class="form-control" id="x_integration_message" value="<?= $row['x_integration_message'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="scid">SCID</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="scid" class="form-control" id="scid" value="<?= $row['scid'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								
								<div class="form-group row">
                                    <label class="col-md-2" for="xs7">XS7</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="xs7" class="form-control" id="xs7" value="<?= $row['xs7'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-2" for="no_hp">NO HP</label>
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
                                    <label class="col-md-2" for="status_prov">STATUS PROV</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="status_prov" class="form-control" id="status_prov" value="<?= $row['status_prov'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								
								
                                <h4 class="card-title">CARING</h4>
                                <br>
                                
								<div class="form-group row">
                                    <label class="col-md-2" for="status_call">STATUS CALL ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="status_call" class="form-control" placeholder="Pilih hasil call" id="status_call">
                                                        <option value="" selected>-- Pilih Hasil</option>
                                                        <option value="Contacted">Contacted</option>
                                                        <option value="RNA">RNA</option>
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="nama_plg">NAMA PELANGGAN</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="nama_plg" class="form-control" placeholder="Masukkan nama plg" id="nama_plg">
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
                                                    <input type="text" name="relasi" class="form-control" placeholder="hubungan plg" id="relasi">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-2" for="info_penawaran">INFO PENAWARAN ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="info_penawaran" class="form-control" placeholder="Pilih " id="info_penawaran">
                                                        <option value="" selected>-- Pilih info penawaran</option>
														<option value="Ada">Ada</option>
                                                        <option value="Tidak">Tidak</option>
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-2" for="penyampaian_agent">PENYAMPAIAN AGENT ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="penyampaian_agent" class="form-control" placeholder="Pilih " id="penyampaian_agent">
                                                        <option value="" selected>-- Pilih info penawaran</option>
														<option value="Tidak Jelas">Tidak Jelas</option>
                                                        <option value="Kurang Jelas">Kurang Jelas</option>
														<option value="Jelas">Jelas</option>
                                                        <option value="Sangat Jelas">Sangat Jelas</option>
														<option value="Cukup Jelas">Cukup Jelas</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-2" for="alasan_cancel">ALASAN CANCEL ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="alasan_cancel" class="form-control" placeholder="Pilih " id="alasan_cancel">
                                                        <option value="" selected>-- Pilih Hasil</option>
                                                        
														<option value="Price">Price</option>
                                                        <option value="Product">Product</option>
														<option value="Process">Process</option>
                                                        <option value="Physical_evident">Physical_evident</option>
														<option value="People">People</option>
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-2" for="detail">DETAIL ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="detail" class="form-control" placeholder="Pilih " id="detail">
                                                        <option value="" selected>-- Pilih Hasil</option>
                                                        <!-- <option value="Ada">Ada</option>
                                                        <option value="Tidak">Tidak</option> -->
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-2" for="saran">SARAN ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="saran" class="form-control" placeholder="Pilih " id="saran">
                                                        <option value="" selected>-- Pilih saran</option>
                                                        <option value="Belum Ada Saran">Belum Ada Saran</option>
                                                        <option value="Berikan Informasi yang Sesuai">Berikan Informasi yang Sesuai</option>
														<option value="Perbanyak Channel">Perbanyak Channel</option>
                                                        <option value="Tarif Lebih Terjangkau">Tarif Lebih Terjangkau</option>
														<option value="Tingkatkan Kualitas Produk">Tingkatkan Kualitas Produk</option>
                                                        <option value="Tingkatkan Pelayanan Petugas">Tingkatkan Pelayanan Petugas</option>
														<option value="Tidak Ingin ada penambahan biaya">Tidak Ingin ada penambahan biaya</option>
                                                        <option value="Tidak ingin dihubungi">Tidak ingin dihubungi</option>
												
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-2" for="hasil_call">HASIL CALL ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="hasil_call" class="form-control" placeholder="Pilih " id="hasil_call">
                                                        <option value="" selected>-- Pilih hasil call</option>
                                                        <option value="Masih Berminat Berlangganan">Masih Berminat Berlangganan</option>
                                                        <option value="Cancel">Cancel</option>
														<option value="Tidak Merasa Ada Penawaran">Tidak Merasa Ada Penawaran</option>
                                                        <option value="Tidak Bertemu dengan YBS">Tidak Bertemu dengan YBS</option>
														<option value="Follow Up">Follow Up</option>
                                                        <option value="Rejected Menolak diawal pembicaraan">Rejected Menolak diawal pembicaraan</option>
														<option value="PS">PS</option>
                                                        <option value="In Progress">In Progress</option>
												
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-2" for="ket">KETERANGAN</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="ket" class="form-control" placeholder="Masukkan keterangan" id="ket">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-left">
                                    <button type="submit" name="ubah_caring" class="btn btn-info" value="1">Simpan Caring</button>
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
    <script>
        
        
        
    </script>
    <?php
    include("footer.php");
    ?>