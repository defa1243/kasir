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
   <!-- Page specific script -->
   <script>
       $(function () {
           $("#example1").DataTable({
               "responsive": true,
               "lengthChange": false,
               "autoWidth": false,
            //    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
           });
       });

   </script>
