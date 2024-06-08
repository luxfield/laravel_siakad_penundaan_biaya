<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <?php echo $__env->yieldContent('notifikasi'); ?>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> <?php echo e($judul); ?></h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap" id="table_all_wadek">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <?php if(Session::get('user') != 'Biro' && Session::get('user') != 'Warek'): ?>
                                        <th>Status</th>
                                        <?php endif; ?>
                                        <?php if(Session::get('user') == 'TU'): ?>
                                        <th>Keterangan</th>
                                        <th>Disetujui</th>
                                        <th>Diteruskan</th>
                                        <?php endif; ?>
                                        <?php if(Session::get('user') == 'HMJ'): ?>
                                        <th>Disetujui</th>
                                        <?php endif; ?>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(Session::get('user') == 'HMJ'): ?>
                                    <?php $__currentLoopData = $data_pengajuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($data->id); ?>

                                        </td>
                                        <td>
                                            <?php echo e($data->name); ?>


                                        </td>
                                        <td>
                                            <?php echo e($data->tanggal); ?>


                                        </td>
                                        <td>
                                            <p h3>Pengajuan dana</p>
                                            (<?php echo e($data->status); ?>)
                                        </td>

                                        <td>
                                            <a href="<?php echo e(route('user review', ['id' => $data->id])); ?>" class="btn btn-primary">detail</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <?php $__currentLoopData = $data_pencairan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($data->id); ?>

                                        </td>
                                        <td>
                                            <?php echo e($data->name); ?>


                                        </td>
                                        <td>
                                            <?php echo e($data->tanggal); ?>


                                        </td>
                                        <td>
                                            <p>Pencairan dana</p>
                                            <?php if($data->disetujui == '-'): ?>
                                            <p>(pending)</p>
                                            <?php else: ?>
                                            <p>(disetujui)</p>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('user konfirmasi pencairan dana', ['id' => $data->id])); ?>" class="btn btn-primary">detail</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $data_pelaporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(DB::table('laporan_dana_proses')->where([['id', '=', $data->id], ['diteruskan', '=', 'TU']])->count() == 1): ?>
                                    <tr>
                                        <td>
                                            <?php echo e($data->id); ?>

                                        </td>
                                        <td>
                                            <?php echo e($data->name); ?>


                                        </td>
                                        <td>
                                            <?php echo e($data->tanggal); ?>


                                        </td>
                                        <td>
                                            <p> Pelaporan Dana </p>
                                            </p>(diteruskan oleh <?php echo e($data->diteruskan); ?>)<p>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('user review', ['id' => $data->id])); ?>" class="btn btn-primary">detail</a>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $data_pengajuan_dikonfirmasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($data->id); ?>

                                        </td>
                                        <td>
                                            <?php echo e($data->name); ?>


                                        </td>
                                        <td>
                                            <?php echo e($data->tanggal); ?>


                                        </td>
                                        <td>
                                            <p>Laporan penundaan biaya kuliah</p>
                                            <p> (dikonfirmasi oleh <?php echo e($data->dikonfirmasi); ?> )
                                            <p>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('user review', ['id' => $data->id])); ?>" class="btn btn-primary">detail</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('component.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\latihan_laravel\laravel-maulana\resources\views/component/wadek/content.blade.php ENDPATH**/ ?>