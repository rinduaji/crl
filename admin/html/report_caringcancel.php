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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Report Caring Cancel</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Report</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Caring Cancel</li>
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
                                        <th>LUP</th>
                                        <th>ND</th>
                                        <th>CARING ID</th>
                                        <th>SERVICE</th>
                                        <th>ITEM</th>
										<th>KAWASAN</th>
                                        <th>TGL APPRV</th>
                                        <th>TGL CREATE</th>
										<th>GETSIM MSG</th>
										<th>KETERANGAN</th>
                                        <th>ORDER ID</th>
                                        <th>XS5</th>
                                        <th>XS6</th>
                                        <th>X LAST MILESTONE</th>
                                        <th>INTEGRATION MESSAGE</th>
                                        <th>SCID</th>
                                        <th>XS7</th>
										<th>NO HP</th>
										<th>EMAIL</th>
                                        <th>STATUS PROV</th>
                                        <th>UPD</th>
                                        <th>NAMA PELANGGAN</th>
                                        <th>STATUS CALL</th>
                                        <th>RELASI</th>
                                        <th>INFO PENAWARAN</th>
										<th>PENYAMPAIAN AGENT</th>
                                        <th>ALASAN CANCEL</th>
                                        <th>DETAIL</th>
                                        <th>SARAN</th>
                                        <th>HASIL CALL</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $upd = $_SESSION['username'];
                                    $tanggal_awal = date("Y-m",strtotime('-1 months'))."-01";
                                    $tanggal_akhir = date("Y-m")."-31";
                                    $sql = "SELECT id, lup, nd, caring_id, service, item, tgl_apprv, tgl_create, getsim_msg, keterangan, orderid, xs5, xs6, ndem, x_last_milestone, x_integration_message, scid, xs7, no_hp, email, status_prov, upd, status_call, nama_plg, relasi, info_penawaran, penyampaian_agent, alasan_cancel, detail, saran, hasil_call, ket, lup FROM caring_cancel WHERE `input`='1' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY lup DESC";
                                    $sql_hasil = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($sql_hasil);
                                    if ($total > 0) {
                                        while ($row = mysqli_fetch_array($sql_hasil)) {
                                           // $link_tapping = $row['status'] == 'Cabut' ? 'tapping_cabut.php' : 'tapping_ps.php';
                                           // $tanggal_cabut = date("Y-m-d",strtotime($row['tgl_cabut'])) == '1970-01-01' ? '' : date("l, d F Y",strtotime($row['tgl_ps'])); 
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= date("d/m/Y", strtotime($row['lup'])) ?></td>
                                            <td><?= $row['nd'] ?></td>
                                            <td><?= $row['caring_id'] ?></td>
                                            <td><?= $row['service'] ?></td>
											<td><?= $row['item'] ?></td>
                                            <td><?= $row['tgl_apprv'] ?></td>
                                            <td><?= $row['tgl_create'] ?></td>
											<td><?= $row['getsim_msg'] ?></td>
											<td><?= $row['keterangan'] ?></td>
                                            <td><?= $row['orderid'] ?></td>
                                            <td><?= $row['xs5'] ?></td>
                                            <td><?= $row['xs6'] ?></td>
                                            <td><?= $row['ndem'] ?></td>
                                            <td><?= $row['x_last_milestone'] ?></td>
											<td><?= $row['x_integration_message'] ?></td>
											<td><?= $row['scid'] ?></td>
                                            <td><?= $row['xs7'] ?></td>
                                            <td><?= $row['no_hp'] ?></td>
                                            <td><?= $row['email'] ?></td>
											<td><?= $row['status_prov'] ?></td>
											<td><?= $row['upd'] ?></td>
											<td><?= $row['nama_plg'] ?></td>
                                            <td><?= $row['status_call'] ?></td>
                                            
                                            <td><?= $row['relasi'] ?></td>
                                            <td><?= $row['info_penawaran'] ?></td>
											<td><?= $row['penyampaian_agent'] ?></td>
                                            <td><?= $row['alasan_cancel'] ?></td>
											<td><?= $row['detail'] ?></td>
											<td><?= $row['saran'] ?></td>
                                            <td><?= $row['hasil_call'] ?></td>
                       
                                            <td><?= $row['ket'] ?></td>
                                           
                                        </tr>
                                    <?php
                                        $no++;
                                        }
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