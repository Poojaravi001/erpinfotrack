
<?php $__env->startSection('title', 'Fees List'); ?>
<?php $__env->startSection('main'); ?>
<div class="main-content" x-data="app">
   <section class="section">
      <div class="section-body"> 
          <div class="row">
           
              <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-body">
                    <form action="<?php echo e(route('fees.create')); ?>" enctype="multipart/form-data">
                    <div class="row">
                      <div class="form-group col-lg-4">
                        <label>Name</label>
                         <select name="name"  x-on:change="getdata($el.value)" id="name">
                           <option value="">Select Name</option>
                         </select>
                      </div>

                      <div class="form-group col-lg-3">
                        <label>Mobile No</label>
                         <input type="text" name="mobile_no" x-model="mobile_no"  maxlength="10" class="form-control form-control-sm" required />
                      </div>

                      <div class="form-group col-lg-3">
                        <label>course</label>
                         <select name="course" x-model="course" class="form-control form-control-sm" required>
                           <option value="">Select Course</option>
                           <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($course->id); ?>"><?php echo e($course->title); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
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
                <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4 col-sm-12">
                        <p class="mb-1">Admission No: <?php echo e($admission->id); ?> </p>
                        <p class="mb-1">Student Name: <?php echo e($admission->name); ?></p>
                        <p class="mb-1">Mobile No: <b><?php echo e($admission->mobile_no); ?></b></p>
                      </div>

                      <div class="col-md-4 col-sm-12">
                        <p class="mb-1">DOB: <?php echo e($admission->dob); ?></p>
                        <p class="mb-1">Gender: <?php echo e($admission->gender); ?></p>
                        <p class="mb-1">Course: <?php echo e($admission->course->title); ?></p>
                      </div>

                      <div class="col-md-4 col-sm-12">
                        <p class="mb-1">Father Name: <?php echo e($admission->father_name); ?></p>
                        <p class="mb-1">Mother Name: <?php echo e($admission->mother_name); ?></p>
                        
                      </div>

                      <div class="col-md-6 col-sm-12 mb-2"><a href="<?php echo e(route('fees.show', $admission->id)); ?>" class="btn btn-primary">View Transactions</a></div> 
                    </div>
              
                    <form action="<?php echo e(route('fees.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="admission_id" value="<?php echo e($admission->id); ?>">
                        <div class="row">
                           <div class="form-group col-md-3 col-sm-12">
                          <label>Payment Date</label>
                          <input type="date" name="payment_date" value="<?php echo e(date('Y-m-d')); ?>" class="form-control form-control-sm" required/>
                        </div> 
                        <div class="form-group col-md-3 col-sm-12">
                          <label>Fees Title</label>
                          <input type="text" name="title" value="tuition fees" class="form-control form-control-sm" placeholder="Enter Title"/>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                          <label>Fees Amount</label>
                          <input type="number" name="amount" step="any" min="0" max="<?php echo e($course_fee); ?>" value="<?php echo e($course_fee); ?>" class="form-control form-control-sm" placeholder="Enter Amount" required/>
                        </div>
                        
                        <div class="form-group col-md-3 col-sm-12">
                          <label>Payment Method</label>
                          <select name="payment_method" x-model="payment_method"  class="form-control form-control-sm" required>
                            <option value="Cash">Cash</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Neft">Neft</option>
                            <option value="UPI">UPI</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Others">Others</option>
                          </select>
                        </div>

                        <div class="form-group col-md-3 col-sm-12" x-show="payment_method == 'Bank Transfer'">
                          <label>Bank Name</label>
                          <input type="text" name="bank_name" class="form-control form-control-sm"/>
                        </div>


                        <div class="form-group col-md-3 col-sm-12" x-show="payment_method == 'Bank Transfer'">
                          <label>Acc No</label>
                          <input type="text" name="acc_no" class="form-control form-control-sm" :required="payment_method == 'Bank Transfer'"/>
                        </div>



                        <div class="form-group col-md-3 col-sm-12" x-show="payment_method == 'Bank Transfer'">
                          <label>IFSC Code</label>
                          <input type="text" name="ifsc_code" class="form-control form-control-sm" />
                        </div>


                        <div class="form-group col-md-3 col-sm-12" x-show="payment_method == 'UPI'">
                          <label>Transaction Id</label>
                          <input type="text" name="transaction_id" class="form-control form-control-sm" :required="payment_method == 'UPI'" />
                        </div>


                        <div class="form-group col-md-3 col-sm-12" x-show="payment_method == 'UPI'">
                          <label>UPI Id</label>
                          <input type="text" name="upi_id" class="form-control form-control-sm"/>
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
                        <div class="form-group col-md-12 col-sm-12">
                          <button type="submit" class="btn btn-primary" :disabled="course_fee < 0">Submit</button>
                          <p class="text-danger">Pending Fees: <b x-text="course_fee.toFixed(2)"></b></p>
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
  const name = new TomSelect('#name');
  document.addEventListener('alpine:init', () => {
  Alpine.data('app', () => ({
    payment_method:"Cash",
    options : <?php echo json_encode($names, 15, 512) ?>,
    mobile_no : null,
    course:null,
    concession_type:"manual",
    course_fee : Number(<?php echo e($course_fee); ?>),
    getdata(val) {
      const option = this.options.find(option => option.name === val);
      this.course = option.course_id;
      this.mobile_no = option.mobile_no;
    },
    init() {
      this.options.forEach((option) => {
        name.addOption({text: `${option.name} (${option.course.title})`,value: option.name,});
      })
    },
 })
  )})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views\fees\create.blade.php ENDPATH**/ ?>