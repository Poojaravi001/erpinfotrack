
<?php $__env->startSection('title', 'Courses List'); ?>
<?php $__env->startSection('main'); ?>
<div class="main-content">
   <section class="section">
      <div class="section-body"> 
          <div class="row">
              <div class="col-12">
                  <div class="card card-primary">
                     <form method="post" action="<?php echo e(route('courses.update', $course->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                      <div class="card-body">
                       
                      <div class="row">
                       
                       <div class="form-group col-lg-3">
                        <label>Name</label>
                         <input type="text" name="title" value="<?php echo e($course->title); ?>" class="form-control form-control-sm" required>
          
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Prerequisites</label>
                         <input type="text" name="prerequisites" value="<?php echo e($course->prerequisites); ?>" class="form-control form-control-sm">
                    </div>

                    <div class="form-group col-lg-3">
                        <label>Category</label>
                         <input type="text" name="category" value="<?php echo e($course->category); ?>" class="form-control form-control-sm">
                    </div>

                 
                    <div class="form-group col-lg-3">
                        <label>Duration</label>
                         <input type="text" name="duration" value="<?php echo e($course->duration); ?>" class="form-control form-control-sm" required>
                    </div>

            <div class="form-group col-lg-3">
            <label>Difficulty Level</label>
             <select name="level" class="form-control form-control-sm">
               <option value="">Select Level</option>
               <option value="Beginner" <?php if($course->level == 'Beginner'): ?> selected <?php endif; ?>>Beginner</option>
               <option value="Intermediate" <?php if($course->level == 'Intermediate'): ?> selected <?php endif; ?>>Intermediate</option>
               <option value="Advanced" <?php if($course->level == 'Advanced'): ?> selected <?php endif; ?>>Advanced</option>
               <option value="Expert" <?php if($course->level == 'Expert'): ?> selected <?php endif; ?>>Expert</option>
             </select>
             
          </div>


          <div class="form-group col-lg-3">
            <label>Start Time</label>
             <input type="time" name="start_time" value="<?php echo e($course->start_time); ?>" placeholder="e.g 40"  class="form-control form-control-sm">
           </div>

           <div class="form-group col-lg-3">
            <label>End Time</label>
             <input type="time" name="end_time" value="<?php echo e($course->end_time); ?>" placeholder="e.g 40"  class="form-control form-control-sm">
           </div>

          <div class="form-group col-lg-3">
           <label>Enrollment Limit</label>
            <input type="number" value="<?php echo e($course->enrollment_limit); ?>" name="enrollment_limit" min="0" class="form-control form-control-sm">
          </div>

          <div class="form-group col-lg-3">
              <label>Course Fee</label>
              <input type="number" value="<?php echo e($course->course_fee); ?>" min="1" name="course_fee" class="form-control form-control-sm" required>
          </div>

          <div class="form-group col-lg-3">
               <label>Assessment Method</label>
              <input type="text" value="<?php echo e($course->assessment_method); ?>" name="assessment_method" class="form-control form-control-sm">
          </div>

          <div class="form-group col-lg-3">
               <label>Enrollment Status</label>
               <select name="enrollment_status" class="form-control form-control-sm">
                <option value="">Select Option</option>
                <option value="Yes" <?php if($course->enrollment_status == 'Yes'): ?> selected <?php endif; ?>>Yes</option>
                <option value="No" <?php if($course->enrollment_status == 'No'): ?> selected <?php endif; ?>>No</option>
              </select>
          </div>

          <div class="form-group col-lg-3">
            <label>Concession</label>
            <select name="concession" class="form-control form-control-sm" required>
              <option value="">Select Option</option>
              <option value="Yes" <?php if($course->concession == 'Yes'): ?> selected <?php endif; ?>>Yes</option>
              <option value="No" <?php if($course->concession == 'No'): ?> selected <?php endif; ?>>No</option>
            </select>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erp\resources\views\courses\edit.blade.php ENDPATH**/ ?>