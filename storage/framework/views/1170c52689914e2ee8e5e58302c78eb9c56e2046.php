
<?php $__env->startSection('title', 'Fees List'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('bundles/datatables/datatables.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div class="main-content">
   <section class="section">

    <div class="section-body"> 
        <div class="row">
            <div class="col-12">
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success alert-dismissible show fade"> <?php echo e(session('success')); ?> </div>
            <?php endif; ?>
                 
        
                <div class="card card-primary">
  
                    <div class="card-body">
  
                    <div class="row">
                    <div class="col-md-6 col-sm-12 mb-3">
                    <h6 class="col-deep-purple">Fees List Details</h6>
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="table-responsive">
      <table class="table table-striped table-sm" id="myTable">
      <thead>
        <tr role="row">
          <th>#</th>
          <th>Title</th>
          <th>Payment Date</th>
          <th>Amount</th>
          <th>Payment Method</th>
          <th>Remarks</th>
          <th>Delete</th>
        </tr>
        </thead>
  
        <tbody>
          <?php $__currentLoopData = $admission->fees()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $fee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($key+1); ?></td>

            <td><?php echo e($fee->title); ?></td>

            <td><?php echo e($fee->payment_date); ?></td>

            <td><?php echo e($fee->amount); ?></td>

            <td><?php echo e($fee->payment_method); ?></td>

            <td><?php echo e($fee->remarks); ?></td>


            <td>
              <form action="<?php echo e(route('fees.destroy', $fee->id)); ?>" onsubmit="return confirm('Are you sure?')" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
              </form>
            </td>
          </tr>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

      </table>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>

   </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('bundles/datatables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script>
  const table = $('#myTable').DataTable({

    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

  });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views\fees\show.blade.php ENDPATH**/ ?>