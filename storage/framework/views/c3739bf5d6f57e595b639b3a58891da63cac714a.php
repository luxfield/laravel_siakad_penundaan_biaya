<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('component.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<body class="hold-transition login-page w-full">
    <img class="img img-fluid" src="https://portal.unsada.ac.id/gate/img/login-bg.jpg" alt="" style="
    filter:brightness(75%)">
    <div class="login-box " style="
    position:fixed;
    z-index:2">
    
        <div class="login-logo">
            <a href="<?php echo e(route('index')); ?>" class="text-white">Sistem Informasi Pengajuan Pengurangan Dana <b>Universitas Darma Persada</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>
          <?php if(isset($error)): ?>
          <div class="row">
              <div class="alert alert-danger" role="alert">
                  <?php echo e($error); ?>

              </div>
          </div>
          <?php endif; ?>
          <form  method="post">
            <?php echo csrf_field(); ?>
            <div class="input-group mb-3">
              <input name="id" type="id" class="form-control" placeholder="id">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input name="password" type="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
<?php echo $__env->make('component.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
    </html>
<?php /**PATH D:\latihan_laravel\laravel-maulana\resources\views/login.blade.php ENDPATH**/ ?>