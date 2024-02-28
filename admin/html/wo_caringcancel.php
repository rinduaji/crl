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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Form WO Caring Cancel</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Form</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">WO Caring Cancel</li>
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
                                        <th>ND</th>
                                        <th>CARING ID</th>
                                        <th>SERVICE</th>
                                        <th>ITEM</th>
                                        <th>TGL_APPRV</th>
                                        <th>TGL_CREATE</th>
                                        <th>GETSIM_MSG</th>
                                        <th>TGL_UPLOAD_DATA</th>
										<th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $upd = $_SESSION['username'];
                                    //$tanggal_awal = date("Y-m-d") . " 00:00:00";
                                    //$tanggal_akhir = date("Y-m-d") . " 23:59:59";
                                    $sql = "SELECT id, nd, caring_id, service, item, tgl_apprv, tgl_create, getsim_msg,tgl_upload FROM caring_cancel WHERE input='0' ";  
									
                                    $sql_hasil = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($sql_hasil);
                                    if ($total > 0)
                                        while ($row = mysqli_fetch_array($sql_hasil)) {
                                            
                                    ?>
                                        <tr>
                                            
                                            <td><?= $row['nd'] ?></td>
                                            <td><?= $row['caring_id'] ?></td>
                                            <td><?= $row['service'] ?></td>
                                            <td><?= $row['item'] ?></td>
                                            <td><?= $row['tgl_apprv'] ?></td>
											<td><?= $row['tgl_create'] ?></td>
											<td><?= $row['getsim_msg'] ?></td>
                                            <td><?= date("Y-m-d", strtotime($row['tgl_upload'])) ?></td>
                                      
                                            <td><a href="caring_cancel.php?id=<?=$row['id']?>" class="btn btn-primary">Caring</a></td>
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