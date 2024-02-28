<?php
include("sidebar.php");
?>
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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Form WO TAPPING SURVEY</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Form</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">TAPPING SURVEY PS - CABUT</li>
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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table1" class="display">
                                <thead class="thead-purple">
                                    <tr>
                                        <th>NO</th>
                                        <th>TANGGAL CALL</th>
                                        <th>LOGIN AGENT</th>
                                        <th>JENIS PENAWARAN</th>
                                        <th>TELPON TUMPANGAN</th>
                                        <th>REKAMAN</th>
                                        <th>STATUS CALL</th>
                                        <th>SURVEY</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $upd = $_SESSION['username'];
                                    //$tanggal_awal = date("Y-m-d", strtotime("-5 days")) . " 00:00:00";
                                    //$tanggal_akhir = date("Y-m-d", strtotime("-5 days")) . " 23:59:59";
                                    $hari = date("d");
                                    $bulan = date("m");
                                    $tahun = date("Y");
                                    $sql_lup = "SELECT id, addon, nd_speedy, status_call, status, login, upd, lup, no_hp FROM hasil_survey WHERE status_call='Contacted Bertemu YBS' AND input='1' AND upd='$upd' AND DATE(lup2) = '$hari' AND MONTH(lup2) = '$bulan' AND YEAR(lup2) = '$tahun'";
                                    $sql_hasil_lup = mysqli_query($con, $sql_lup);
                                    $total_lup = mysqli_num_rows($sql_hasil_lup);

                                    if ($total_lup == 0) {
                                        $sql_total = "SELECT id, addon, nd_speedy, status_call, status, login, upd, lup, no_hp FROM hasil_survey WHERE status_call='Contacted Bertemu YBS' AND input='1' AND upd='$upd' LIMIT 0,50";
                                        $sql_hasil_total = mysqli_query($con, $sql_total);
                                        $total_data = mysqli_num_rows($sql_hasil_total);
                                        if ($total_data > 0) {
                                            while ($row = mysqli_fetch_array($sql_hasil_total)) {
                                                $update = "UPDATE hasil_survey SET input2 = 1 WHERE id=" . $row['id'];
                                                mysqli_query($con, $update);
                                            }
                                        }
                                    }
                                    if ($total_lup < 6) {
                                        print_r('test');
                                        $sql = "SELECT id, addon, nd_speedy, status_call, status, login, upd, lup, no_hp FROM hasil_survey WHERE status_call='Contacted Bertemu YBS' AND input='1' AND upd='$upd' AND input2='1'";
                                        $sql_hasil = mysqli_query($con, $sql);
                                        $total = mysqli_num_rows($sql_hasil);

                                        if ($total > 0) {
                                            while ($row = mysqli_fetch_array($sql_hasil)) {
                                                $link_tapping = $row['status'] == 'Cabut' ? 'tapping_survey.php' : 'tapping_surveyps.php';

                                                //$tanggal_cabut = date("Y-m-d", strtotime($row['tgl_cabut'])) == '1970-01-01' ? '' : date("l, d F Y", strtotime($row['tgl_ps']));
                                                if ($upd != '143272' and $upd != '31184') {
                                    ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td><?= date("d/m/Y H:i:s", strtotime($row['lup'])) ?></td>
                                                        <td><?= $row['login'] ?></td>
                                                        <td><?= $row['addon'] ?></td>
                                                        <td><?= $row['nd_speedy'] ?></td>
                                                        <td><?= $row['no_hp'] ?></td>
                                                        <td><?= $row['status_call'] ?></td>
                                                        <td><?= $row['status'] ?></td>
                                                        <td><a href="<?= $link_tapping . '?id=' . $row['id'] ?>" class="btn btn-primary">Tapping</a></td>
                                                    </tr>
                                            <?php
                                                    $no++;
                                                }
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <th colspan="23">
                                                    <center>Data Tidak Ditemukan</center>
                                                </th>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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
    <?php
    include("footer.php");
    ?>