
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
                          <label>Type</label>
                           <select name="type" class="form-control form-control-sm" required>
                             <option value="">Select Type</option>
                             <option value="Outside Student" <?php if($enquiry->type == 'Outside Student'): ?> selected <?php endif; ?>>Outside Student</option>
                             <option value="Inside Student" <?php if($enquiry->type == 'Inside Student'): ?> selected <?php endif; ?>>Inside Student</option>
                           </select>
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
                         <input type="text" name="mobile_no" value="<?php echo e($enquiry->mobile_no); ?>" maxlength="10" class="form-control form-control-sm">
                  
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
                <label>State</label>
                 <select name="state" class="form-control form-control-sm" required>
                   <option value="">Select State</option>
                   <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($state->State); ?>" <?php if($enquiry->state == $state->State): ?> selected <?php endif; ?>><?php echo e($state->State); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
            </div>
  
                <div class="form-group col-lg-3">
                  <label>District</label>
                   <select name="city" class="form-control form-control-sm" required>
                     <option value="">Select District</option>
                     <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($district->District); ?>" <?php if($enquiry->city == $district->District): ?> selected <?php endif; ?>><?php echo e($district->District); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </select>
              </div>
  
  
              <div class="form-group col-lg-3">
                <label>Pincode</label>
                 <input type="number" name="pincode" class="form-control form-control-sm">
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
        <label>Refereed By</label>
        <select name="refereed_by" class="form-control form-control-sm" required>
        <option value="">Select Refereed By</option>
        <option value="Advertisement" <?php if($enquiry->refereed_by == 'Advertisement'): ?> selected <?php endif; ?>>Advertisement</option>
        <option value="Email" <?php if($enquiry->refereed_by == 'Email'): ?> selected <?php endif; ?>>Email</option>
        <option value="Phone" <?php if($enquiry->refereed_by == 'Phone'): ?> selected <?php endif; ?>>Phone</option>
        <option value="Campus walk-in" <?php if($enquiry->refereed_by == 'Campus walk-in'): ?> selected <?php endif; ?>>Campus walk-in</option>
        <option value="Website" <?php if($enquiry->refereed_by == 'Website'): ?> selected <?php endif; ?>>Website</option>
        <option value="Pamplet" <?php if($enquiry->refereed_by == 'Pamplet'): ?> selected <?php endif; ?>>Pamplet</option>
        <option value="Events" <?php if($enquiry->refereed_by == 'Events'): ?> selected <?php endif; ?>>Events</option>
        <option value="Others" <?php if($enquiry->refereed_by == 'Others'): ?> selected <?php endif; ?>>Others</option>
      </select>
    </div>

    <div class="form-group col-lg-3">
      <label>Remarks</label>
       <textarea name="remarks" class="form-control form-control-sm" cols="30" rows="5"> <?php echo e($enquiry->remarks); ?></textarea>
    </div>
  
    <div class="form-group col-lg-3">
      <label>Enrollment Date</label>
       <input type="date" value="<?php echo e($enquiry->enrollment_date); ?>" name="enrollment_date" class="form-control form-control-sm">
  </div>


  
  <div class="form-group col-lg-3">
    <label>interested course</label>
     <select name="interested_course" class="form-control form-control-sm" required>
       <option value="">Select Course</option>
       <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <option value="<?php echo e($course->id); ?>" <?php if($enquiry->interested_course == $course->id): ?> selected <?php endif; ?>><?php echo e($course->title); ?></option>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </select>
  </div>
  

  <div class="form-group col-lg-3">
    <label>Blood group</label>
     <select name="blood_group" class="select">
      <option value="">Select Blood Group</option>
      <?php $__currentLoopData = $blood_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($row->blood_group); ?>" <?php if($enquiry->blood_group == $row->blood_group): ?> selected <?php endif; ?>><?php echo e($row->blood_group); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  
  <div class="form-group col-lg-3">
    <label>student photo</label>
     <input type="file"  name="student_photo"  accept="image/*" class="form-control form-control-sm" <?php if($enquiry->student_photo != ""): ?> disabled <?php endif; ?>> 
  </div>
  
  <div class="form-group col-lg-3">
    <label>Document Type</label>
    <select name="document_type" class="select">
      <option value="">Select Document Type</option>
      <?php $__currentLoopData = $document_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($row->document_type); ?>" <?php if($enquiry->document_type == $row->document_type): ?> selected <?php endif; ?>><?php echo e($row->document_type); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>

  <div class="form-group col-lg-3">
    <label>Documents</label>
     <input type="file"  name="documents"  accept="image/*,application/pdf" class="form-control form-control-sm" <?php if($enquiry->documents != ""): ?> disabled <?php endif; ?>>
  </div>
  
  <div class="form-group col-lg-3">
    <label>Health Issues</label>
    <select name="health_issues" class="select">
      <option value="">Select Health Issues</option>
      <?php $__currentLoopData = $health_issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($issue->health_issues); ?>" <?php if($enquiry->health_issues == $issue->health_issues): ?> selected <?php endif; ?>><?php echo e($issue->health_issues); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  
  <div class="form-group col-lg-3">
    <label>Health Remarks</label>
     <textarea name="health_remarks" class="form-control form-control-sm" cols="30" rows="5"> <?php echo e($enquiry->health_remarks); ?></textarea>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views\enquiryfollowup\edit.blade.php ENDPATH**/ ?>