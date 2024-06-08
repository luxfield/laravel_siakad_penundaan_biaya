<div class="container-fluid">
        <div class="row mt-2">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo e($total['semua']); ?></h3>

                        <p>Surat Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-email-unread"></i>
                    </div>
                    <a href="<?php echo e($inbox); ?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo e($total['setuju']); ?></sup></h3>

                        <p>Surat disetujui</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-checkmark-round"></i>
                    </div>
                    <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo e($total['pending']); ?></h3>

                        <p>Surat pending</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-help"></i>
                    </div>
                    <a href="<?php echo e($pending); ?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo e($total['tolak']); ?></h3>

                        <p>Surat ditolak</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-close-round"></i>
                    </div>
                    <a href="<?php echo e(route('staff reject')); ?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>

<?php /**PATH D:\latihan_laravel\laravel-maulana\resources\views/component/notifikasi.blade.php ENDPATH**/ ?>