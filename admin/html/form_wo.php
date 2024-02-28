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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Form Data WO</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Form</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">WO</li>
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
                                        <th>TANGGAL UPLOAD WO</th>
                                        <th>KAWASAN</th>
                                        <th>C_WITEL</th>
                                        <th>WITEL</th>
                                        <th>NDEM</th>
                                        <th>NDEM PS</th>
                                        <th>NDEM CABUT</th>
                                        <th>ND INET</th>
                                        <th>ADDON</th>
                                        
                                        <th>ITEM PS</th>
                                        <th>ITEM CABUT</th>
                                        <th>STATUS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $login = $_SESSION['username'];
                                    $tanggal_awal =  date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m")."-01 00:00:00" ) ) . "-1 month" ) ); 
                                    $tanggal_akhir = date("Y-m")."-31 23:59:59";
                                    $sql = "SELECT id, tgl_upload, kawasan, c_witel, witel, ndem, ndem_ps, ndem_cabut, nd_speedy, addon, item_ps, item_cabut, status, login FROM hasil_survey 
									WHERE login = '$login' AND input='0' ORDER BY tgl_upload DESC LIMIT 0,5000";
                                    $sql_hasil = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($sql_hasil);
                                    if ($total > 0)
                                        while ($row = mysqli_fetch_array($sql_hasil)) {
                                            $link_tapping = $row['status'] == 'Cabut' ? 'tapping_cabut.php' : 'tapping_ps.php';
                                            $tanggal_cabut = date("Y-m-d", strtotime($row['tgl_cabut'])) == '1970-01-01' ? '' : date("d/m/Y", strtotime($row['tgl_ps']));
                                            //if($login == "143272" OR $login == "31184" OR $login =="20359" OR $login == "68942" OR $login == "99541" OR $login =="92734" ) {
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= date("d/m/Y H:i:s", strtotime($row['tgl_upload']))  ?></td>
                                            <td><?= $row['kawasan'] ?></td>
                                            <td><?= $row['c_witel'] ?></td>
                                            <td><?= $row['witel'] ?></td>
                                            <td><?= $row['ndem'] ?></td>
                                            <td><?= $row['ndem_ps'] ?></td>
                                            <td><?= $row['ndem_cabut'] ?></td>
                                            <td><?= $row['nd_speedy'] ?></td>
                                            <td><?= $row['addon'] ?></td>
                                            
                                            <td><?= $row['item_ps'] ?></td>
                                            <td><?= $row['item_cabut'] ?></td>
                                            
                                            <td><?= $row['status'] ?></td>
                                            <td><a href="<?= $link_tapping . '?id=' . $row['id'] ?>" class="btn btn-primary">Survey</a></td>
                                        </tr>
                                    <?php
                                            //}
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