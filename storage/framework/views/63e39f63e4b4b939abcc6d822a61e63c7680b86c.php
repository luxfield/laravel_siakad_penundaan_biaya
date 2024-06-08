<!-- jQuery -->
<script src="<?php echo e(asset('adminLTE/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('adminLTE/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo e(asset('adminLTE/plugins/chart.js/Chart.min.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset('adminLTE/plugins/sparklines/sparkline.js')); ?>"></script>
<!-- JQVMap -->
<script src="<?php echo e(asset('adminLTE/plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset('plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo e(asset('adminLTE/plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminLTE/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(asset('adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<!-- Summernote -->
<script src="<?php echo e(asset('adminLTE/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(asset('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('adminLTE/dist/js/adminlte.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('adminLTE/dist/js/pages/dashboard.js')); ?>"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            "order": [
                [2, "desc"]
            ],
        });
        $('.dataTables_length').addClass('mt-3 ml-3');
        $('.dataTables_filter').addClass('mt-3 mr-3');
        $('select[name="table_id_length"]').removeClass('custom-select custom-select-sm');
        $('.dataTables_info').addClass('ml-3');

        $("#exampleInputFile").change(function() {
            filename = this.files[0].name;
            console.log(filename);
            $('label[class="custom-file-label"]').text(filename)
        });
    });
    $('#table_inbox').DataTable({
        "order": [
            [2, "desc"]
        ],
    });
    $('#table_pending').DataTable({
        "order": [
            [2, "desc"]
        ],
    });
    $('#table_reject').DataTable({
        "order": [
            [2, "desc"]
        ],
    });
    $('#table_all_wadek').DataTable({
        "order": [
            [2, "desc"]
        ],
    });
    $('#table_all_biro').DataTable({
        "order": [
            [2, "desc"]
        ],
    });

    $('#submit_user').on('click', function() {

        var startDate = new Date($('#tanggal').val());
        var endDate = new Date($('#tanggal_penyelenggara').val());

        // hitung selisih dalam milisecond
        var selisih = endDate.getTime() - startDate.getTime();

        // konversi selisih menjadi hari, jam, menit, detik
        var detik = selisih / 1000;
        var menit = detik / 60;
        var jam = menit / 60;
        var hari = jam / 24;
        if (hari < 14) {
            alert('pengajuan dana tidak bisa dilakukan dalam kurang 2 minggu')
            $(this).submit(function(event) {
                event.preventDefault();
            });
        } else {
            $(this).unbind('submit');
        }


    })
</script>
<?php echo $__env->yieldContent('embed'); ?>
<?php /**PATH D:\latihan_laravel\laravel-maulana\resources\views/component/script.blade.php ENDPATH**/ ?>