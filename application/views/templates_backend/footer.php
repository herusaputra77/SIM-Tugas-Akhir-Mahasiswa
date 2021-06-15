 <footer class="main-footer">
      <center>
      <strong style="font-family: times new roman;">Copyright &copy; <?php echo date('Y');?>
        
      </center>
        <!-- <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.1.0-pre
        </div> -->

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url()?>assets/admin_lte/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url()?>assets/admin_lte/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url()?>assets/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url()?>assets/admin_lte/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url()?>assets/admin_lte/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url()?>assets/admin_lte/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url()?>assets/admin_lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url()?>assets/admin_lte/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url()?>assets/admin_lte/plugins/moment/moment.min.js"></script>
  <script src="<?= base_url()?>assets/admin_lte/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url()?>assets/admin_lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url()?>assets/admin_lte/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url()?>assets/admin_lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url()?>assets/admin_lte/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url()?>assets/admin_lte/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= base_url()?>assets/admin_lte/dist/js/pages/dashboard.js"></script>
  <!-- data tabel -->
  <script src="<?= base_url()?>assets/admin_lte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url()?>assets/admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url()?>assets/admin_lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url()?>assets/admin_lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
       <script>
        $(document).ready(function() {
          $('#mytabel').DataTable();
        });
         $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });
      </script>
      <script>
      $(function () {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
          mode: "htmlmixed",
          theme: "monokai"
        });
      })
</script>
  </html>
