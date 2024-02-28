<?php
require_once("../deft_nav.php");
include("../assets/conn.php"); 
if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
$login = $_SESSION['username'];
$nama = $_SESSION['name'];
$jb = $_SESSION["jb"];
$tgl = date("Y-m-d H:i:s");

if($login<>""){ $whr= "AND login='$login'";}
?>

<!doctype html>
<html lang="en">
	<title>REFERENSI</title>
<div class="content">
			<div class="container-fluid">
				<div class="row">
			<div class="col-md-12">
				<div class="card card-plain">
					
			
					<form id='input' name="demoform" action='list_recall.php' method='post' accept-charset='UTF-8'>
						<div>
						
						<div class="row">
						<div class="col-md-12">
						  <div class="card ">
							  <div class="header">
								  <h4 align="center" class="title"><a href="ref_2p3p.php">Script Anti Decline</a> | <a href="script_2p-3p.php">Script Penawaran</a><strong> | </strong><a href="desc_stbtambahan.php">Deskripsi Produk</a> | <a href="fup.php">Fair Usage Policy (FUP)</a> <a href="desc_tdkditawarkan.php">| Tidak Bisa dilakukan Penawaran</a></h4>
						    </div>
						    <div style="overflow-x:auto;">
						      <p>Script Penawaran : <a href="script_smooa.php">SMOOA</a><a href="script_2p-3p.php"></a></p>
						      <p><a href="script_minipack.php">Minipack</a> | <a href="script_stbtambahan.php">STB Tambahan</a> | <a href="script_upgrade.php">Upgrade</a> | <a href="script_homewifi.php">Homewifi</a> | <a href="script_indibox.php">Indibox</a> | <a href="script_tambahan.php">Script Tambahan</a> | <a href="script_2p-3p.php">2P - 3P</a></p>
						      <p>&nbsp;</p>
						      <table border="2" cellpadding="0" cellspacing="0">
                                <col width="290">
                                <col width="991">
                                <tr height="21">
                                  <td height="21" width="290"><div align="center"><strong>FLOW</strong></div></td>
                                  <td width="991"><div align="center"><strong>SMOOA</strong></div></td>
                                </tr>
                                <tr height="42">
                                  <td height="42" width="290">GREETING</td>
                                  <td width="991">Selamat    Pagi/Siang/Sore.<br>
                                    Perkenalkan dengan saya (nama agent) dari Indihome</td>
                                </tr>
                                <tr height="21">
                                  <td height="21" width="290">KONFIRMASI NO FASTEL DAN PJ</td>
                                  <td width="991">Benar    saya berbicara dengan bapak/ ibu (nama pelanggan)? Selaku pemilik dari no    telepon xxx xxxxx</td>
                                </tr>
                                <tr height="63">
                                  <td height="63" width="290">APRESIASI</td>
                                  <td width="991">Terima    kasih pak/ ibu (nama pelanggan) sudah menjadi menjadi pelanggan setia telkom    selama (sebutkan lama berlangganan) tahun<br>
                                      <br>
                                    Semoga bapak/ibu dan keluarga dalam keadaan sehat dan tetap bisa    menjalankan aktivitas seperti biasa.</td>
                                </tr>
                                <tr height="42">
                                  <td height="42" width="290">EXPERIENCE PELANGGAN &amp; IDENTIFIKASI KEBUTUHAN PELANGGAN</td>
                                  <td width="991">Dengan    kondisi saat ini, apakah ada anggota keluarga bapak/ ibu yang bekerja atau    belajar dari rumah pak/ bu (nama pelanggan)?</td>
                                </tr>
                                <tr height="315">
                                  <td rowspan="4" height="756" width="290">PENAWARAN<br>
                                      <br>
                                    Point penting,<br>
                                    - Kata penawaran<br>
                                    - Nama program<br>
                                    - Kegunaan program<br>
                                    - Tarif</td>
                                  <td width="991">Saat    ini Telkom memiliki program yang sangat menarik untuk bapak/ ibu dan    keluarga, boleh minta waktunya sebentar?<br>
                                    Telkom memiliki SMOOA, yaitu Paket Kuota Keluarga untuk pelanggan    telkomsel, merupakan paket data dengan kuota lebih besar yang bisa dibagi    dengan anggota keluarga atau teman<br>
                                    Paket data ini berlaku secara nasional untuk semua jaringan (2G, 3G, dan    4G) dan dapat digunakan secara bersama-sama oleh&nbsp; semua anggota yang terdaftar.<br>
                                    <br>
                                    Yang paling menarik adalah harga penawaran yang kami tawarkan sangat    ekonomis, untuk 4 pilihan paket yatu,<br>
                                    <br>
                                    Untuk paket silver 75 ribu plus PPN 10%, bapak/ ibu akan mendapatkan kuota    internet 10 GB. <br>
                                    Benefit menarik lainnya jika&nbsp; bapak/    ibu pelanggan prabayar, bisa telepon dan SMS ke sesama anggota tanpa batas.    Sedangkan untuk keluar anggota, bapak/ ibu mendapatkan 30 menit telepon dan    30 sms.<br>
                                    Jika bapak/ ibu pengguna kartu halo, mendapatkan 500 menit telepon dan 500    sms untuk ke sesama anggota. Sedangkan untuk keluar anggota, berlaku tarif    normal.<br>
                                    Paket ini berlaku selama 30 hari dan akan diperpanjang secara    otomatis.<br>
                                    Untuk jumlah anggota minimal 3 orang, maksimal 6 orang termasuk nomor utama</td>
                                </tr>
                                <tr height="147">
                                  <td height="147" width="991">Untuk paket gold 155 ribu plus PPN 10%, bapak/    ibu akan mendapatkan kuota internet 20 GB.<br>
                                    Benefit menarik lainnya jika&nbsp; bapak/    ibu pelanggan prabayar, bisa telepon dan SMS ke sesama anggota tanpa batas.    Sedangkan untuk keluar anggota, bapak/ ibu mendapatkan 50 menit telepon dan    50 sms.<br>
                                    Jika bapak/ ibu pengguna kartu halo, mendapatkan 500 menit telepon dan 500    sms untuk ke sesama anggota. Sedangkan untuk keluar anggota, berlaku tarif    normal.<br>
                                    Paket ini berlaku selama 30 hari dan akan diperpanjang secara    otomatis.<br>
                                    Untuk jumlah anggota minimal 3 orang, maksimal 6 orang termasuk nomor    utama.</td>
                                </tr>
                                <tr height="147">
                                  <td height="147" width="991">Untuk paket platinum 280 ribu plus PPN 10%,    bapak/ ibu akan mendapatkan kuota internet 40 GB. <br>
                                    Benefit menarik lainnya jika&nbsp; bapak/    ibu pelanggan prabayar, bisa telepon dan SMS ke sesama anggota tanpa batas. Sedangkan    untuk keluar anggota, bapak/ ibu mendapatkan 100 menit telepon dan 100    sms.<br>
                                    Jika bapak/ ibu pengguna kartu halo, mendapatkan 500 menit telepon dan 500    sms untuk ke sesama anggota. Sedangkan untuk keluar anggota, berlaku tarif    normal.<br>
                                    Paket ini berlaku selama 30 hari dan akan diperpanjang secara    otomatis.<br>
                                    Untuk jumlah anggota minimal 3 orang, maksimal 6 orang termasuk nomor    utama.</td>
                                </tr>
                                <tr height="147">
                                  <td height="147" width="991">Untuk paket diamond 625 ribu plus PPN 10%,    bapak/ ibu akan mendapatkan kuota internet 100 GB.<br>
                                    Benefit menarik lainnya jika&nbsp; bapak/    ibu pelanggan prabayar, bisa telepon dan SMS ke sesama anggota tanpa batas.    Sedangkan untuk keluar anggota, bapak/ ibu mendapatkan 200 menit telepon dan    200 sms.<br>
                                    Jika bapak/ ibu pengguna kartu halo, mendapatkan 500 menit telepon dan 500    sms untuk ke sesama anggota. Sedangkan untuk keluar anggota, berlaku tarif    normal.<br>
                                    Paket ini berlaku selama 30 hari dan akan diperpanjang secara    otomatis.<br>
                                    Untuk jumlah anggota minimal 3 orang, maksimal 6 orang termasuk nomor    utama.</td>
                                </tr>
                                <tr height="42">
                                  <td height="42" width="290">BERIKAN KESEMPATAN PELANGGAN MERESPON</td>
                                  <td width="991">Untuk    (sebutkan nama program) yang saya tawarkan, silahkan jika ada yang ingin    ditanyakan pak/ bu (nama pelanggan)?</td>
                                </tr>
                                <tr height="260">
                                  <td height="260" width="290">KESEDIAAN PELANGGAN<br>
                                      <br>
                                    point penting:<br>
                                    - Pertanyaan kesediaan wajib menggunakan 5W 1H<br>
                                    - kata bersedia berlangganan<br>
                                    - nama program</td>
                                  <td width="991">Bagaimana    pak/ bu (nama pelanggan), apakah bapak/ibu bersedia untuk berlangganan    Program (nama program) yang kami tawarkan?<br>
                                      <br>
                                    Untuk proses berlangganan, bisa diinformasikan nomor nomor prabayar (boleh    simpati atau as) yang kita daftarkan sebagai nomor utama pak/ bu (nama    pelanggan)?<br>
                                    Saya informasikan untuk persyaratan nomor yang akan menjadi member pak/ bu    (nama pelanggan), <br>
                                    1. Minimal 3 nomor telkomsel (1 nomor utama dan 2 member anggota) <br>
                                    2. Nomor utama prabayar aktif, member anggota bisa prabayar dan kartu    halo<br>
                                    3. Selama berlangganan pastikan nomor aktiv dan tidak isolir<br>
                                    <br>
                                    Untuk nomor tambahannya Bapak/Ibu bisa melakukan update dengan download    aplikasi MOODAH pada Play Store, diaplikasi MOODAH Bapak/Ibu bisa melakukan    update nomor, share kuota dan melihat kuota yang masih ada</td>
                                </tr>
                                <tr height="198">
                                  <td height="198" width="290">KONTRAK<br>
                                      <br>
                                    Jelas<br>
                                    Tidak terputus</td>
                                  <td width="991">Baik    Bapak/ ibu, sebagai bukti legalitas&nbsp;    percakapan ini direkam oleh Telkom , kami konfirmasi ulang:<br>
                                    Pada hari ini (sebutkan nama harinya) (tanggal) (bulan) (tahun), <br>
                                    Bapak/ ibu (nama pelanggan)&nbsp; selaku    penanggung jawab nomor telepon (sebutkan nomor telepon pelanggan lengkap    dengan kode area)<br>
                                    Telah setuju untuk berlangganan (sesuai penawaran) dengan penambahan biaya    berlangganan per bulan sebesar (tarif saat penawaran) rupiah. Dari total    pembayaran indihome bapak/ ibu akan ditambah ppn 10%<br>
                                    <br>
                                    Program ini tidak untuk diperjualbelikan ya pak/ bu (nama pelanggan)</td>
                                </tr>
                                <tr height="169">
                                  <td height="169" width="290">CLOSING<br>
                                    - memastikan kembali pelanggan sudah jelas atau memberikan jeda sebelum    menutup telepon<br>
                                    - Menyampaikan salam buddies (contoh: selamat beraktivitas, selamat    beristirahat, semoga hari bapak/ ibu menyenangkan, sukses selalu)</td>
                                  <td width="991">Jika    nanti ada data yang belum lengkap, saya boleh menghubungi bapak/ ibu (nama    pelanggan) kembali ya?<br>
                                      <br>
                                    Sebelum saya tutup, ada lagi yang ingin ditanyakan pak/ bu (nama    pelanggan)<br>
                                    <br>
                                    Terimakasih Pak/Bu (nama pelanggan) telah bersedia berlanggan (sebutkan    nama program), semoga programnya bermanfaat.<br>
                                    <br>
                                    Selalu jaga kesehatan dan ikuti himbauan pemerintah    untuk social distancing pak/ bu, semoga kita terhindar dari segala penyakit,    , selamat pagi/siang/malam pak/ bu (nama pelanggan).</td>
                                </tr>
                              </table>
						      <p>&nbsp;</p>
						      <p>&nbsp;</p>
						      <p>&nbsp;</p>
						    </div>
						  </div>
						</div>

                    
                </div>
						
						</div>
					</form>	
				</div>
			</div>
			</div>
		</div>
</html>
<?php	require_once("../deft_foo.php"); ?>