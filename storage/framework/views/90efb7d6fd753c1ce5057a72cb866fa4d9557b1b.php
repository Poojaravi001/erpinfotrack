

<?php $__env->startSection('title', 'Fee Settings'); ?>

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
                        <div class="alert alert-success alert-dismissible show fade">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10 mb-3">
                                    <h6 class="col-deep-purple">Fees</h6>
                                </div>
                                <div class="col-2 mb-3">
                                    <a href="<?php echo e(route('feesettings.create')); ?>" class="btn btn-primary btn-block">Add Fees</a>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Academic Year</th>
                                            <th>Course Name</th>
                                            <th>Semester</th>
                                            <th>Fee Type</th>
                                            <th>Amount</th>
                                            <th>Grand Total</th>
                                            <th>Edit</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($feeSettings) && $feeSettings->count() > 0): ?>
                                            <?php $__currentLoopData = $feeSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $feeSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $__currentLoopData = $feeSetting->feeItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $feeItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <?php if($index == 0): ?>
                                                            <td rowspan="<?php echo e($feeSetting->feeItems->count()); ?>"><?php echo e($key+1); ?></td>
                                                            <td rowspan="<?php echo e($feeSetting->feeItems->count()); ?>"><?php echo e($feeSetting->academic_year); ?></td>
                                                            <td rowspan="<?php echo e($feeSetting->feeItems->count()); ?>"><?php echo e($feeSetting->course->name ?? 'N/A'); ?></td>
                                                            <td rowspan="<?php echo e($feeSetting->feeItems->count()); ?>"><?php echo e($feeSetting->semester); ?></td>
                                                        <?php endif; ?>
                                                        <td><?php echo e($feeItem->fee_type); ?></td>
                                                        <td><?php echo e(number_format($feeItem->amount, 2)); ?></td>
                                                        <?php if($index == 0): ?>
                                                            <td rowspan="<?php echo e($feeSetting->feeItems->count()); ?>"><?php echo e(number_format($feeSetting->grandTotal, 2)); ?></td>
                                                            <td rowspan="<?php echo e($feeSetting->feeItems->count()); ?>">
                                                                <a href="<?php echo e(route('feesettings.edit', $feeSetting->id)); ?>" class="btn btn-primary ">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </td> 
                                                            
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7" class="text-center">No records found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
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
        $(document).ready(function() {
            $('#myTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\erp\resources\views/feesettings/index.blade.php ENDPATH**/ ?>