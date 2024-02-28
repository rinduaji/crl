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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Survey Closed</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Report</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Tapping Survey Closed</li>
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
                                        <th>TANGGAL UPLOAD</th>
										<th>LUP</th>
                                        <th>NAMA AGENT</th>
                                        <th>JENIS PENAWARAN</th>
                                        <th>FASTEL</th>
                                        <th>REKAMAN</th>
										<th>HASIL TAPPING</th>
                                        <th>ALASAN</th>
										<th>UPDATER</th>
										
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $upd = $_SESSION['username'];
                                    $tanggal_awal = date("Y-m-d")." 00:00:00";
                                    $tanggal_akhir = date("Y-m-d")." 23:59:59";
                                    $sql = "SELECT id, tgl, lup, nama, jenis, fastel, tlp, status_t2, alasan, upd FROM app_tam_t2 WHERE input2='3' ";
                                    $sql_hasil = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($sql_hasil);
                                    if ($total > 0)
                                        while ($row = mysqli_fetch_array($sql_hasil)) {
                                           // $link_tapping = $row['status'] == 'Cabut' ? 'tapping_cabut.php' : 'tapping_ps.php';
                                           // $tanggal_cabut = date("Y-m-d",strtotime($row['tgl_cabut'])) == '1970-01-01' ? '' : date("l, d F Y",strtotime($row['tgl_ps'])); 
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= date("d/m/Y H:i:s", strtotime($row['tgl'])) ?></td>
                                            <td><?= date("d/m/Y H:i:s", strtotime($row['lup'])) ?></td>
											
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['jenis'] ?></td>
                                            <td><?= $row['fastel'] ?></td>
                                            <td><?= $row['tlp'] ?></td>
                                            <td><?= $row['status_t2'] ?></td>
                                            <td><?= $row['alasan'] ?></td>
                                            <td><?= $row['upd'] ?></td>
											
                                           
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
    ?>s