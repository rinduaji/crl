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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Decline Closed</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Report</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Tapping Decline</li>
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
                                        <th>TANGGAL TAPPING</th>
                                        <th>AGENT TIER 2</th>
                                        <th>TANGGAL CALL</th>
                                        <th>LOGIN</th>
                                        <th>NAMA AGENT</th>
                                        <th>FASTEL</th>
                                        <th>NAMA PELANGGAN</th>
                                        <th>RULE</th>
                                        <th>NO HP</th>
                                        <th>SITE</th>
                                        <th>ALASAN DECLINE</th>
                                        <th>STATUS</th>
                                        <th>ALASAN</th>
										<th>REKOMENDASI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $login = $_SESSION['username'];
                                    $tanggal_awal = date("Y-m",strtotime('-1 months'))."-01 00:00:00";
                                    $tanggal_akhir = date("Y-m")."-31 23:59:59";
                                    $sql = "SELECT id, lup, tgl, upd, nama, login, fastel, nama_dm, jenis, tlp, site, status_t2, alasan, rekom_t2, reason FROM app_tam_t2 WHERE status='Contacted' AND kategori='Not Agree' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY lup DESC";
                                    $sql_hasil = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($sql_hasil);
                                    if ($total > 0)
                                        while ($row = mysqli_fetch_array($sql_hasil)) {
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= date("d/m/Y H:i:s", strtotime($row['lup'])) ?></td>
                                            <td><?= $row['upd'] ?></td>
                                            <td><?= date("d/m/Y H:i:s", strtotime($row['tgl'])) ?></td>
                                            <td><?= $row['login'] ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['fastel'] ?></td>
                                            <td><?= $row['nama_dm'] ?></td>
                                            <td><?= $row['jenis'] ?></td>
                                            <td><?= $row['tlp'] ?></td>
                                            <td><?= $row['site'] ?></td>
                                            <td><?= $row['reason'] ?></td>
                                            <td><?= $row['status_t2'] ?></td>
                                            <td><?= $row['alasan'] ?></td>
											<td><?= $row['rekom_t2'] ?></td>
                                        </tr>
                                    <?php
                                            $no++;
                                        }
                                    else {
                                    ?>
                                        <tr>
                                            <th colspan="22">
                                                <center>Data Tidak Ditemukan</center>
                                            </th>
                                        </tr>
                                    <?php
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
    ?>ss