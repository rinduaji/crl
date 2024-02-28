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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Report Tapping Caring Paperless Closed</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Report</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Tapping Caring Paperless Closed</li>
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
                                        <th>TANGGAL CARRING</th>
										<th>ND INET</th>
                                        <th>ND POTS</th>
                                        <th>SERVICE</th>
                                        <th>ADDON</th>
                                        <th>KETERANGAN</th>
                                        <th>TANGGAL APPROVE</th>
										<th>ID TRACK</th>
										<th>KATEGORI HVC</th>
                                        <th>LOGIN</th>
                                        <th>STATUS CALL</th>
                                        <th>NAMA</th>
                                        <th>CONTACT PERSON</th>
                                        <th>HASIL CALL</th>
                                        <th>DECLINE</th>
										<th>REASON DECLINE</th>
										<th>SARAN</th>
                                        <th>KETERANGAN TAPPING</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $upd = $_SESSION['username'];
                                    $tanggal_awal = date("Y-m",strtotime('-1 months'))."-01 00:00:00";
                                    $tanggal_akhir = date("Y-m")."-31 23:59:59";
                                    $sql = "SELECT * FROM caring_paperless WHERE `status`='1' AND tgl_carring BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tgl_carring DESC";
                                    $sql_hasil = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($sql_hasil);
                                    if ($total > 0)
                                        while ($row = mysqli_fetch_array($sql_hasil)) {
                                           // $link_tapping = $row['status'] == 'Cabut' ? 'tapping_cabut.php' : 'tapping_ps.php';
                                           // $tanggal_cabut = date("Y-m-d",strtotime($row['tgl_cabut'])) == '1970-01-01' ? '' : date("l, d F Y",strtotime($row['tgl_ps'])); 
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>   
                                            <td><?= date("d/m/Y", strtotime($row['tgl_carring'])) ?></td>                                      
                                            <td><?= $row['nd_inet'] ?></td>
                                            <td><?= $row['nd_pots'] ?></td>
                                            <td><?= $row['service'] ?></td>
                                            <td><?= $row['addon'] ?></td>
                                            <td><?= $row['keterangan'] ?></td>
											<td><?= date("Y-m-d", strtotime($row['tgl_approve'])) ?></td>
											<td><?= $row['id_track'] ?></td>
                                            <td><?= $row['kat_hvc'] ?></td>
                                            <td><?= $row['login'] ?></td>
                                            <td><?= $row['status_call'] ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['cp'] ?></td>
                                            <td><?= $row['hasil_call'] ?></td>
											<td><?= $row['decline'] ?></td>
											<td><?= $row['reason_decline'] ?></td>
                                            <td><?= $row['saran'] ?></td>
                                            <td><?= $row['ket'] ?></td>
                                            
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