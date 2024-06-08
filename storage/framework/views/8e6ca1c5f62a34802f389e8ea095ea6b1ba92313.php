<?php $__currentLoopData = $laporan_dana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laporan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($laporan->status == "setuju"): ?>
<tr class="table-primary">
    <?php elseif($laporan->status == "pending"): ?>
<tr class="table-warning">
    <?php else: ?>
<tr class="table-danger">
    <?php endif; ?>
    <td><?php echo e($laporan->id); ?></td>
    <td><?php echo e($laporan->name); ?></td>
    <td><?php echo e($laporan->tanggal); ?></td>
    <td><?php echo e($laporan->status); ?></td>
    <td><?php echo e($laporan->jenis_pengajuan); ?></td>
    <td><?php echo e($laporan->disetujui); ?></td>
    <td><?php echo e($laporan->diteruskan); ?></td>
    <td><?php echo e($laporan->dikonfirmasi); ?></td>
    <td><?php echo e($laporan->disahkan); ?></td>
    <td>
        <a href="<?php echo e(route('staff review', ['id' => $laporan->id])); ?>" class="btn btn-primary">detail</a>
    </td>
</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\maulana\laravel-maulana\resources\views/component/tu/index.blade.php ENDPATH**/ ?>