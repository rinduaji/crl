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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Survey PS Closed</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Report</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">PS Closed</li>
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
                                        <th>C_WITEL</th>
                                       
                                        <th>NDEM</th>
                                        <th>NDEM PS</th>
                                       
                                        <th>ND INET</th>
                                        <th>ADDON</th>
                                        <th>ITEM</th>
                                        <th>ITEM PS</th>
                                        
                                        <th>KCONTACT</th>
                                        <th>TANGGAL PS</th>

                                        <th>NO HP</th>
                                        <th>KCONTACT PS</th>
                                       
                                        <th>TIM SURVEY</th>
                                        <th>STATUS</th>
										<th>STATUS CALL</th>
										<th>NAMA PELANGGAN</th>
										<th>RELASI</th>
										<th>CHANNEL</th>
										<th>CHANNEL FAVORIT</th>
										<th>SUDAH AKTIF</th>
										<th>INFO AKTIF</th>
										<th>KUALITAS PRODUK</th>
										<th>PENYAMPAIAN AGENT</th>
										<th>MENGERTI PRODUK</th>
										<th>HARGA SESUAI</th>
										<th>ALASAN BERLANGGANAN</th>
										<th>KETEPATAN WAKTU TEKNISI</th>
										<th>KINERJA TEKNISI</th>
										<th>SARAN UNTUK TELKOM</th>
										<th>KET TAMBAHAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $login = $_SESSION['username'];
                                    $tanggal_awal = date("Y-m",strtotime('-1 months'))."-01 00:00:00";
                                    $tanggal_akhir = date("Y-m")."-31 23:59:59";
                                    $sql = "SELECT id, kawasan, c_witel, ndem, ndem_ps, nd_speedy, addon, item, item_ps, kcontact, 
                                    tgl_ps, no_hp, kcontact_ps, timsurvey, status, nama_pelanggan, relasi,login, lup, channel, aktif, info_aktif,  
									kualitas_produk, penyampaian, mengerti_produk, harga, alasan_ps, tepat_waktu, rapi, saran, status_call, channel_favorit, ket_tamb FROM 
                                    hasil_survey WHERE input='1' AND status='PS' AND lup BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY lup DESC";
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
                                            
                                            <td><?= $row['ndem'] ?></td>
                                            <td><?= $row['ndem_ps'] ?></td>
                                            
                                            <td><?= $row['nd_speedy'] ?></td>
                                            <td><?= $row['addon'] ?></td>
                                            <td><?= $row['item'] ?></td>
                                            <td><?= $row['item_ps'] ?></td>
                                            
                                            <td><?= $row['kcontact'] ?></td>
                                            <td><?= date("d/m/Y",strtotime($row['tgl_ps'])) ?></td>
                                           
                                            <td><?= $row['no_hp'] ?></td>
                                            <td><?= $row['kcontact_ps'] ?></td>
                                            
                                            <td><?= $row['timsurvey'] ?></td>
                                            <td><?= $row['status'] ?></td>
											<td><?= $row['status_call'] ?></td>
											<td><?= $row['nama_pelanggan'] ?></td>
											<td><?= $row['relasi'] ?></td>
											<td><?= $row['channel'] ?></td>
											<td><?= $row['channel_favorit'] ?></td>
											<td><?= $row['aktif'] ?></td>
											<td><?= $row['info_aktif'] ?></td>
											<td><?= $row['kualitas_produk'] ?></td>
											<td><?= $row['penyampaian'] ?></td>
											<td><?= $row['mengerti_produk'] ?></td>
											<td><?= $row['harga'] ?></td>
											<td><?= $row['alasan_ps'] ?></td>
											<td><?= $row['tepat_waktu'] ?></td>		
											<td><?= $row['rapi'] ?></td>
											<td><?= $row['saran'] ?></td>
											<td><?= $row['ket_tamb'] ?></td>
											
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