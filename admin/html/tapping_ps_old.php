<?php
include("sidebar.php");

if ($_GET) {
    extract($_GET, EXTR_OVERWRITE);
}
if ($_POST) {
    extract($_POST, EXTR_OVERWRITE);
}

include("../../assets/conn.php");
$login = $_SESSION["username"];

$sql = "SELECT id, kawasan, c_witel, witel, ndem, ndem_ps, ndem_cabut, nd_speedy, addon, item, item_ps, item_cabut, kcontact, 
tgl_ps, tgl_cabut, umur, channel_cabut, no_hp, kcontact_ps, kcontact_cabut, timsurvey, status FROM hasil_survey WHERE id='$id'";
$hasil = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($hasil);

if (isset($ubah_tapping_ps)) {
    if ($login != NULL or $login != "") {
        $tanggal_now = date("Y-m-d H:i:s");
        $query1 = "UPDATE hasil_survey SET channel = '$channel_fix', aktif = '$aktif', info_aktif = '$info_aktif', kualitas_produk = '$kualitas_produk', 
        penyampaian = '$penyampaian', mengerti_produk = '$mengerti_produk', harga = '$harga', alasan_ps = '$alasan_ps', tepat_waktu = '$tepat_waktu', 
        rapi = '$rapi', saran='$saran', lup='$tanggal_now', input='1', status_call='$status_call' WHERE id = '$id'";
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
                            <li class="breadcrumb-item"><a href="index.php" class="text-muted">Tapping</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">PS</li>
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
                        <form action="tapping_ps.php" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <h4 class="card-title">Data Detail PS</h4>
                                <br>
                                <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>">
                                <div class="form-group row">
                                    <label class="col-md-2" for="kawasan">Kawasan</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="kawasan" class="form-control" id="kawasan" value="<?= $row['kawasan'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="c_witel">C Witel</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="c_witel" class="form-control" id="c_witel" value="<?= $row['c_witel'] ?>" disabled>
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
                                    <label class="col-md-2" for="ndem_ps">NDEM PS</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="ndem_ps" class="form-control" id="ndem_ps" value="<?= $row['ndem_ps'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="nd_speedy">ND Internet</label>
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
                                    <label class="col-md-2" for="addon">Addon</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="addon" class="form-control" id="addon" value="<?= $row['addon'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="item">Item</label>
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
                                    <label class="col-md-2" for="item_ps">Item PS</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="item_ps" class="form-control" id="item_ps" value="<?= $row['item_ps'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="kcontact">Kcontact</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="kcontact" class="form-control" id="kcontact" value="<?= $row['kcontact'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="kcontact_ps">Kcontact PS</label>
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
                                <div class="form-group row">
                                    <label class="col-md-2" for="tgl_ps">Tanggal PS</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="tgl_ps" class="form-control" placeholder="Masukkan Tanggal PS" id="tgl_ps" value="<?php if (date("d-m-Y", strtotime($row['tgl_ps'])) == '01-01-1970') {
                                                                                                                                                                    echo '';
                                                                                                                                                                } else {
                                                                                                                                                                    echo date("l, d F Y", strtotime($row['tgl_ps']));
                                                                                                                                                                } ?>" disabled>
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
                                
                                <h4 class="card-title">Survey PS</h4>
                                <br>
								<div class="form-group row">
                                    <label class="col-md-2" for="status_call">Status Call</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="status_call" class="form-control" placeholder="Pilih status call" id="status_call">
                                                        <option value="" selected>-- Pilih status call</option>
														<option value="Contacted">Contacted</option>
                                                        <option value="RNA">RNA</option>
                                                        <option value="Busy">Busy</option>
                                                        <option value="Announcement">Announcement</option>
                                                        <option value="Fax-modem">Fax-modem</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-group row">
                                    <label class="col-md-2" for="channel_fix">Channel ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="channel_fix" class="form-control" placeholder="Pilih Channel Fix" id="channel_fix">
                                                        <option value="" selected>-- Pilih Channel Fix</option>
                                                        <option value="147">147</option>
                                                        <option value="CCWITEL">CCWITEL</option>
                                                        <option value="MyIH">MyIH</option>
                                                        <option value="Plasa">Plasa</option>
                                                        <option value="Sales Force">Sales Force</option>
                                                        <option value="TAM">TAM</option>
                                                        <option value="Teknisi">Teknisi</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="aktif">Apakah Layanan Sudah Aktif ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
												    <select name="aktif" class="form-control" placeholder="Pilih " id="aktif">
                                                        <option value="" selected>-- Pilih Apakah Layanan Sudah Aktif</option>
                                                        <option value="Sudah">Sudah</option>
                                                        <option value="Belum di cek">Belum di cek</option>
                                                        <option value="Tidak merasa berlangganan">Tidak merasa berlangganan</option>
                                                        <option value="Belum aktif">Belum aktif</option>
                                                        <option value="Tidak tahu">Tidak tahu</option>
                                                        <option value="Batal berlangganan">Batal berlangganan</option>
                                                        <option value="Belum ada pemasangan">Belum ada pemasangan</option>
														<option value="Belum terima perangkat">Belum terima perangkat</option>
														<option value="Cabut indihome">Cabut indihome</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="info_aktif">Info Aktif Darimana ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="info_aktif" class="form-control" placeholder="Masukkan Info Aktif" id="info_aktif">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="kualitas_produk">Bagaimana Pendapat Bapak atau Ibu Terhadap Kualitas Produk kami ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="kualitas_produk" class="form-control" placeholder="Pilih Kualitas Produk" id="kualitas_produk">
                                                        <option value="" selected>-- Pilih Kualitas Produk</option>
                                                        <option value="Bagus">Bagus</option>
                                                        <option value="Belum Ada Pemakaian">Belum Ada Pemakaian</option>
                                                        <option value="Cukup Bagus">Cukup Bagus</option>
                                                        <option value="Kurang Bagus">Kurang Bagus</option>
                                                        <option value="Sangat Bagus">Sangat Bagus</option>
                                                        <option value="Tidak Bagus">Tidak Bagus</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="penyampaian">Pada Saat Penawaran Bagaimana Penyampaian dari Agent ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="penyampaian" class="form-control" placeholder="Pilih Penyampaian" id="penyampaian">
                                                        <option value="" selected>-- Pilih Penyampaian</option>
                                                        <option value="Cukup Jelas">Cukup Jelas</option>
                                                        <option value="Jelas">Jelas</option>
                                                        <option value="Kurang Jelas">Kurang Jelas</option>
                                                        <option value="Sangat Jelas">Sangat Jelas</option>
                                                        <option value="Tidak Jelas">Tidak Jelas</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="mengerti_produk">Apakah Bapak atau Ibu Mengerti dengan Produk yang Ditawarkan ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="mengerti_produk" class="form-control" placeholder="Pilih Mengerti Produk" id="mengerti_produk">
                                                        <option value="" selected>-- Pilih Mengerti Produk</option>
                                                        <option value="Mengerti">Mengerti</option>
                                                        <option value="Tidak Mengerti">Tidak Mengerti</option>
                                                        <option value="Cukup Mengerti">Cukup Mengerti</option>
                                                        <option value="Kurang Mengerti">Kurang Mengerti</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="harga">Berapa Harga yang Diberikan Sudah Sesuai ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <select name="harga" class="form-control" placeholder="Pilih Harga" id="harga">
                                                        <option value="" selected>-- Pilih Harga</option>
                                                        <option value="Sesuai">Sesuai</option>
                                                        <option value="Tidak Sesuai">Tidak Sesuai</option>
                                                        <option value="Tidak Tahu">Tidak Tahu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="alasan_ps">Bagaimana Alasan Bapak atau Ibu Berlangganan Produk Tersebut ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="alasan_ps" class="form-control" placeholder="Pilih Alasan PS" id="alasan_ps">
                                                        <option value="" selected>-- Pilih Alasan PS</option>
                                                        <option value="Butuh">Butuh</option>
                                                        <option value="Terpaksa">Terpaksa</option>
                                                        <option value="Tertarik">Tertarik</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="tepat_waktu">Bagaimana Ketepatan Waktu Kedatangan Teknisi (STB, 2P3P) ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="tepat_waktu" class="form-control" placeholder="Masukkan Tepat Waktu" id="tepat_waktu">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="rapi">Bagaimana Kinerja Teknisi dan Kerapihan Pada Saat Pemasangan (STB / 2P3P) ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="rapi" class="form-control" placeholder="Masukkan Kerapihan" id="rapi">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="saran">Saran untuk Telkom ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="saran" class="form-control" placeholder="Pilih Saran" id="saran">
                                                        <option value="" selected>-- Pilih Saran</option>
                                                        <option value="Belum Ada Saran">Belum Ada Saran</option>
                                                        <option value="Berikan Informasi yang Sesuai">Berikan Informasi yang Sesuai</option>
                                                        <option value="Perbanyak Channel">Perbanyak Channel</option>
                                                        <option value="Perluas Jaringan">Perluas Jaringan</option>
                                                        <option value="Tarif Lebih Terjangkau">Tarif Lebih Terjangkau</option>
                                                        <option value="Tingkatkan Kualitas Produk">Tingkatkan Kualitas Produk</option>
                                                        <option value="Tingkatkan Pelayanan Petugas">Tingkatkan Pelayanan Petugas</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-left">
                                    <button type="submit" name="ubah_tapping_ps" class="btn btn-info" value="1">Simpan Tapping PS</button>
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