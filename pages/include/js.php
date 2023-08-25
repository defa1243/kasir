<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="http://localhost/kasir/assets/template/adminlte-v3/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://localhost/kasir/assets/template/adminlte-v3/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="http://localhost/kasir/assets/template/adminlte-v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="http://localhost/kasir/assets/template/adminlte-v3/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="http://localhost/kasir/assets/template/adminlte-v3/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="http://localhost/kasir/assets/template/adminlte-v3/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="http://localhost/kasir/assets/template/adminlte-v3/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="http://localhost/kasir/assets/template/adminlte-v3/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="http://localhost/kasir/assets/template/adminlte-v3/plugins/moment/moment.min.js"></script>
<script src="http://localhost/kasir/assets/template/adminlte-v3/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script
    src="http://localhost/kasir/assets/template/adminlte-v3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="http://localhost/kasir/assets/template/adminlte-v3/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script
    src="http://localhost/kasir/assets/template/adminlte-v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
</script>
<!-- AdminLTE App -->
<script src="http://localhost/kasir/assets/template/adminlte-v3/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="http://localhost/kasir/assets/template/adminlte-v3/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/kasir/assets/template/adminlte-v3/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="http://localhost/kasir/assets/template/adminlte-v3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="http://localhost/kasir/assets/template/adminlte-v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js">
</script>
<script
    src="http://localhost/kasir/assets/template/adminlte-v3/plugins/datatables-responsive/js/dataTables.responsive.min.js">
</script>
<script
    src="http://localhost/kasir/assets/template/adminlte-v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
</script>
<!-- wysiwyg -->
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.dropify').dropify();
    });
</script>




<?php  if(isset($_GET['edit'])){  ?>
<script>
    Swal.fire({
        position: 'Center',
        icon: 'success',
        title: 'Data Berhasil Di Edit',
        showConfirmButton: false,
        timer: 1500
    })
</script>
<?php }?>
<?php  if(isset($_GET['create'])){  ?>
<script>
    Swal.fire({
        position: 'Center',
        icon: 'success',
        title: 'Data Berhasil Di Tambah',
        showConfirmButton: false,
        timer: 1500
    })
</script>
<?php }?>
<?php  if(isset($_GET['delete'])){  ?>
<script>
    Swal.fire({
        position: 'Center',
        icon: 'success',
        title: 'Data Berhasil Di Hapus',
        showConfirmButton: false,
        timer: 1500
    })
</script>
<?php }?>

<script>
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var link = $(this).attr('href');

        Swal.fire({
            title: 'Yakin Mau Dihapus',
            text: "Data Tidak Akan Bisa Kembali",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = link;
            }
        })
    })
</script>
<script>
    $(document).on('click', '.logout', function (e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Yakin Mau Logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = link;
            }
        })
    })
</script>
<script>
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function (e) {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });


    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    /* Fungsi */
</script>

</body>

</html>