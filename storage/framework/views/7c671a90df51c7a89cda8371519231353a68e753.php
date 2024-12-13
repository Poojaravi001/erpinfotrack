
<?php $__env->startSection('title', 'Enquiry List'); ?>
<?php $__env->startSection('main'); ?>
<div class="main-content">
   <section class="section">
      <div class="section-body"> 
          <div class="row">
              <div class="col-12">
                  <div class="card card-primary" x-data="app">
                     <form method="post" action="<?php echo e(route('enquiry.update', $enquiry->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                      <div class="card-body">
    
                       
                        <div class="row">
                          <div class="form-group col-lg-3">
                             <label>Name</label>
                              <input type="text" name="name" value="<?php echo e($enquiry->name); ?>" class="form-control form-control-sm" required>
                         </div>
                        
                         
                        <div class="form-group col-lg-3">
                          <label>Date of Birth</label>
                           <input type="date" value="<?php echo e($enquiry->dob); ?>" name="dob" class="form-control form-control-sm" required>
                      </div>
  
                      <div class="form-group col-lg-3">
                        <label>Gender</label>
                         <select name="gender" class="form-control form-control-sm" required>
                           <option value="">Select Gender</option>
                           <option value="Male" <?php if($enquiry->gender == 'Male'): ?> selected <?php endif; ?>>Male</option>
                           <option value="Female" <?php if($enquiry->gender == 'Female'): ?> selected <?php endif; ?>>Female</option>
                           <option value="Transgender" <?php if($enquiry->gender == 'Transgender'): ?> selected <?php endif; ?>>Transgender</option>
                         </select>
                  
                      </div>
  
                      <div class="form-group col-lg-3">
                        <label>Mobile No</label>
                         <input type="text" name="mobile_no" value="<?php echo e($enquiry->mobile_no); ?>" maxlength="10" class="form-control form-control-sm <?php $__errorArgs = ['mobile_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                         <?php $__errorArgs = ['mobile_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <div class="alert alert-danger"><?php echo e($message); ?></div>
                         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  
                    </div>

                    <div class="form-group col-lg-3">
                      <label>Alternate Mobile No</label>
                       <input type="text" name="alternate_mobile_no" value="<?php echo e($enquiry->alternate_mobile_no); ?>" maxlength="10" class="form-control form-control-sm <?php $__errorArgs = ['alternate_mobile_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                       <?php $__errorArgs = ['alternate_mobile_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                       <div class="alert alert-danger"><?php echo e($message); ?></div>
                       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                  </div>


                     
                  <div class="form-group col-lg-3">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo e($enquiry->email); ?>" class="form-control form-control-sm <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                       <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                       <div class="alert alert-danger"><?php echo e($message); ?></div>
                       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="form-group col-lg-3">
                    <label>School Name</label>
                     <input type="text" name="school_name" value="<?php echo e($enquiry->school_name); ?>" class="form-control form-control-sm <?php $__errorArgs = ['school_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                       <?php $__errorArgs = ['school_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                       <div class="alert alert-danger"><?php echo e($message); ?></div>
                       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group col-lg-3">
                  <label>Group</label>
                    <input type="text" name="school_group" value="<?php echo e($enquiry->school_group); ?>" class="form-control form-control-sm <?php $__errorArgs = ['school_group'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php $__errorArgs = ['school_group'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

                    <div class="form-group col-lg-3">
                      <label>Address Line1</label>
                       <input type="text" name="address_line1" value="<?php echo e($enquiry->address_line1); ?>" class="form-control form-control-sm" required>
                  </div>
  
                  <div class="form-group col-lg-3">
                    <label>Address Line2</label>
                     <input type="text" name="address_line2" value="<?php echo e($enquiry->address_line2); ?>" class="form-control form-control-sm" required>
                </div>
  
                <div class="form-group col-lg-3">
                  <label>Taluk</label>
                  <input type="text" name="taluk" value="<?php echo e($enquiry->taluk); ?>" class="form-control form-control-sm" required>
              </div>
                
              <div class="form-group col-lg-3">
                <label>State</label>
                <input type="text" name="state" value="<?php echo e($enquiry->state); ?>" class="form-control form-control-sm" required>
            </div>
  
                <div class="form-group col-lg-3">
                  <label>District</label>
                  <input type="text" name="district" value="<?php echo e($enquiry->city); ?>" class="form-control form-control-sm" required>
              </div>
  
  
              <div class="form-group col-lg-3">
                <label>Pincode</label>
                <input type="text" name="pincode" value="<?php echo e($enquiry->pincode); ?>" class="form-control form-control-sm" required>
            </div>
          
                     
            <div class="form-group col-lg-12"><h6> Parents Details</h6> <hr style="border-bottom: 1px solid #ccc;"></div>

           
  
            <div class="form-group col-lg-3">
              <label>Father Name</label>
               <input type="text" name="father_name" value="<?php echo e($enquiry->father_name); ?>" class="form-control form-control-sm" required>
          </div>
  
          <div class="form-group col-lg-3">
            <label>Father Mobile No</label>
             <input type="text" name="father_no" value="<?php echo e($enquiry->father_no); ?>"  class="form-control form-control-sm" required>
        </div>
  
        <div class="form-group col-lg-3">
          <label>Father Occupation</label>
           <input type="text" name="father_occupation" value="<?php echo e($enquiry->father_occupation); ?>" class="form-control form-control-sm">
      </div>
  
      <div class="form-group col-lg-3">
        <label>Father Email </label>
         <input type="text" name="father_email" value="<?php echo e($enquiry->father_email); ?>" class="form-control form-control-sm">
    </div>
  
  
    <div class="form-group col-lg-3">
      <label>Mother Name</label>
       <input type="text" name="mother_name" value="<?php echo e($enquiry->mother_name); ?>" class="form-control form-control-sm">
  </div>
  
  <div class="form-group col-lg-3">
    <label>Mother Mobile No</label>
     <input type="text" name="mother_no" value="<?php echo e($enquiry->mother_no); ?>" class="form-control form-control-sm">
  </div>
  
  <div class="form-group col-lg-3">
  <label>Mother Occupation</label>
   <input type="text" name="mother_occupation" value="<?php echo e($enquiry->mother_occupation); ?>" class="form-control form-control-sm">
  </div>
  
  <div class="form-group col-lg-3">
  <label>Mother Email </label>
  <input type="text" name="mother_email" value="<?php echo e($enquiry->mother_email); ?>" class="form-control form-control-sm">
  </div>
  
  
  
  
      <div class="form-group col-lg-3">
        <label>Guardian Name</label>
         <input type="text" name="guardian_name" value="<?php echo e($enquiry->guardian_name); ?>" class="form-control form-control-sm">
    </div>
    
    <div class="form-group col-lg-3">
      <label>Guardian Mobile No</label>
       <input type="text" name="guardian_no" value="<?php echo e($enquiry->guardian_no); ?>" class="form-control form-control-sm">
    </div>
    
    <div class="form-group col-lg-3">
    <label>Guardian Occupation</label>
     <input type="text" name="guardian_occupation" value="<?php echo e($enquiry->guardian_occupation); ?>" class="form-control form-control-sm">
    </div>
    
    <div class="form-group col-lg-3">
    <label>Guardian Email </label>
    <input type="text" name="guardian_email" value="<?php echo e($enquiry->guardian_email); ?>" class="form-control form-control-sm">
    </div>
   
  
  
  
      <div class="form-group col-lg-12"><h6>Additional Details</h6> <hr style="border-bottom: 1px solid #ccc;"></div>
  
      
    <div class="form-group col-lg-3">
      <label>Refered By</label>
      <input type="text" name="refereed_by" value="<?php echo e($enquiry->refereed_by); ?>" class="form-control form-control-sm" required>
  </div>

    <div class="form-group col-lg-3">
      <label>Enrollment Date</label>
       <input type="date" value="<?php echo e($enquiry->enrollment_date); ?>" name="enrollment_date" class="form-control form-control-sm">
  </div>


 <div class="form-group col-lg-3">
  <label>Counselled By</label>
  <input type="text" name="counselled_by" value="<?php echo e($enquiry->counselled_by); ?>" class="form-control form-control-sm" required>
