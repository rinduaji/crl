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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Form WO Caring Paperless</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Form</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">WO Caring Paperless</li>
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
                                <thead class="thead-purple" >
                                    <tr>
                                        <th>NO</th>
                                        <th>ND INET</th>
                                        <th>ND POTS</th>
                                        <th>SERVICE</th>
                                        <th>ADDON</th>
                                        <th>KETERANGAN</th>
                                        <th>TANGGAL APPROVE</th>
										<th>ID TRACK</th>
										<th>KATEGORI HVC</th>
										<th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $upd = $_SESSION['username'];
                                    //$tanggal_awal = date("Y-m-d") . " 00:00:00";
                                    //$tanggal_akhir = date("Y-m-d") . " 23:59:59";
                                    $sql = "SELECT * FROM caring_paperless WHERE `status`='0' and `login`='$upd'";
                                    $sql_hasil = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($sql_hasil);
                                    if ($total > 0)
                                        while ($row = mysqli_fetch_array($sql_hasil)) {
                                            // $link_tapping = $row['follow'] == 'New' ? 'tapping_caring_Paperless.php' : 'form_wo_caring_Paperless.php';
                                            //$tanggal_cabut = date("Y-m-d", strtotime($row['tgl_cabut'])) == '1970-01-01' ? '' : date("l, d F Y", strtotime($row['tgl_ps']));
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['nd_inet'] ?></td>
                                            <td><?= $row['nd_pots'] ?></td>
                                            <td><?= $row['service'] ?></td>
                                            <td><?= $row['addon'] ?></td>
                                            <td><?= $row['keterangan'] ?></td>
											<td><?= date("Y-m-d", strtotime($row['tgl_approve'])) ?></td>
											<td><?= $row['id_track'] ?></td>
                                            <td><?= $row['kat_hvc'] ?></td>
                                            <td><a href="tapping_caring_paperless.php?id=<?=$row['id']?>" class="btn btn-primary">Tapping</a></td>
                                        </tr>
                                    <?php
                                            $no++;
                                        }
                                    else {
                                    ?>
                                        <tr>
                                            <th colspan="23">
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
    ?>