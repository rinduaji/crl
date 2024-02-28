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

if (isset($ubah_tapping_cabut)) {
    if ($login != NULL or $login != "") {
        $tanggal_now = date("Y-m-d H:i:s");
        $query1 = "UPDATE hasil_survey SET channel = '$channel_fix', nama_pelanggan = '$nama_pelanggan', relasi = '$relasi', cabut_addon = '$cabut_addon', 
        alasan_cabut = '$alasan_cabut', detail1 = '$detail1', detail2 = '$detail2', kisaran_harga = '$kisaran_harga', kualitas_produk = '$kualitas_produk', 
        penyampaian = '$penyampaian', mengerti_produk = '$mengerti_produk', saran='$saran', proses_cabut='$proses_cabut', lup='$tanggal_now', input='1', status_call='$status_call', proses_cabut2='$proses_cabut2', channel_favorit='$channel_favorit_pelanggan' WHERE id = '$id'";
        // echo "<script>alert('$query1')</script>";
        if (!mysqli_query($con, $query1)) {
            echo "<script>window.location.href = window.location.origin + window.location.pathname + '?id=" . $id . "&status=gagal'</script>";
        } else {
            echo "<script>window.location.href = window.location.origin + window.location.pathname + '?id=" . $id . "&status=succes'</script>";
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
                            <li class="breadcrumb-item text-muted active" aria-current="page">Cabut</li>
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
                        <form action="tapping_cabut.php" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <h4 class="card-title">Data Detail Cabut</h4>
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
                                    <label class="col-md-2" for="witel">Witel</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="witel" class="form-control" id="witel" value="<?= $row['witel'] ?>" disabled>
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
                                    <label class="col-md-2" for="ndem_cabut">NDEM Cabut</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="ndem_cabut" class="form-control" id="ndem_cabut" value="<?= $row['ndem_cabut'] ?>" disabled>
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
                                    <label class="col-md-2" for="item_cabut">Item Cabut</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="item_cabut" class="form-control" id="item_cabut" value="<?= $row['item_cabut'] ?>" disabled>
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
                                    <label class="col-md-2" for="tgl_cabut">Tanggal Cabut</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="tgl_cabut" class="form-control" id="tgl_cabut" value="<?php if (date("d-m-Y", strtotime($row['tgl_cabut'])) == '01-01-1970') {
                                                                                                                                        echo '';
                                                                                                                                    } else {
                                                                                                                                        echo date("l, d F Y", strtotime($row['tgl_cabut']));
                                                                                                                                    } ?>" disabled>
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
                                    <label class="col-md-2" for="umur">Umur</label>
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
                                    <label class="col-md-2" for="channel_cabut">Channel Cabut</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="channel_cabut" class="form-control" id="channel_cabut" value="<?= $row['channel_cabut'] ?>" disabled>
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
                                    <label class="col-md-2" for="kcontact_cabut">Kcontact Cabut</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="kcontact_cabut" class="form-control" id="kcontact_cabut" value="<?= $row['kcontact_cabut'] ?>" disabled>
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

                                <h4 class="card-title">Survey Cabut</h4>
                                <br>

                                <div class="form-group row">
                                    <label class="col-md-2" for="status_call">Status Call</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="status_call" class="form-control" placeholder="Pilih status call" id="status_call">
                                                        <option value="" selected>-- Pilih status call</option>
                                                        <option value="Contacted Bertemu YBS">Contacted-Bertemu YBS</option>
														<option value="Contacted Follow Up">Contacted-Follow Up</option>
														<option value="Contacted Tidak bertemu PJ">Contacted-Tidak bertemu PJ</option>
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
                                    <label class="col-md-2" for="channel_fix">Channel Fix</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="channel_fix" class="form-control" placeholder="Pilih Channel Fix" id="channel_fix">
                                                        <option value="" selected>-- Pilih Channel Fix --</option>
														<option value="Sosmed">Sosmed</option>
														<option value="Landing Page">Landing Page</option>
														<option value="ChatBot">ChatBot</option>
                                                        <option value="147">147</option>
                                                        <option value="CCWITEL">CCWITEL</option>
                                                        <option value="MyIH">MyIH</option>
                                                        <option value="Plasa">Plasa</option>
                                                        <option value="Sales Force">Sales Force</option>
                                                        <option value="TAM">TAM</option>
                                                        <option value="Teknisi">Teknisi</option>
														<option value="MOSS">MOSS</option>
														<option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="nama_pelanggan">Nama Pelanggan</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="nama_pelanggan" class="form-control" placeholder="Masukkan Nama Pelanggan" id="nama_pelanggan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="relasi">Relasi</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="relasi" class="form-control" placeholder="Masukkan Relasi" id="relasi">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="cabut_addon">Cabut Addon</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="cabut_addon" class="form-control" placeholder="Pilih Cabut Addon" id="cabut_addon">
                                                        <option value="" selected>-- Pilih Cabut Addon</option>
                                                        <option value="Ya">Ya</option>
                                                        <option value="Tidak">Tidak</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-md-2" for="alasan_cabut">Alasan Cabut (Kategori) ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="alasan_cabut" class="form-control" placeholder="Pilih Alasan Cabut" id="alasan_cabut">
                                                        <option value="" selected>-- Pilih Alasan Cabut --</option>
                                                        <option value="Efisiensi">Efisiensi</option>
                                                        <option value="Produk">Produk</option>
                                                        <option value="Proses">Proses</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2" for="alasan_cabut">Detail1 ?</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="detail1" class="form-control" placeholder="Pilih Detail1" id="detail1">
                                                        <option value="" selected>-- Pilih Detail1 --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="detail2">Detail2</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="detail2" class="form-control" placeholder="Masukkan Detail2" id="detail2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="kisaran_harga">Berapa Kisaran yang Diinginkan Pelanggan ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="number" name="kisaran_harga" class="form-control" placeholder="Masukkan Kisaran Harga" id="kisaran_harga">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="kualitas_produk">Bagaimana Kualitas Produk kami ? </label>
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
                                    <label class="col-md-2" for="penyampaian">Bagaimana Penyampaian dari Agent ? </label>
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
                                    <label class="col-md-2" for="mengerti_produk">Bagaimana Awal Pelanggan Berlangganan ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="mengerti_produk" class="form-control" placeholder="Pilih alasan berlangganan" id="mengerti_produk">
                                                        <option value="" selected>-- Pilih alasan berlangganan</option>
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
                                <div class="form-group row">
                                    <label class="col-md-2" for="proses_cabut">Proses Cabut Sulit ? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="proses_cabut" class="form-control" placeholder="Pilih Proses Cabut" id="proses_cabut">
                                                        <option value="" selected>-- Pilih Proses Cabut</option>
                                                        <option value="Tidak sulit">Tidak sulit</option>
                                                        <option value="Sulit">Sulit</option>

                                                    </select>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="proses_cabut2">Keterangan tambahan </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="proses_cabut2" class="form-control" placeholder="Masukkan keterangan" id="proses_cabut2">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="channel_favorit_pelanggan">Transaksi dengan Telkom via apa? </label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="channel_favorit_pelanggan" class="form-control" id="channel_favorit_pelanggan">
                                                        <option value="" selected>-- Pilih Channel Favorit Pelanggan --</option>
                                                        <option value="147">147</option>
                                                        <option value="Plasa">Plasa</option>
                                                        <option value="MyIndihome">MyIndihome</option>
                                                        <option value="Sosmed">Sosmed</option>
                                                        <option value="Moss">Moss</option>
                                                        <option value="Sales Lapangan">Sales Lapangan</option>
                                                        <option value="Teknisi">Teknisi</option>
														<option value="OBC">OBC</option>
														<option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-left">
                                    <button type="submit" name="ubah_tapping_cabut" class="btn btn-info" value="1">Simpan Tapping Cabut</button>
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