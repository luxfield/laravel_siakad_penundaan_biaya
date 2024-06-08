<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('component.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo e(asset('adminLTE/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTELogo" height="60" width="60">
        </div>

        
        <?php if(Session::get('user') != "TU"): ?>
        
        <?php else: ?>
        
        <?php endif; ?>
        <?php echo $__env->yieldContent('item'); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('component.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
</body>

</html>
<?php echo $__env->make('component.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('component.tu.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('component.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\maulana\laravel-maulana\resources\views/component/app.blade.php ENDPATH**/ ?>