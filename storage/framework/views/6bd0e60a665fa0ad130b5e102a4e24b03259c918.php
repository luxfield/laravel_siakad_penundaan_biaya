<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <?php echo $__env->yieldContent('notifikasi'); ?>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> <?php echo e($judul); ?></h3>
                            <div class="card-tools">

                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0 ">
                            <table class="table table-head-fixed text-nowrap" id="table_id" data-toggle="table"
                                data-sort-name="date" data-sort-order="desc">
                                <?php if(Session::get('user') == 'TU'): ?>
                                    <?php echo $__env->make('component.tu.thead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                                <?php if(Session::get('user') == 'Warek'): ?>
                                    <?php echo $__env->make('component.warek.thead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                                <?php if(Session::get('user') == 'HMJ'): ?>
                                    <?php echo $__env->make('component.hmj.thead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                                <?php if(Session::get('user') == 'KAPRODI'): ?>
                                    <?php echo $__env->make('component.kaprodi.thead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                                <tbody>
                                    
                                    <?php if(Session::get('user') == 'Wadek'): ?>
                                        <?php echo $__env->yieldContent('wadek index laporan'); ?>
                                    <?php endif; ?>
                                    <?php if(Session::get('user') == 'TU'): ?>
                                        <?php echo $__env->make('component.tu.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                    <?php if(Session::get('user') == 'Warek'): ?>
                                        <?php echo $__env->make('component.warek.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                    <?php if(Session::get('user') == 'HMJ'): ?>
                                        <?php echo $__env->make('component.hmj.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                    <?php if(Session::get('user') == 'KAPRODI'): ?>
                                        <?php echo $__env->make('component.kaprodi.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
</div>
<?php /**PATH D:\latihan_laravel\laravel-maulana\resources\views/component/content.blade.php ENDPATH**/ ?>