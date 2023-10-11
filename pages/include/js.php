   <!-- jQuery -->
   <script src="assets/dist/plugins/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="assets/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- DataTables  & Plugins -->
   <script src="assets/dist/plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="assets/dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="assets/dist/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
   <script src="assets/dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="assets/dist/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
   <script src="assets/dist/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script src="assets/dist/plugins/jszip/jszip.min.js"></script>
   <script src="assets/dist/plugins/pdfmake/pdfmake.min.js"></script>
   <script src="assets/dist/plugins/pdfmake/vfs_fonts.js"></script>
   <script src="assets/dist/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
   <script src="assets/dist/plugins/datatables-buttons/js/buttons.print.min.js"></script>
   <script src="assets/dist/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
   <!-- AdminLTE App -->
   <script src="assets/dist/js/adminlte.min.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="assets/dist/js/demo.js"></script>
   <script src="assets/dist/js/swal.js"></script>
   <script src="assets/dist/plugins/toastr/toastr.min.js"></script>
   <!-- Page specific script -->

   <!-- Dropify -->




   <script>
       $(function () {
           $("#example1").DataTable({
               "responsive": true,
               "lengthChange": false,
               "autoWidth": false,
                  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
           });

       });
   </script>
   

   <div id="txt"></div>

<script>
startTime();

function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
<script>
  readBalance();
  function readBalance(){
    $.get("pages/include/balance.php", {}, function (data, status) {
      $("#balance").html(data);
    });
    $.get("pages/include/wallet.php", {}, function (data, status) {
      $("#wallet").html(data);
    });
  }
</script>