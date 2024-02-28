 <!-- footer -->
 <!-- ============================================================== -->
 <footer class="footer text-center text-muted">
   All Rights Reserved by TIER 2 CRL. Designed and Developed by <strong>IT INFRATEL MALANG</strong>.
 </footer>

 <!-- ============================================================== -->
 <!-- End footer -->
 <!-- ============================================================== -->
 </div>
 <!-- ============================================================== -->
 <!-- End Page wrapper  -->
 <!-- ============================================================== -->
 </div>
 <!-- ============================================================== -->
 <!-- End Wrapper -->
 <!-- ============================================================== -->
 <!-- End Wrapper -->
 <!-- ============================================================== -->
 <!-- All Jquery -->
 <!-- ============================================================== -->

 <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
 <script src="../assets/DataTables/DataTables/js/jquery.dataTables.min.js"></script>
 <script src="../assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

 <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
 <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- apps -->
 <!-- apps -->
 <script src="../dist/js/app-style-switcher.js"></script>
 <script src="../dist/js/feather.min.js"></script>
 <!-- slimscrollbar scrollbar JavaScript -->
 <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
 <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
 <!--Wave Effects -->
 <!-- themejs -->
 <!--Menu sidebar -->
 <script src="../dist/js/sidebarmenu.js"></script>
 <!--Custom JavaScript -->
 <script src="../dist/js/custom.min.js"></script>


 <!--Morris JavaScript -->
 <script src="../assets/libs/raphael/raphael.min.js"></script>
 <script src="../assets/libs/morris.js/morris.min.js"></script>

 <!-- <script src="../dist/js/pages/morris/morris-data.js"></script> -->
 <!--This page JavaScript -->
 <script src="../assets/extra-libs/c3/d3.min.js"></script>
 <script src="../assets/extra-libs/c3/c3.min.js"></script>
 <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
 <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
 <script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
 <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
 <!-- <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script> -->

 <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
 <script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

 <script type="text/javascript">
   // $('.tampilDetail').hide();
   // $(".Cari").on("click", function() {
   //     $(this).closest(".tampilDetail").children(".tampilDetail").show();
   //   });

   
        

   $(function() {
     $('input[type="radio"]').click(function() {
       if ($(this).is(':checked') && ($(this).val() == 'Tanggal atau Hari')) {
         $("#bulan_tahun").attr("disabled", true);
         $("#bulan_tahun").val("");
         $("#tanggal").removeAttr("disabled");
       } else if ($(this).is(':checked') && ($(this).val() == 'Bulan')) {
         $("#tanggal").attr("disabled", true);
         $("#tanggal").val("");
         $("#bulan_tahun").removeAttr("disabled");
       }
     });
   });
   // alert(document.URL);
   //fungsi untuk filtering data berdasarkan tanggal 
   var start_date;
   var end_date;
   var month_date;
   var date_awal;
   var date_akhir;

   var DateFilterFunctionShow = (function(oSettings, aData, iDataIndex) {
     var date_awal = parseDateValue("01/01/2020");
     var date_akhir = parseDateValue(moment().format('DD/MM/YYYY'));

     //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
     //nama depan = 0
     //nama belakang = 1
     //tanggal terdaftar =2
     var data_kolom = '';
     var stringDataKolom = '';
     var dateArraySpasi = '';

     if (document.URL == "http://10.194.176.158/tier2/admin/html/form_wo.php") {
       data_kolom = aData[13];
     } else if (document.URL == "http://10.194.176.158/tier2/admin/html/form_wo_tappingtam_agree.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/form_wo_tappingtam_decline.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/form_wo_tappingsurvey.php") {
       data_kolom = aData[1];
     } else if (document.URL == "http://10.194.176.158/tier2/admin/html/report_agree.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_decline.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_tappingsurvey.php") {
       data_kolom = aData[1];
       stringDataKolom = data_kolom.toString();
       dateArraySpasi = stringDataKolom.substr(0, 10);
     } else if (document.URL == "http://10.194.176.158/tier2/admin/html/report_survey_cabut.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_survey_ps.php") {
       data_kolom = aData[2];
       stringDataKolom = data_kolom.toString();
       dateArraySpasi = stringDataKolom.substr(0, 10);
     } else if (document.URL == "http://10.194.176.158/tier2/admin/html/report_caring_smooa.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_caringcancel.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_caring_paperless.php") {
       data_kolom = aData[1];
       stringDataKolom = data_kolom.toString();
       dateArraySpasi = stringDataKolom.substr(0, 10);
     }

     if (dateArraySpasi == '') {
       var evalDate = parseDateValue(data_kolom);
       if ((isNaN(dateStart) && isNaN(dateEnd)) ||
         (isNaN(dateStart) && evalDate <= dateEnd) ||
         (dateStart <= evalDate && isNaN(dateEnd)) ||
         (dateStart <= evalDate && evalDate <= dateEnd)) {
         return true;
       }
       return false;
     } else {
       var evalDate = parseDateValue(dateArraySpasi);
       //  alert(evalDate);
       if ((isNaN(dateStart) && isNaN(dateEnd)) ||
         (isNaN(dateStart) && evalDate <= dateEnd) ||
         (dateStart <= evalDate && isNaN(dateEnd)) ||
         (dateStart <= evalDate && evalDate <= dateEnd)) {
         return true;
       }
       return false;
     }
   });

   var DateFilterFunction = (function(oSettings, aData, iDataIndex) {
     var dateStart = parseDateValue(start_date);
     var dateEnd = parseDateValue(end_date);
     //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
     //nama depan = 0
     //nama belakang = 1
     //tanggal terdaftar =2
     var data_kolom = '';
     var stringDataKolom = '';
     var dateArraySpasi = '';

     if (document.URL == "http://10.194.176.158/tier2/admin/html/form_wo.php") {
       data_kolom = aData[13];
     } else if (document.URL == "http://10.194.176.158/tier2/admin/html/form_wo_tappingtam_agree.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/form_wo_tappingtam_decline.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/form_wo_tam.php") {
       data_kolom = aData[1];
     } else if (document.URL == "http://10.194.176.158/tier2/admin/html/report_agree.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_decline.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_tappingsurvey.php") {
       data_kolom = aData[1];
       stringDataKolom = data_kolom.toString();
       dateArraySpasi = stringDataKolom.substr(0, 10);
     } else if (document.URL == "http://10.194.176.158/tier2/admin/html/report_survey_cabut.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_survey_ps.php") {
       data_kolom = aData[2];
       stringDataKolom = data_kolom.toString();
       dateArraySpasi = stringDataKolom.substr(0, 10);
     }
     else if (document.URL == "http://10.194.176.158/tier2/admin/html/report_caring_smooa.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_caringcancel.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_caring_paperless.php") {
       data_kolom = aData[1];
       stringDataKolom = data_kolom.toString();
       dateArraySpasi = stringDataKolom.substr(0, 10);
     }

     if (dateArraySpasi == '') {
       var evalDate = parseDateValue(data_kolom);
       if ((isNaN(dateStart) && isNaN(dateEnd)) ||
         (isNaN(dateStart) && evalDate <= dateEnd) ||
         (dateStart <= evalDate && isNaN(dateEnd)) ||
         (dateStart <= evalDate && evalDate <= dateEnd)) {
         return true;
       }
       return false;
     } else {
       var evalDate = parseDateValue(dateArraySpasi);
       //  alert(evalDate);
       if ((isNaN(dateStart) && isNaN(dateEnd)) ||
         (isNaN(dateStart) && evalDate <= dateEnd) ||
         (dateStart <= evalDate && isNaN(dateEnd)) ||
         (dateStart <= evalDate && evalDate <= dateEnd)) {
         return true;
       }
       return false;
     }
   });

   var DateFilterFunctionMonth = (function(oSettings, aData, iDataIndex) {
     var monthDate = document.getElementById("monthsearch").value;
     //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
     //nama depan = 0
     //nama belakang = 1
     //tanggal terdaftar =2
     var data_kolom = '';
     var stringDataKolom = '';
     var dateArraySpasi = '';
     var date_report;

     if (document.URL == "http://10.194.176.158/tier2/admin/html/form_wo.php") {
       data_kolom = aData[13];
       stringDataKolom = data_kolom.split("/");
       dateArraySpasi = stringDataKolom[2] + "-" + stringDataKolom[1];
     } else if (document.URL == "http://10.194.176.158/tier2/admin/html/form_wo_tappingtam_agree.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/form_wo_tappingtam_decline.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/form_wo_tappingsurvey.php") {

       data_kolom = aData[1];
       stringDataKolom = data_kolom.split("/");
       dateArraySpasi = stringDataKolom[2] + "-" + stringDataKolom[1];
     } else if (document.URL == "http://10.194.176.158/tier2/admin/html/report_agree.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_decline.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_tappingsurvey.php") {
       data_kolom = aData[1];
       stringDataKolom = data_kolom.split(" ");
       date_report = stringDataKolom[0].split("/");
       dateArraySpasi = date_report[2] + "-" + date_report[1];
     } else if (document.URL == "http://10.194.176.158/tier2/admin/html/report_survey_cabut.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_survey_ps.php") {
       data_kolom = aData[2];
       stringDataKolom = data_kolom.split(" ");
       date_report = stringDataKolom[0].split("/");
       dateArraySpasi = date_report[2] + "-" + date_report[1];
     }
     else if (document.URL == "http://10.194.176.158/tier2/admin/html/report_caring_smooa.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_caringcancel.php" || 
       document.URL == "http://10.194.176.158/tier2/admin/html/report_caring_paperless.php") {
      //  data_kolom = aData[1];
      //  stringDataKolom = data_kolom.toString();
      //  dateArraySpasi = stringDataKolom.substr(0, 10);
       data_kolom = aData[1];
       stringDataKolom = data_kolom.split(" ");
       date_report = stringDataKolom[0].split("/");
       dateArraySpasi = date_report[2] + "-" + date_report[1];
     }

     if (dateArraySpasi === monthDate) {
       return true;
     } else {
       return false;
     }
   });


   // fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
   function parseDateValue(rawDate) {
     var dateArray = rawDate.split("/");
     var parsedDate = new Date(dateArray[2], parseInt(dateArray[1]) - 1, dateArray[0]); // -1 because months are from 0 to 11   
     return parsedDate;
   }

   // fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
   function parseMonthValue(rawDate) {
     var dateArray = rawDate.split("-");
     var parsedDate = new Date(dateArray[0], parseInt(dateArray[1]) - 1); // -1 because months are from 0 to 11   
     return parsedDate;
   }

   $(document).ready(function() {
    $("select[id='decline']").on('keyup change', function() {
       var decline = $(this).val();
       console.log(decline);
            if(decline == 'Price') {
                $("select[id='reason_decline']").html("<option value='' selected> -- Pilih Reason Decline -- </option><option value='Mahal'>Mahal</option><option value='Efisiensi'>Efisiensi</option>");
            }
            else if (decline == 'Product') {
                $("select[id='reason_decline']").html("<option value='' selected> -- Pilih Reason Decline -- </option><option value='alat tidak bisa di gunakan'>alat tidak bisa di gunakan</option><option value='benefit kurang menarik'>benefit kurang menarik</option><option value='cukup dengan Paket sebelumnya'>cukup dengan Paket sebelumnya</option><option value='jarang di gunakan'>jarang di gunakan</option><option value='sering gangguan'>sering gangguan</option><option value='user berkurang'>user berkurang</option><option value='Paket Sudah Tersedia'>Paket Sudah Tersedia</option>");
            }
            else if (decline == 'Process') {
                $("select[id='reason_decline']").html("<option value='' selected> -- Pilih Reason Decline -- </option><option value='cabut indihome'>cabut indihome</option><option value='ganti paket'>ganti paket</option><option value='kendala teknis'>kendala teknis</option><option value='Pindah Alamat'>Pindah Alamat</option><option value='salah pilih paket'>salah pilih paket</option><option value='tidak ada tv'>cukup dengan Paket sebelumnya</option><option value='tv rusak'>tv rusak</option><option value='Indikasi Cabut'>Indikasi Cabut</option>");
            }
            else if (decline == 'Physical') {
                $("select[id='reason_decline']").html("<option value='' selected> -- Pilih Reason Decline -- </option><option value='belum ada pemasangan'>belum ada pemasangan</option><option value='tidak merasa daftar'>tidak merasa daftar</option><option value='link terlalu lama diterima'>link terlalu lama diterima</option>");
            }
            else if (decline == 'People') {
                $("select[id='reason_decline']").html("<option value='' selected> -- Pilih Reason Decline -- </option><option value='informasi tidak sesuai'>informasi tidak sesuai</option><option value='tidak berkenan disurvey'>tidak berkenan disurvey</option><option value='ingin berlangganan add on lain'>ingin berlangganan add on lain</option><option value='tidak bersedia upload data diiri'>tidak bersedia upload data diiri</option><option value='pelanggan belum paham'>pelanggan belum paham</option><option value='keluarga tidak setuju'>keluarga tidak setuju</option>");
            }
        });
        
    $("select[id='alasan_cancel']").on('keyup change', function() {
       var alasan_cancel = $(this).val();
       console.log(alasan_cancel);
            if(alasan_cancel == 'Price') {
                $("select[id='detail']").html("<option value='' selected> -- Pilih Detail -- </option><option value='Mahal'>Mahal</option><option value='Efisiensi'>Efisiensi</option>");
            }
            else if (alasan_cancel == 'Product') {
                $("select[id='detail']").html("<option value='' selected> -- Pilih Detail -- </option><option value='Jarang Digunakan'>Jarang Digunakan</option><option value='Cukup dengan Paket Sebelumnya'>Cukup dengan Paket Sebelumnya</option><option value='User Berkurang'>User Berkurang</option><option value='Sering Gangguan'>Sering Gangguan</option><option value='Channel Tidak Menarik'>Channel Tidak Menarik</option><option value='Alat Tidak Bisa Digunakan'>Alat Tidak Bisa Digunakan</option>");
            }
            else if (alasan_cancel == 'Process') {
                $("select[id='detail']").html("<option value='' selected> -- Pilih Detail -- </option><option value='Cabut Indihome'>Cabut Indihome</option><option value='Kendala Teknis'>Kendala Teknis</option><option value='Pindah Alamat'>Pindah Alamat</option><option value='Tidak Ada TV'>Tidak Ada TV</option><option value='TV Rusak'>TV Rusak</option><option value='Ganti Paket'>Ganti Paket</option><option value='Salah Pilih Paket'>Salah Pilih Paket</option>");
            }
            else if (alasan_cancel == 'Physical_evident') {
                $("select[id='detail']").html("<option value='' selected> -- Pilih Detail -- </option><option value='Belum Ada Pemasangan'>Belum Ada Pemasangan</option><option value='Tidak Merasa Daftar'>Tidak Merasa Daftar</option>");
            }
            else if (alasan_cancel == 'People') {
                $("select[id='detail']").html("<option value='' selected> -- Pilih Detail -- </option><option value='Informasi Tidak Sesuai'>Informasi Tidak Sesuai</option>");
            }
        });

     $("select[id='kat_t2']").on('keyup change', function() {
       var nilai = $(this).val();
       console.log(nilai);
       if (nilai == "Penanggung Jawab") {
         $("select[id='alasan_agree']").html("<option value='Tidak memastikan PJ'>Tidak memastikan PJ</option><option value ='Tidak konfirmasi nomor HP Terhubung ke PSTN'>Tidak konfirmasi nomor HP Terhubung ke PSTN</option>");
       } else if (nilai == "Penawaran") {
         $("select[id='alasan_agree']").html("<option value='Agent tidak mendefinisikan produk yang ditawarkan oleh TELKOM'>Agent tidak mendefinisikan produk yang ditawarkan oleh TELKOM</option><option value = 'Benefit produk salah' > Benefit produk salah </option><option value = 'Tarif salah' > Tarif salah </option><option value = 'Ketentuan program salah' > Ketentuan program salah </option><option value = 'Komunikasi berjalan 1 arah' > Komunikasi berjalan 1 arah </option> <option value = 'Nada tidak stabil' > Nada tidak stabil </option> <option value = 'Buru- buru' > Buru- buru </option> <option value = 'Berbelit- belit' > Berbelit- belit </option> <option value = 'Kosa kata tidak jelas' > Kosa kata tidak jelas </option> <option value = 'Tidak empathy' > Tidak empathy </option> ");
       } else if (nilai == "Pernyataan Kesediaan") {
         $("select[id='alasan_agree']").html("<option value='Jawaban pelanggan untuk kesediaan bukan \"iya\"'>Jawaban pelanggan untuk kesediaan bukan \"iya\" </option>");
       } else if (nilai == "Kontrak") {
         $("select[id='alasan_agree']").html("<option value='Kontrak tidak benar'>Kontrak tidak benar</option><option value = 'Kontrak tidak jelas' > Kontrak tidak jelas </option> <option value = 'Kontrak buru- buru' > Kontrak buru- buru </option>");
       } else if (nilai == "Rekaman") {
         $("select[id='alasan_agree']").html("<option value='Tidak ada'>Tidak ada</option> <option value='Putus- putus'>Putus- putus</option>");
       } else if (nilai == "Lain-lain") {
         $("select[id='alasan_agree']").html("<option value='DBS'>DBS</option> <option value='Isolir'>Isolir</option> <option value='K-kontak salah'>K-kontak salah</option> <option value='Milik site lain'>Milik site lain</option> <option value='Sudah ada permintaan'>Sudah ada permintaan</option><option value='Tidak muncul tarif'>Tidak muncul tarif</option> ");
       }
     });


     $("select[id='alasan_cabut']").on('keyup change', function() {
       var nilai = $(this).val();
       if (nilai == "Efisiensi") {
         $("select[id='detail1']").html("<option value='Harga Mahal'>Harga Mahal</option><option value ='Tagihan Naik Terus'>Tagihan Naik Terus</option><option value = 'Jarang Digunakan' > Jarang Digunakan </option><option value ='Kendala Ekonomi'>Kendala Ekonomi</option><option value = 'User Berkurang' > User Berkurang </option><option value ='Cukup dengen Speed atau Paket Sebelumnya'>Cukup dengan Speed atau Paket Sebelumnya</option>");
       } else if (nilai == "Produk") {
         $("select[id='detail1']").html("<option value='Info Produk Tidak Sesuai'>Info Produk Tidak Sesuai</option><option value = 'Kendala Teknis' > Kendala Teknis </option><option value = 'Produk Tidak Menarik' > Produk Tidak Menarik </option><option value = 'Alat Tidak Bisa Digunakan' > Alat Tidak Bisa Digunakan </option><option value = 'Sering Gangguan' > Sering Gangguan </option><option value = 'Channel Tidak Menarik' > Channel Tidak Menarik </option><option value = 'Pindah Provider Lain' > Pindah Provider Lain </option><option value = 'Sudah Ada SmartTV' > Sudah Ada SmartTV </option>");
       } else if (nilai == "Proses") {
         $("select[id='detail1']").html("<option value='Salah Input Paket'>Salah Input Paket</option> <option value = 'Pindah Alamat' > Pindah Alamat </option> <option value = 'Belum Ada Pemasangan' > Belum Ada Pemasangan </option> <option value = 'Tidak Merasa Berlangganan' > Tidak Merasa Berlangganan </option> <option value = 'Cabut Indihome' > Cabut Indihome </option> <option value = 'Ganti Paket' > Ganti Paket </option> <option value = 'Tidak Ada TV' > Tidak Ada TV </option> <option value = 'TV Rusak' > TV Rusak </option>");
       }
     });

     var $dTable;
     //konfigurasi DataTable pada tabel dengan id example dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
     if (document.URL == "http://10.194.176.158/tier2/admin/html/report_survey_cabut.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_survey_ps.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_tappingsurvey.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_agree.php" ||
       document.URL == "http://10.194.176.158/tier2/admin/html/report_decline.php" || 
       document.URL == "http://10.194.176.158/tier2/admin/html/report_caring_smooa.php" || 
       document.URL == "http://10.194.176.158/tier2/admin/html/report_caringcancel.php" || 
       document.URL == "http://10.194.176.158/tier2/admin/html/report_caring_paperless.php") {
       $dTable = $('#table1').DataTable({
         "dom": "<'row'<'col-sm-5'B<'buttons-excel'>>" +
           "<'col-sm-7'>><'row'<'col-sm-2'l><'col-sm-2' <'tampil'>><'col-sm-3' <'monthsearchbox'>><'col-sm-3' <'datesearchbox'>><'col-sm-2'f>>" +
           "<'row'<'col-sm-12'tr>>" +
           "<'row'<'col-sm-5'i><'col-sm-7'p>>",
         "order": [
           [0, 'asc']
         ],
         buttons: [
           'csv', 'excel', 'pdf', 'print'
         ]

       });
     } else {
       $dTable = $('#table1').DataTable({
         "dom": "<'row'<'col-sm-2'l><'col-sm-2' <'tampil'>><'col-sm-3' <'monthsearchbox'>><'col-sm-3' <'datesearchbox'>><'col-sm-2'f>>" +
           "<'row'<'col-sm-12'tr>>" +
           "<'row'<'col-sm-5'i><'col-sm-7'p>>",
         "order": [
           [0, 'asc']
         ]

       });
     }

     $('#table1 tfoot th').each(function() {
       var title = $(this).text();
       $(this).html('<input type="text" placeholder="Search ' + title + '" />');
     });
     //menambahkan daterangepicker di dalam datatables
     $("div.datesearchbox").html('<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="text" class="form-control pull-right btn-primary" id="datesearch" placeholder="Search by date range.."> </div>');
     $("div.monthsearchbox").html('<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar white"></i> </div><input type="month" class="form-control pull-right btn-primary" id="monthsearch" placeholder="Search by month"> </div>');
     if (document.URL != "http://10.194.176.158/tier2/admin/html/report_total.php") {

       $("div.tampil").html('<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="submit" class="form-control pull-right btn btn-primary" id="tampilData" value="Show All Data" placeholder="Search by date range.."></div>');
     }
     document.getElementsByClassName("datesearchbox")[0].style.textAlign = "Right";
     //konfigurasi daterangepicker pada input dengan id datesearch
     $('#datesearch').daterangepicker({
       autoUpdateInput: false
     });

        //menangani proses saat apply date range
        $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
          start_date = picker.startDate.format('DD/MM/YYYY');
          end_date = picker.endDate.format('DD/MM/YYYY');
          $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
          $dTable.draw();
        });

     $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
       $(this).val('');
       start_date = '';
       end_date = '';
       $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
       $dTable.draw();
     });


     $("#tampilData").click(function() {
       window.open(document.URL, "_self");
     });

     $("input[id='monthsearch']").on('keyup change', function() {
       month_date = $(this).val();
       $.fn.dataTableExt.afnFiltering.push(DateFilterFunctionMonth);
       $dTable.draw();
     });


   });
 </script>
 </body>

 </html>