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
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table" id="table_inbox" data-toggle="table"
                                data-sort-name="date" data-sort-order="desc">
                                <thead>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th data-field="date" data-sortable="true">Date</th>
                                    <th>keterangan</th>
                                    <th>detail</th>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pengajuan_dana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($data->id); ?></td>
                                            <td><?php echo e($data->name); ?></td>
                                            <td><?php echo e($data->tanggal); ?></td>
                                            <td><?php echo e($data->keterangan); ?></td>
                                            <?php if(Session::get('user') == 'TU'): ?>
                                                <td><a class="btn btn-primary"
                                                        href="<?php echo e(route('staff review', ['id' => $data->id])); ?>">Lihat
                                                        Detail</a></td>
                                            <?php else: ?>
                                                <td><a class="btn btn-primary"
                                                        href="<?php echo e(route('user review', ['id' => $data->id])); ?>">Lihat
                                                        Detail</a></td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
</div>
<?php /**PATH D:\latihan_laravel\laravel-maulana\resources\views/component/table_approve.blade.php ENDPATH**/ ?>