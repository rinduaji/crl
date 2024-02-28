<?php
include("sidebar.php");

if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}

include("../../assets/conn.php");

if($login != "" OR $login != NULL) {
$nama_array =  explode(" ",$nama);
$nama_email .= $nama_array[0];

for($i=1; $i<count($nama_array);$i++){
    $nama_email .= "-".$nama_array[$i];
}

$email = trim($nama_email)."@cctelkom.web.id";
$password = md5("infomedia");
$user_regdate = mktime();

$query1 = "INSERT INTO main_users (username, user_email, user_password, user_regdate, user_avatar, name) VALUES ('$login', '$email', '$password', '$user_regdate', 'gallery/blank.gif', '$nama')";
    // echo "<script>alert('$query1')</script>";
if (!mysqli_query($con, $query1)) {
    echo "<script>window.location.href = window.location.origin + window.location.pathname + '?status=gagal'</script>";
}

$sql = "select user_id from main_users where username='$login'";
$hasil = mysqli_query($con, $sql);
$row = mysqli_fetch_row($hasil);
$id_main_user = $row[0];

$query2 = "insert into main_users_extended (id, user_id, user1,user2,user3,user4,user5,user12,user13) values ('$id_main_user','$id_main_user','$login','$nama','$jabatan','$jenis_kelamin','$area','nopict.jpg','AKTIF')";
if (!mysqli_query($con, $query2)) {
    echo "<script>window.location.href = window.location.origin + window.location.pathname + '?status=gagal'</script>";
}
else {
    echo "<script>window.location.href = window.location.origin + window.location.pathname + '?status=succes'</script>";
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Form User</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.php" class="text-muted">User</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">New User</li>
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
                        <form action="add_user.php" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-2" for="login">Login</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="login" class="form-control" placeholder="Masukkan Login" id="login">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="nama">Nama</label>
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
                                    <label class="col-md-2" for="jenis_kelamin">Jenis Kelamin</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="jenis_kelamin" class="form-control" placeholder="Pilih Jenis Kelamin" id="jenis_kelamin">
                                                        <option value="Pria">Pria</option>
                                                        <option value="Wanita">Wanita</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="area">Area</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="area" class="form-control" placeholder="Pilih Area" id="area">
                                                        <option value="BSD">BSD</option>
                                                        <option value="CW">CW</option>
                                                        <option value="Bandung">BANDUNG</option>
                                                        <option value="Medan">MEDAN</option>
                                                        <option value="Malang">MALANG</option>
                                                        <option value="Makassar">MAKASSAR</option>
                                                        <option value="Semarang">SEMARANG</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="jabatan">Jabatan</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select name="jabatan" class="form-control" placeholder="Pilih Jabatan" id="jabatan">
                                                        <option value="Admin">Admin</option>
                                                        <option value="Agent TAM">Agent TAM</option>
                                                        <option value="Agent T2">Agent T2</option>
                                                        <option value="Duktek">Duktek</option>
                                                        <option value="qa">QA</option>
                                                        <option value="Supervisor TAM DCS">Supervisor TAM DCS</option>
                                                        <option value="Tabber TAM">Tabber TAM</option>
                                                        <option value="Trainer">Trainer</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-left">
                                    <button type="submit" name="upload" class="btn btn-info" value="1">Simpan</button>
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