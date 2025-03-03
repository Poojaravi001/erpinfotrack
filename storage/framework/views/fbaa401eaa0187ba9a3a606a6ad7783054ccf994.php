
<?php $__env->startSection('title', 'Fees List'); ?>
<?php $__env->startSection('main'); ?>
<div class="main-content" x-data="app">
   <section class="section">
      <div class="section-body"> 
          <div class="row">
              <div class="col-md-12">
                  <div class="card card-primary">
                      <div class="card-body">
                          <form x-on:submit.prevent="fetchAdmission">
                              <div class="row">
                                  <div class="form-group col-lg-3">
                                      <label>Registration No</label>
                                      <select name="admission_id" id="admission_id" x-model="admission_id" x-on:change="updateDetailsById" class="form-control form-control-sm" required>
                                          <option value="">Select Registration No</option>
                                          <?php $__currentLoopData = $admissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <option value="<?php echo e($admission->id); ?>"><?php echo e($admission->id); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                  </div>
                                  
                                  <div class="form-group col-lg-3">
                                      <label>Name</label>
                                      <input type="text" name="name" id="name" x-model="name" class="form-control form-control-sm" readonly>
                                  </div>
                                  
                                  <div class="form-group col-lg-3">
                                      <label>Course</label>
                                      <input type="text" name="course" id="course" x-model="course" class="form-control form-control-sm" readonly>
                                  </div>
                                  
                                  <div class="form-group col-lg-2 mt-4">
                                      <button type="submit" class="btn btn-primary">Get</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>

              <?php if($admission): ?>
              <div class="col-md-12" x-show="showCard && admission_id" x-transition>
                  <div class="card card-primary">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-4 col-sm-12">
                                  <p class="mb-1">Admission No: <span x-text="selectedAdmission.id"></span></p>
                                  <p class="mb-1">Student Name: <span x-text="selectedAdmission.name"></span></p>
                              </div>
                          </div>

                          <form action="<?php echo e(route('fees.store')); ?>" method="post" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="admission_id" x-model="selectedAdmission.id" value="<?php echo e($admission->id); ?>">
                              <div class="row">
                                  <div class="form-group col-md-3 col-sm-12">
                                      <label>Academic Year</label>
                                      <select name="academic_year" x-model="academic_year" class="form-control form-control-sm" required>
                                          <option value="">Select Academic Year</option>
                                          <?php $__currentLoopData = $academicYears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                  </div>
                                  <div class="form-group col-md-3 col-sm-12">
                                      <label>Semester</label>
                                      <select name="semester" x-model="semester" x-on:change="fetchFeeAmount()" class="form-control form-control-sm" required>
                                          <option value="">Select Semester</option>
                                          <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <option value="<?php echo e($semester); ?>"><?php echo e('Semester ' . $semester); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                  </div>
                                  <div class="form-group col-md-3 col-sm-12">
                                      <label>Payment Date</label>
                                      <input type="date" name="payment_date" value="<?php echo e(date('Y-m-d')); ?>" class="form-control form-control-sm" required/>
                                  </div>
                                  <div class="form-group col-md-3 col-sm-12">
                                      <label>Fees Title</label>
                                      <select name="title" id="fee_title" class="form-control form-control-sm" required>
                                          <option value="">Select Fees Title</option>
                                          <?php $__currentLoopData = $feeItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feeItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <option value="<?php echo e($feeItem->id); ?>"><?php echo e($feeItem->fee_type); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                  </div>
                                  <div class="form-group col-md-3 col-sm-12">
                                      <label>Fees Amount</label>
                                      <select name="amount" id="fee_amount" class="form-control form-control-sm" required>
                                          <option value="">Select Fees Amount</option>
                                          <?php $__currentLoopData = $feeItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feeItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <option value="<?php echo e($feeItem->amount); ?>"><?php echo e(number_format($feeItem->amount, 2)); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                  </div>
                                  <div class="form-group col-md-3 col-sm-12">
                                      <label>Payment Method</label>
                                      <select name="payment_method" x-model="payment_method" class="form-control form-control-sm" required>
                                          <option value="Cash">Cash</option>
                                          <option value="Bank Transfer">Bank Transfer</option>
                                      </select>
                                  </div>
                                  <?php if($admission->concessions() == 'Not Apply Concession'): ?>
                                  <div class="form-group col-md-3 col-sm-12">
                                      <label>Concession Type</label>
                                      <select name="concession_type" x-model="concession_type" class="form-control form-control-sm" required>
                                          <option value="manual">Manual</option>
                                          <option value="percentage">Percentage</option>
                                      </select>
                                  </div>
                                  <div class="form-group col-md-3 col-sm-12">
                                      <label>Concession</label>
                                      <input type="number" name="concession_amt" step="any" min="0" class="form-control form-control-sm" required/>
                                  </div>
                                  <?php endif; ?>
                                  <div class="form-group col-md-3 col-sm-12">
                                      <label>Remarks</label>
                                      <textarea name="remarks" class="form-control form-control-sm" cols="30" rows="10"></textarea>
                                      <input type="hidden" name="course_fee" x-model="course_fee" />
                                  </div>
                                  <div class="col-md-6 col-sm-12 mb-2">
                                      <a :href="'<?php echo e(route('fees.show', '')); ?>/' + selectedAdmission.id" class="btn btn-primary">View Transactions</a>
                                  </div>
                                  <div class="form-group col-md-12 col-sm-12">
                                      <button type="submit" class="btn btn-primary" :disabled="course_fee < 0">Submit</button>
                                      
                                      
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
              <?php endif; ?>
          </div>
      </div>
   </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
function redirectToReceipt() {
    let admissionId = Alpine.store('app').selectedAdmission.id;
    
    if (!admissionId) {
        alert("Please select an admission first.");
        return;
    }

    const params = new URLSearchParams({
        title: '',
        amount: '',
        payment_method: '',
        remarks: ''
    }).toString();

    window.location.href = `<?php echo e(url('/fees/receipt')); ?>/${admissionId}?${params}`;
}
</script>
<script>
    $(document).ready(function() {
        $('#fee_title').change(function() {
            var feeId = $(this).val();
            if (feeId) {
                $.ajax({
                    url: '/get-fee-details/' + feeId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('#fee_amount').val(response.amount);
                    }
                });
            } else {
                $('#fee_amount').val('');
            }
        });
    });
</script>
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('app', () => ({
        admission_id: '', // Selected registration number
        name: '', // Student's name
        course: '', // Student's course name
        showCard: false, // Toggle visibility
        admissions: <?php echo json_encode($admissions, 15, 512) ?>, // Admissions list with student data
        courses: <?php echo json_encode($courses, 15, 512) ?>, // Courses list
        selectedAdmission: {}, // Stores the selected student's details

        updateDetailsById() {
            // Find the student based on the selected admission ID
            const student = this.admissions.find(admission => admission.id == this.admission_id);
            
            if (student) {
                this.name = student.name;
                
                // Find course name from courses table
                const courseData = this.courses.find(course => course.id == student.course_id);
                this.course = courseData ? courseData.name : 'Not Assigned';

                this.selectedAdmission = student;
            } else {
                this.name = '';
                this.course = '';
                this.academic_year = '';
                this.selectedAdmission = {};
            }
        },

        fetchAdmission() {
            if (this.admission_id) {
                this.showCard = true;
            }
        },
    }));
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\erp\resources\views/fees/create.blade.php ENDPATH**/ ?>