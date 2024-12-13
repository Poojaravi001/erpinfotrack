
<?php $__env->startSection('title', 'Enquiry'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('bundles/datatables/datatables.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div class="main-content">
   <section class="section">

    <div class="section-body"> 
        <div class="row">
            <div class="col-md-12 col-sm-12">
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success alert-dismissible show fade"> <?php echo e(session('success')); ?> </div>
            <?php endif; ?>
                 
        
                <div class="card card-primary">
  
                    <div class="card-body">
  
                    <div class="row">
                    <div class="col-md-10 col-sm-12 mb-3">
                    <h6 class="col-deep-purple">Admission Details</h6>
                    </div>
                    <div class="col-md-2 col-sm-12 mb-3">
                      <a href="<?php echo e(route('admission.create')); ?>" class="btn btn-primary btn-block">Add Admission</a>
                    </div>
                    </div>
                    <div class="col-12">
                    <div class="table-responsive">
      <table class="table table-striped table-sm" id="myTable">
  
      <thead>
  
        <tr role="row">
  
          <th>Admission No</th>
          <th>Name</th>
          <th>Dob</th>
          <th>Gender</th>
          <th>Mobile No</th>
          <th>Address Line1</th>
          <th>Address Line2</th>
          <th>Course</th>
          <th>Action</th>
        </tr>
  
        </thead>
  
        <tbody>
          <?php $__currentLoopData = $admissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($admission->id); ?></td>
            <td><?php echo e($admission->name); ?></td>
            <td><?php echo e($admission->dob); ?></td>
            <td><?php echo e($admission->gender); ?></td>
            <td><?php echo e($admission->mobile_no); ?></td>
            <td><?php echo e($admission->address_line1); ?></td>
            <td><?php echo e($admission->address_line2); ?></td>
            <td><?php echo e($admission->course->title); ?></td>
            <td>
              <form action="<?php echo e(route('admission.destroy', $admission->id)); ?>" method="post">
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
            <div class="col-md-6 col-sm-12">
            <div class="card card-primary">
  
              <div class="card-body" id="chart" style="height: 400px;width: 100%;">
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
<script src="https://cdn.jsdelivr.net/npm/echarts@5.5.1/dist/echarts.min.js"></script>
<script>
  const table = $('#myTable').DataTable({

    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

  });

</script>
<script type="text/javascript">
  var myChart = echarts.init(document.getElementById('chart'));
  var data = <?php echo json_encode($data, 15, 512) ?>;
  var titles = data.map(item => item.title);
  var admissions = data.map(item => item.admission);
  var option = {
    title: {
      text: 'Admission Details'
    },
    tooltip: {},
    legend: {
      data: ['Admission'] 
    },
    xAxis: {
      data: titles
    },
    yAxis: {},
    series: [
      {
        name: 'Admission',
        type: 'bar',
        data: admissions,
        barWidth: '10%',
        itemStyle: {
          color: '#007bff'
        }
      }
    ]
  };
  myChart.setOption(option);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views\admission\index.blade.php ENDPATH**/ ?>