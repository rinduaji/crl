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

$sql = "SELECT * FROM caring_paperless WHERE id='$id'";
$hasil = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($hasil);

if (isset($ubah_survey)) {
    if ($upd != NULL or $upd != "") {
        $tanggal_now = date("Y-m-d");
        $query1 = "UPDATE caring_paperless SET status_call = '$status_call', nama = '$nama', cp = '$cp', hasil_call = '$hasil_call', decline = '$decline', 
                    reason_decline = '$reason_decline', saran = '$saran', ket = '$ket', tgl_carring = '$tanggal_now', `status` = '1' WHERE id = '$id'";
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
                            <li class="breadcrumb-item text-muted active" aria-current="page">Caring Paperless </li>
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
                        <form action="tapping_caring_paperless.php" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <h4 class="card-title">Data Tapping</h4>
                                <br>
                                <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>">
                                
                                <div class="form-group row">
                                    <label class="col-md-2" for="nd_inet">ND INET</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="nd_inet" class="form-control" id="nd_inet" value="<?= $row['nd_inet'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="nd_pots">ND POTS</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="nd_pots" class="form-control" id="nd_pots" value="<?= $row['nd_pots'] ?>" disabled>
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
                                    <label class="col-md-2" for="addon">ADDON</label>
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
                                    <label class="col-md-2" for="keterangan">KETERANGAN</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <tetarea name="keterangan" class="form-control" id="keterangan" disabled><?= $row['keterangan'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="tgl_approve">TANGGAL APPROVE</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="date" name="tgl_approve" class="form-control" id="tgl_approve" value="<?= $row['tgl_approve'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="id_track">ID TRACK</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="id_track" class="form-control" id="id_track" value="<?= $row['id_track'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="kat_hvc">KATEGORI HVC</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="kat_hvc" class="form-control" id="kat_hvc" value="<?= $row['kat_hvc'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title">TAPPING CARING PAPERLESS</h4>
                                <br>
                                <div class="form-group row">
                                    <label class="col-md-2" for="status_call">STATUS CALL</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="status_call" class="form-control" placeholder="Pilih hasil" id="status_call">
                                                        <option value="" selected>-- Pilih Status Call</option>
                                                        <option value="Contacted">Contacted</option>
                                                        <option value="RNA">RNA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="nama">NAMA</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" id="nama">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="cp">CONTACT PERSON</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="cp" class="form-control" placeholder="Masukkan Contact Person" id="cp">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="hasil_call">HASIL CALL</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="hasil_call" class="form-control" placeholder="Pilih Hasil Call" id="hasil_call">
                                                        <option value="" selected>-- Pilih Hasil Call --</option>
                                                        <option value="Sukses upload Berkas">Sukses upload Berkas</option>
                                                        <option value="Informasi upload berkas sudah tersampaikan, Pelanggan tidak bersedia di pandu">Informasi upload berkas sudah tersampaikan, Pelanggan tidak bersedia di pandu</option>
                                                        <option value="Pelanggan minta Batal">Pelanggan minta Batal</option>
                                                        <option value="Follow up">Follow up</option>
                                                        <option value="sudah aktif">Sudah aktif</option>
                                                        <option value="Sudah aktif tanpa menerima link paperless">Sudah aktif tanpa menerima link paperless</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="decline">DECLINE</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="decline" class="form-control" placeholder="Pilih Decline" id="decline">
                                                        <option value="" selected>-- Pilih Decline --</option>
                                                        <option value="Price">Price</option>
                                                        <option value="Product">Product</option>
                                                        <option value="Process">Process</option>
                                                        <option value="Physical">Physical</option>
                                                        <option value="People">People</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="reason_decline">REASON DECLINE</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="reason_decline" class="form-control" placeholder="Pilih Reason Decline" id="reason_decline">
                                                        <option value="" selected>-- Pilih Reason Decline --</option>
                                                        <!-- <option value="efisiensi">efisiensi</option>
                                                        <option value="mahal">mahal</option>

                                                        <option value="alat tidak bisa di gunakan">alat tidak bisa di gunakan</option>
                                                        <option value="benefit kurang menarik">benefit kurang menarik</option>
                                                        <option value="cukup dengan Paket sebelumnya">cukup dengan Paket sebelumnya</option>
                                                        <option value="jarang di gunakan">jarang di gunakan</option>
                                                        <option value="sering gangguan">sering gangguan</option>
                                                        <option value="user berkurang">user berkurang</option>
                                                        <option value="Paket Sudah Tersedia">Paket Sudah Tersedia</option>

                                                        <option value="cabut indihome">cabut indihome</option>
                                                        <option value="ganti paket">ganti paket</option>
                                                        <option value="kendala teknis">kendala teknis</option>
                                                        <option value="Pindah Alamat">Pindah Alamat</option>
                                                        <option value="salah pilih paket">salah pilih paket</option>
                                                        <option value="tidak ada tv">cukup dengan Paket sebelumnya</option>
                                                        <option value="tv rusak">tv rusak</option>
                                                        <option value="Indikasi Cabut">Indikasi Cabut</option>

                                                        <option value="belum ada pemasangan">belum ada pemasangan</option>
                                                        <option value="tidak merasa daftar">tidak merasa daftar</option>
                                                        <option value="link terlalu lama diterima">link terlalu lama diterima</option>

                                                        <option value="informasi tidak sesuai">informasi tidak sesuai</option>
                                                        <option value="tidak berkenan disurvey">tidak berkenan disurvey</option>
                                                        <option value="ingin berlangganan add on lain">ingin berlangganan add on lain</option>
                                                        <option value="tidak bersedia upload data diiri">tidak bersedia upload data diiri</option>
                                                        <option value="pelanggan belum paham">pelanggan belum paham</option>
                                                        <option value="keluarga tidak setuju">keluarga tidak setuju</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="saran">SARAN</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="saran" class="form-control" placeholder="Masukkan Saran" id="saran"></textarea>
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
                                                    <textarea name="ket" class="form-control" placeholder="Masukkan Keterangan" id="ket"></textarea>
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