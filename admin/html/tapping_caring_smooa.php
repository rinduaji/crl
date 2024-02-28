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

$sql = "SELECT id, ndem, addon, sub_addon, kawasan, witel, datel, sto, channel, tgl_va, umur, group_tti, external_order_id, kkontact, status_sc, order_status_id, order_status_detail, hvc FROM caring_smooa WHERE id='$id'";
$hasil = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($hasil);

if (isset($ubah_survey)) {
    if ($upd != NULL or $upd != "") {
        $tanggal_now = date("Y-m-d");
        $query1 = "UPDATE caring_smooa SET status_call = '$status_call', nama_plg = '$nama_plg', kategori = '$kategori', no_parent = '$no_parent', no_tsel1 = '$no_tsel1', no_tsel2 = '$no_tsel2', email = '$email', paket = '$paket', reason = '$reason', ket = '$ket', tgl_input='$tanggal_now', upd='$upd', `status`='1' 
		WHERE id = '$id'";
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
                            <li class="breadcrumb-item text-muted active" aria-current="page">Caring SMOOA </li>
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
                        <form action="tapping_caring_smooa.php" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <h4 class="card-title">Data Tapping</h4>
                                <br>
                                <input type="hidden" name="id" class="form-control" value="<?= $row['id'] ?>">
                                
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
                                    <label class="col-md-2" for="sub_addon">SUB ADDON</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="sub_addon" class="form-control" id="sub_addon" value="<?= $row['sub_addon'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="kawasan">KAWASAN</label>
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
                                    <label class="col-md-2" for="witel">WITEL</label>
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
                                    <label class="col-md-2" for="datel">DATEL</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="datel" class="form-control" id="datel" value="<?= $row['datel'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="sto">STO</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="sto" class="form-control" id="sto" value="<?= $row['sto'] ?>" disabled>
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
                                    <label class="col-md-2" for="tgl_va">TANGGAL VA</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="tgl_va" class="form-control" id="tgl_va" value="<?= $row['tgl_va'] ?>" disabled>
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
                                    <label class="col-md-2" for="group_tti">GROUP TTI</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="group_tti" class="form-control" id="group_tti" value="<?= $row['group_tti'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="external_order_id">EXTERNAL ORDER ID</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="external_order_id" class="form-control" id="external_order_id" value="<?= $row['external_order_id'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="kkontact">KCONTACT</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="kkontact" class="form-control" id="kkontact" disabled><?= $row['kkontact'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="status_sc">STATUS SC</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="status_sc" class="form-control" id="status_sc" value="<?= $row['status_sc'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="order_status_id">ORDER STATUS ID</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="order_status_id" class="form-control" id="order_status_id" value="<?= $row['order_status_id'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="order_status_detail">ORDER STATUS DETAIL</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="order_status_detail" class="form-control" id="order_status_detail" value="<?= $row['order_status_detail'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="hvc">HVC</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="hvc" class="form-control" id="hvc" value="<?= $row['hvc'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title">TAPPING CARING SMOOA</h4>
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
                                                        <option value="Fax-Modem">Fax-Modem</option>
                                                        <option value="Line Busy">Line Busy</option>
                                                        <option value="Mail Box-Memo-Announcement">Mail Box-Memo-Announcement</option>
                                                        <option value="Telepon Tulalit">Telepon Tulalit</option>
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
                                                    <input type="text" name="nama_plg" class="form-control" placeholder="Masukkan Nama Pelanggan" id="nama_plg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-md-2" for="kategori">KATEGORI</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="kategori" class="form-control" placeholder="Pilih Kategori" id="kategori">
                                                        <option value="" selected>-- Pilih Kategori</option>
                                                        <option value="Follow Up">Follow Up</option>
                                                        <option value="Pelanggan masih pikir- pikir">Pelanggan masih pikir- pikir</option>
                                                        <option value="Pelanggan Melakukan Pembatalan">Pelanggan Melakukan Pembatalan</option>
                                                        <option value="Pelanggan Masih Bersedia">Pelanggan Masih Bersedia</option>
                                                        <option value="Pelanggan Tidak Merasa Registrasi">Pelanggan Tidak Merasa Registrasi</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="no_parent">NO PARENT</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="number" name="no_parent" class="form-control" placeholder="Masukkan No Parent" id="no_parent">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="no_tsel1">NO TSEL 1</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="number" name="no_tsel1" class="form-control" placeholder="Masukkan No Tsel 1" id="no_tsel1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="no_tsel2">NO TSEL 2</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="number" name="no_tsel2" class="form-control" placeholder="Masukkan No Tsel 2" id="no_tsel2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="email">Email</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" id="email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="paket">PAKET</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="paket" class="form-control" placeholder="Pilih Paket" id="paket">
                                                        <option value="" selected>-- Pilih Paket</option>
                                                        <option value="Smooa Silver - 75000">Smooa Silver - 75000</option>
                                                        <option value="Smooa Gold - 155000">Smooa Gold - 155000</option>
                                                        <option value="Smooa Platinum - 280000">Smooa Platinum - 280000</option>
                                                        <option value="Smooa Diamond - 625000">Smooa Diamond - 625000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="reason">REASON PELANGGAN MELAKUKAN PEMBATALAN</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="reason" class="form-control" placeholder="Pilih Reason Pelanggan" id="reason">
                                                        <option value="" selected>-- Pilih Reason Pelanggan</option>
                                                        <option value="Proses Terlalu Lama">Proses Terlalu Lama</option>
                                                        <option value="Sudah menggunakan Paket lain">Sudah menggunakan Paket lain</option>
                                                        <option value="Tidak Ada Nomor lain">Tidak Ada Nomor lain</option>
                                                        <option value="Tarif Mahal">Tarif Mahal</option>
                                                        <option value="Masih Belum Butuh">Masih Belum Butuh</option>
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
                                                    <textarea name="ket" class="form-control" placeholder="Keterangan" id="ket"></textarea>
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