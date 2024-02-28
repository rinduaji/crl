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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Survey Cabut Closed</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Report</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Cabut Closed</li>
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
                                        <th>AGENT TAPPING</th>
                                        <th>LUP</th>
                                        <th>KAWASAN</th>
                                        
                                        <th>WITEL</th>
                                       
                                        <th>NDEM PS</th>
                                        <th>NDEM CABUT</th>
                                        <th>ND INET</th>
                                        <th>ADDON</th>
                                        
                                        <th>ITEM PS</th>
                                        <th>ITEM CABUT</th>
                                       
                                        <th>TANGGAL PS</th>
                                        <th>TANGGAL CABUT</th>
                                        <th>UMUR</th>
                                        <th>NO HP</th>
                                        <th>KCONTACT PS</th>
                                        <th>KCONTACT CABUT</th>
                                        
                                        <th>STATUS</th>
										<th>CHANNEL</th>
                                        <th>CHANNEL FAVORIT</th>
										<th>NAMA PELANGGAN</th>
										<th>RELASI</th>
										<th>CABUT ADD ON</th>
										<th>ALASAN CABUT</th>
										<th>DETAIL 1</th>
										<th>DETAIL 2</th>
										<th>KISARAN HARGA DIINGINKAN PELANGGAN</th>
										<th>KUALITAS PRODUK</th>
										<th>PENYAMPAIAN AGENT</th>
										<th>ALASAN AWAL BERLANGGANAN</th>
										<th>SARAN UNTUK TELKOM</th>
										<th>PROSES CABUT SULIT</th>
										<th>KETERANGAN</th>
										<th>STATUS CALL</th>
										
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $login = $_SESSION['username'];
                                    $tanggal_awal = date("Y-m",strtotime('-1 months'))."-01 00:00:00";
                                    $tanggal_akhir = date("Y-m")."-31 23:59:59";
                                    $sql = "SELECT id, kawasan, c_witel, ndem_ps, ndem_cabut, nd_speedy, addon, item_ps, item_cabut,  
                                    tgl_ps, tgl_cabut, umur, no_hp, kcontact_ps, kcontact_cabut, status, login, lup, channel, channel_favorit, nama_pelanggan, 
									relasi, cabut_addon, alasan_cabut, detail1, detail2, kisaran_harga, kualitas_produk, penyampaian, mengerti_produk, saran, proses_cabut, proses_cabut2, status_call
									FROM hasil_survey WHERE input='1' AND status='Cabut' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY lup DESC";
                                    $sql_hasil = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($sql_hasil);
                                    if ($total > 0)
                                        while ($row = mysqli_fetch_array($sql_hasil)) {
                                            $link_tapping = $row['status'] == 'Cabut' ? 'tapping_cabut.php' : 'tapping_ps.php';
                                            $tanggal_cabut = date("Y-m-d",strtotime($row['tgl_cabut'])) == '1970-01-01' ? '' : date("l, d F Y",strtotime($row['tgl_ps'])); 
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['login'] ?></td>
                                            <td><?= date("d/m/Y H:i:s", strtotime($row['lup'])) ?></td>
                                            <td><?= $row['kawasan'] ?></td>
                                            <td><?= $row['c_witel'] ?></td>
                                            <td><?= $row['ndem_ps'] ?></td>
                                            <td><?= $row['ndem_cabut'] ?></td>
                                            <td><?= $row['nd_speedy'] ?></td>
                                            <td><?= $row['addon'] ?></td>
                                           
                                            <td><?= $row['item_ps'] ?></td>
                                            <td><?= $row['item_cabut'] ?></td>
                                            
                                            <td><?= date("d/m/Y",strtotime($row['tgl_ps'])) ?></td>
											<td><?= date("d/m/Y",strtotime($row['tgl_cabut'])) ?></td>
                                            
                                            <td><?= $row['umur'] ?></td>
                                            <td><?= $row['no_hp'] ?></td>
                                            <td><?= $row['kcontact_ps'] ?></td>
                                            <td><?= $row['kcontact_cabut'] ?></td>
                                            
                                            <td><?= $row['status'] ?></td>
											<td><?= $row['channel'] ?></td>
                                            <td><?= $row['channel_favorit'] ?></td>
											<td><?= $row['nama_pelanggan'] ?></td>
											<td><?= $row['relasi'] ?></td>
											<td><?= $row['cabut_addon'] ?></td>
											<td><?= $row['alasan_cabut'] ?></td>
											<td><?= $row['detail1'] ?></td>
											<td><?= $row['detail2'] ?></td>
											<td><?= $row['kisaran_harga'] ?></td>
											<td><?= $row['kualitas_produk'] ?></td>
											<td><?= $row['penyampaian'] ?></td>
											<td><?= $row['mengerti_produk'] ?></td>
											<td><?= $row['saran'] ?></td>
											<td><?= $row['proses_cabut'] ?></td>
											<td><?= $row['proses_cabut2'] ?></td>
											<td><?= $row['status_call'] ?></td>
											
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
    ?>