</div>
  
<div class="form-group col-lg-3">
  <label>Enquired By</label>
  <input type="text" name="enquired_by" value="<?php echo e($enquiry->enquired_by); ?>" class="form-control form-control-sm" required>
</div>

  
  
  
  
  

  <!-- <div class="form-group col-lg-3">
    <label>Documents</label>
     <input type="file"  name="documents"  accept="image/*,application/pdf" class="form-control form-control-sm" <?php if($enquiry->documents != ""): ?> disabled <?php endif; ?>>
  </div> -->
  
  
  <!-- <div class="form-group col-lg-3">
    <label>Health Remarks</label>
     <textarea name="health_remarks" class="form-control form-control-sm" cols="30" rows="5"> <?php echo e($enquiry->health_remarks); ?></textarea>
  </div>
   -->
   <div class="form-group col-lg-3">
    <label>Media</label>
    <input type="text" name="media" value="<?php echo e($enquiry->media); ?>" class="form-control form-control-sm" required>
  </div>

  <div class="form-group col-lg-3">
    <label>Physically Challenged</label>
    <input type="text" name="physically_challenged" value="<?php echo e($enquiry->physically_challenged); ?>" class="form-control form-control-sm" required>
  </div>

  <div class="form-group col-lg-3">
    <label>Interested Course</label>
    <input type="text" name="interested_course" value="<?php echo e($enquiry->interested_course); ?>" class="form-control form-control-sm" required>
  </div>
    
          <div class="form-group col-lg-12">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
  
           
                        </div>
                     
          </div>
         </form>
      </div>
              </div>
          </div>
      </div>
  
     </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views\enquiry\edit.blade.php ENDPATH**/ ?>