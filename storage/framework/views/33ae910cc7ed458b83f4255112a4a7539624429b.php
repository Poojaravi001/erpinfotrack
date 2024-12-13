<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>ERP System </title>
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
          <div class="col-12 col-lg-8 offset-lg-2">
            <div class="card card-primary">
              <div class="card-header">
                  
                <h4>Login</h4>
                
              </div>
              <div class="card-body">
                  
                                                
                <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                    
                    
                 <div class="row">    
                 
                    <div class="col-12 col-lg-6">   
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
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                     
                    </div>
                    <input id="password" type="password" class="form-control form-control-sm <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                    <?php $__errorArgs = ['password'];
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
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>


                  <div class="form-group col-12 mb-4">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                  <div class="form-group col-12 mb-4">
                    <?php if(Route::has('password.request')): ?>
                    <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                        <?php echo e(__('Forgot Your Password?')); ?>

                    </a>
                <?php endif; ?>
                  </div>
                  </div>
                
                  
                  <div class="col-lg-6 col-12 d-md-block d-none text-center align-self-center p-3">
                                     
                                        <img class="img-fluid" src="https://www.linelogictech.com/icode/app-assets/images/pages/login.png" alt="branding logo">
                                    
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
</html><?php /**PATH D:\xampp\htdocs\erp\resources\views/auth/login.blade.php ENDPATH**/ ?>