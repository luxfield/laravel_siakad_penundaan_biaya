<?php $__currentLoopData = $pengajuan_dana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($data->status == "setuju"): ?>
<tr class="table-primary">
    <?php elseif($data->status == "tolak"): ?>
<tr class="table-danger">
    <?php else: ?>
<tr class="table-warning">
    <?php endif; ?>
    <td><?php echo e($data->id); ?>

       
    </td>
    <td><?php echo e($data->name); ?></td>
    <td><?php echo e($data->tanggal); ?></td>
    <td>
        <p>
            <?php echo e($data->jenis_pengajuan); ?>

        </p>
        <p>
            (<?php echo e($data->status); ?>)
        </p>
    </td>

    <td>
        <a href="<?php echo e(route('user review', ['id' => $data->id])); ?>" class="btn btn-primary">detail</a>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\maulana\laravel-maulana\resources\views/component/hmj/index.blade.php ENDPATH**/ ?>