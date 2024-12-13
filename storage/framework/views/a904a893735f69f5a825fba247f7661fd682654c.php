<!DOCTYPE html>
<html lang="en">
<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Auto Moblie </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo e(asset('css/app.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('bundles/bootstrap-social/bootstrap-social.css')); ?>">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/components.css')); ?>">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo e(asset('img/favicon.ico')); ?>' />
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-lg-6 offset-lg-2">
            <div class="card card-primary">
              <div class="card-header">
                  
                <h4><?php echo e(__('Reset Password')); ?></h4>
                
              </div>
  

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row">    
                        <div class="col-12">   
                          <div class="form-group col-12 mb-4">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control form-control-sm <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"  required autocomplete="email" autofocus>
        
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        
                          </div>

                          <div class="form-group col-12 mb-4">
                            <button type="submit" class="btn btn-primary btn-lg" tabindex="4">
                                <?php echo e(__('Send Password Reset Link')); ?>

                            </button>
                          </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 
 
</section>

</div>
<!-- General JS Scripts -->
<script src="<?php echo e(asset('js/app.min.js')); ?>"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
<!-- Custom JS File -->
<script src="<?php echo e(asset('js/custom.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\erp\resources\views\auth\passwords\email.blade.php ENDPATH**/ ?>