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
$sql = "select username, user_email, user_password, name, user3, user4, user5 from main_users as a INNER JOIN main_users_extended as b ON a.user_id=b.user_id where a.username='$login'";
$hasil = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($hasil);

if (isset($ubah_password)) {
    if ($login != NULL or $login != "") {
        $sql1 = "select user_password from main_users where username='$login'";
        $hasil1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_row($hasil1);

        if ($row1[0] == md5($old_password)) {
            $query1 = "UPDATE main_users SET user_email = '$email', user_password = '" . md5($new_password) . "' WHERE username = '$login'";
            // echo "<script>alert('$query1')</script>";
            if (!mysqli_query($con, $query1)) {
                echo "<script>window.location.href = window.location.origin + window.location.pathname + '?status=gagal'</script>";
            }
            $jabatan = $row['user3'];
            $jenis_kelamin = $row['user4'];
            $area = $row['user5'];
            $query2 = "UPDATE main_users_extended SET user3 = '$jabatan', user4 = '$jenis_kelamin' ,user5 = '$area' WHERE user1='$login'";
            if (!mysqli_query($con, $query2)) {
                echo "<script>window.location.href = window.location.origin + window.location.pathname + '?status=gagal'</script>";
            } else {
                echo "<script>window.location.href = window.location.origin + window.location.pathname + '?status=succes'</script>";
            }
        }
        else{
            echo "<script>window.location.href = window.location.origin + window.location.pathname + '?status=pass_not_same'</script>";
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">My Profile</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.php" class="text-muted">User</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Profile User</li>
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
                        <form action="profile.php" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-2" for="login">Login</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="login" class="form-control" placeholder="Masukkan Login" id="login" value="<?= $row['username'] ?>" disabled>
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
                                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" id="nama" value="<?= $row['name'] ?>" disabled>
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
                                                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" id="email" value="<?= $row['user_email'] ?>">
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
                                                    <select name="jenis_kelamin" class="form-control" placeholder="Pilih Jenis Kelamin" id="jenis_kelamin" disabled>
                                                        <option value="Pria" <?php if ($row['user4'] == "Pria") {
                                                                                    echo "selected";
                                                                                } ?>>Pria</option>
                                                        <option value="Wanita" <?php if ($row['user4'] == "Wanita") {
                                                                                    echo "selected";
                                                                                } ?>>Wanita</option>
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
                                                    <select name="area" class="form-control" placeholder="Pilih Area" id="area" disabled>
                                                        <option value="BSD" <?php if ($row['user5'] == "BSD") {
                                                                                echo "selected";
                                                                            } ?>>BSD</option>
                                                        <option value="CW" <?php if ($row['user5'] == "CW") {
                                                                                echo "selected";
                                                                            } ?>>CW</option>
                                                        <option value="Bandung" <?php if ($row['user5'] == "Bandung") {
                                                                                    echo "selected";
                                                                                } ?>>BANDUNG</option>
                                                        <option value="Medan" <?php if ($row['user5'] == "Medan") {
                                                                                    echo "selected";
                                                                                } ?>>MEDAN</option>
                                                        <option value="Malang" <?php if ($row['user5'] == "Malang") {
                                                                                    echo "selected";
                                                                                } ?>>MALANG</option>
                                                        <option value="Makassar" <?php if ($row['user5'] == "Makassar") {
                                                                                        echo "selected";
                                                                                    } ?>>MAKASSAR</option>
                                                        <option value="Semarang" <?php if ($row['user5'] == "Semarang") {
                                                                                        echo "selected";
                                                                                    } ?>>SEMARANG</option>
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
                                                    <select name="jabatan" class="form-control" placeholder="Pilih Jabatan" id="jabatan" disabled>
                                                        <option value="Admin" <?php if ($row['user3'] == "Admin") {
                                                                                    echo "selected";
                                                                                } ?>>Admin</option>
                                                        <option value="Agent TAM" <?php if ($row['user3'] == "Agent TAM") {
                                                                                        echo "selected";
                                                                                    } ?>>Agent TAM</option>
                                                        <option value="Agent T2" <?php if ($row['user3'] == "Agent T2") {
                                                                                        echo "selected";
                                                                                    } ?>>Agent T2</option>
                                                        <option value="Duktek" <?php if ($row['user3'] == "Duktek") {
                                                                                    echo "selected";
                                                                                } ?>>Duktek</option>
                                                        <option value="qa" <?php if ($row['user3'] == "qa") {
                                                                                echo "selected";
                                                                            } ?>>QA</option>
                                                        <option value="Supervisor TAM DCS" <?php if ($row['user3'] == "Supervisor TAM DCS") {
                                                                                                echo "selected";
                                                                                            } ?>>Supervisor TAM DCS</option>
                                                        <option value="Tabber TAM" <?php if ($row['user3'] == "Tabber TAM") {
                                                                                        echo "selected";
                                                                                    } ?>>Tabber TAM</option>
                                                        <option value="Trainer" <?php if ($row['user3'] == "Trainer") {
                                                                                    echo "selected";
                                                                                } ?>>Trainer</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="old_password">Old Password</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="password" name="old_password" class="form-control" placeholder="Masukkan Old Password" id="old_password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2" for="new_password">New Password</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="password" name="new_password" class="form-control" placeholder="Masukkan New Password" id="new_password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-left">
                                    <button type="submit" name="ubah_password" class="btn btn-info" value="1">Ubah Password</button>
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