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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Report Tapping Caring SMOOA Closed</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Report</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Tapping Caring SMOOA Closed</li>
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
                                        <th>NDEM</th>
                                        <th>ADDON</th>
                                        <th>SUB ADDON</th>
                                        <th>KAWASAN</th>
                                        <th>WITEL</th>
                                        <th>DATEL</th>
										<th>STO</th>
										<th>CHANNEL</th>
                                        <th>TANGGAL VA</th>
                                        <th>UMUR</th>
                                        <th>GROUP TTI</th>
                                        <th>EXERNAL ORDER ID</th>
                                        <th>KCONTACT</th>
                                        <th>STATUS SC</th>
                                        <th>ORDER STATUS ID</th>
										<th>ORDER STATUS DETAIL</th>
										<th>HVC</th>
                                        <th>UPD</th>
                                        <th>STATUS CALL</th>
                                        <th>NAMA PELANGGAN</th>
                                        <th>KATEGORI</th>
                                        <th>NO PARENT</th>
                                        <th>NO TSEL1</th>
                                        <th>NO TSEL2</th>
                                        <th>EMAIL</th>
                                        <th>PAKET</th>
                                        <th>REASON PELANGGAN</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $upd = $_SESSION['username'];
                                    $tanggal_awal = date("Y-m",strtotime('-1 months'))."-01 00:00:00";
                                    $tanggal_akhir = date("Y-m")."-31 23:59:59";
                                    $sql = "SELECT id, ndem, addon, sub_addon, kawasan, witel, datel, sto, channel, tgl_va, umur, group_tti, external_order_id, kkontact, status_sc, order_status_id, order_status_detail, hvc, upd, status_call, nama_plg, kategori, no_parent, no_tsel1, no_tsel2, email, paket, reason, ket, tgl_input FROM caring_smooa WHERE `status`='1' AND tgl_input BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tgl_input DESC";
                                    $sql_hasil = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($sql_hasil);
                                    if ($total > 0)
                                        while ($row = mysqli_fetch_array($sql_hasil)) {
                                           // $link_tapping = $row['status'] == 'Cabut' ? 'tapping_cabut.php' : 'tapping_ps.php';
                                           // $tanggal_cabut = date("Y-m-d",strtotime($row['tgl_cabut'])) == '1970-01-01' ? '' : date("l, d F Y",strtotime($row['tgl_ps'])); 
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>                                            
                                            <td><?= date("d/m/Y", strtotime($row['tgl_input'])) ?></td>
                                            <td><?= $row['ndem'] ?></td>
                                            <td><?= $row['addon'] ?></td>
                                            <td><?= $row['sub_addon'] ?></td>
                                            <td><?= $row['kawasan'] ?></td>
                                            <td><?= $row['witel'] ?></td>
											<td><?= $row['datel'] ?></td>
											<td><?= $row['sto'] ?></td>
                                            <td><?= $row['channel'] ?></td>
                                            <td><?= date("Y-m-d", strtotime($row['tgl_va'])) ?></td>
                                            <td><?= $row['umur'] ?></td>
                                            <td><?= $row['group_tti'] ?></td>
                                            <td><?= $row['external_order_id'] ?></td>
											<td><?= $row['kkontact'] ?></td>
											<td><?= $row['status_sc'] ?></td>
                                            <td><?= $row['order_status_id'] ?></td>
                                            <td><?= $row['order_status_detail'] ?></td>
                                            <td><?= $row['hvc'] ?></td>
											<td><?= $row['upd'] ?></td>
                                            <td><?= $row['status_call'] ?></td>
                                            <td><?= $row['nama_plg'] ?></td>
                                            <td><?= $row['kategori'] ?></td>
                                            <td><?= $row['no_parent'] ?></td>
                                            <td><?= $row['no_tsel1'] ?></td>
											<td><?= $row['no_tsel2'] ?></td>
											<td><?= $row['email'] ?></td>
                                            <td><?= $row['paket'] ?></td>
                                            <td><?= $row['reason'] ?></td>
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