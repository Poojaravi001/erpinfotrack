
<?php $__env->startSection('title', 'Edit Enquiry'); ?>
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
                                        <label>Date</label>
                                        <input type="date" name="date" value="<?php echo e($enquiry->date); ?>" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Name</label>
                                        <input type="text" name="name" value="<?php echo e($enquiry->name); ?>" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Date of Birth</label>
                                        <input type="date" value="<?php echo e($enquiry->dob); ?>" name="dob" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Blood Group</label>
                                        <select name="blood_group" class="form-control form-control-sm" required>
                                            <option value="">Select Blood Group</option>
                                            <option value="A+" <?php echo e($enquiry->blood_group == 'A+' ? 'selected' : ''); ?>>A+</option>
                                            <option value="A-" <?php echo e($enquiry->blood_group == 'A-' ? 'selected' : ''); ?>>A-</option>
                                            <option value="B+" <?php echo e($enquiry->blood_group == 'B+' ? 'selected' : ''); ?>>B+</option>
                                            <option value="B-" <?php echo e($enquiry->blood_group == 'B-' ? 'selected' : ''); ?>>B-</option>
                                            <option value="O+" <?php echo e($enquiry->blood_group == 'O+' ? 'selected' : ''); ?>>O+</option>
                                            <option value="O-" <?php echo e($enquiry->blood_group == 'O-' ? 'selected' : ''); ?>>O-</option>
                                            <option value="AB+" <?php echo e($enquiry->blood_group == 'AB+' ? 'selected' : ''); ?>>AB+</option>
                                            <option value="AB-" <?php echo e($enquiry->blood_group == 'AB-' ? 'selected' : ''); ?>>AB-</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control form-control-sm" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male" <?php echo e($enquiry->gender == 'Male' ? 'selected' : ''); ?>>Male</option>
                                            <option value="Female" <?php echo e($enquiry->gender == 'Female' ? 'selected' : ''); ?>>Female</option>
                                            <option value="Transgender" <?php echo e($enquiry->gender == 'Transgender' ? 'selected' : ''); ?>>Transgender</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Mobile No</label>
                                        <input type="text" name="mobile_no" maxlength="10" value="<?php echo e($enquiry->mobile_no); ?>" class="form-control form-control-sm <?php $__errorArgs = ['mobile_no'];
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
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Alternate Mobile No</label>
                                        <input type="text" name="alternate_mobile_no" maxlength="10" value="<?php echo e($enquiry->alternate_mobile_no); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?php echo e($enquiry->email); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>School Name</label>
                                        <input type="text" name="school_name" value="<?php echo e($enquiry->school_name); ?>" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Group</label>
                                        <select name="school_group" class="form-control form-control-sm" required>
                                            <option value="">Select Group</option>
                                            <option value="Science" <?php echo e($enquiry->school_group == 'Science' ? 'selected' : ''); ?>>Science</option>
                                            <option value="Commerce" <?php echo e($enquiry->school_group == 'Commerce' ? 'selected' : ''); ?>>Commerce</option>
                                            <option value="Arts" <?php echo e($enquiry->school_group == 'Arts' ? 'selected' : ''); ?>>Arts</option>
                                        </select>
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
                                        <select name="state" class="form-control form-control-sm" required>
                                            <option value="">Select State</option>
                                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($state->State); ?>" <?php echo e($enquiry->state == $state->State ? 'selected' : ''); ?>><?php echo e($state->State); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>District</label>
                                        <select name="city" class="form-control form-control-sm" required>
                                            <option value="">Select District</option>
                                            <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($district->District); ?>" <?php echo e($enquiry->city == $district->District ? 'selected' : ''); ?>><?php echo e($district->District); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Pincode</label>
                                        <input type="number" name="pincode" value="<?php echo e($enquiry->pincode); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-12"><h6>Parents Details</h6> <hr style="border-bottom: 1px solid #ccc;"></div>

                                    <div class="form-group col-lg-12">
                                        <label>Relation Type</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="Father" name="relation_type" id="relation_type_father" <?php echo e(strpos($enquiry->relation_type, 'Father') !== false ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="relation_type_father">
                                                Father
                                            </label>
                                        </div>
                                           <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="Mother" x-model="mother" name="relation_type" id="relation_type_mother" <?php echo e(strpos($enquiry->relation_type, 'Mother') !== false ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="relation_type_mother">
                                                Mother
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="Guardian" x-model="guardian" name="relation_type" id="relation_type_guardian" <?php echo e(strpos($enquiry->relation_type, 'Guardian') !== false ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="relation_type_guardian">
                                                Guardian
                                            </label>
                                        </div>

                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Father Name</label>
                                        <input type="text" name="father_name" value="<?php echo e($enquiry->father_name); ?>" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Father Mobile No</label>
                                        <input type="text" name="father_no" value="<?php echo e($enquiry->father_no); ?>" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Father Occupation</label>
                                        <input type="text" name="father_occupation" value="<?php echo e($enquiry->father_occupation); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Father Email </label>
                                        <input type="text" name="father_email" value="<?php echo e($enquiry->father_email); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="mother">
                                        <label>Mother Name</label>
                                        <input type="text" name="mother_name" value="<?php echo e($enquiry->mother_name); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="mother">
                                        <label>Mother Mobile No</label>
                                        <input type="text" name="mother_no" value="<?php echo e($enquiry->mother_no); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="mother">
                                        <label>Mother Occupation</label>
                                        <input type="text" name="mother_occupation" value="<?php echo e($enquiry->mother_occupation); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="mother">
                                        <label>Mother Email </label>
                                        <input type="text" name="mother_email" value="<?php echo e($enquiry->mother_email); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="guardian">
                                        <label>Guardian Name</label>
                                        <input type="text" name="guardian_name" value="<?php echo e($enquiry->guardian_name); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="guardian">
                                        <label>Guardian Mobile No</label>
                                        <input type="text" name="guardian_no" value="<?php echo e($enquiry->guardian_no); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="guardian">
                                        <label>Guardian Occupation</label>
                                        <input type="text" name="guardian_occupation" value="<?php echo e($enquiry->guardian_occupation); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="guardian">
                                        <label>Guardian Email </label>
                                        <input type="text" name="guardian_email" value="<?php echo e($enquiry->guardian_email); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-12"><h6>Additional Details</h6> <hr style="border-bottom: 1px solid #ccc;"></div>

                                    <div class="form-group col-lg-3">
                                        <label>Refereed By</label>
                                        <select name="refereed_by" class="form-control form-control-sm" required>
                                            <option value="">Select Refereed By</option>
                                            <option value="Agency" <?php echo e($enquiry->refereed_by == 'Agency' ? 'selected' : ''); ?>>Agency</option>
                                            <option value="Staff" <?php echo e($enquiry->refereed_by == 'Staff' ? 'selected' : ''); ?>>Staff</option>
                                            <option value="Students" <?php echo e($enquiry->refereed_by == 'Students' ? 'selected' : ''); ?>>Students</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Enrollment Date</label>
                                        <input type="date" value="<?php echo e($enquiry->enrollment_date); ?>" name="enrollment_date" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Counselled By</label>
                                        <input type="text" name="counselled_by" value="<?php echo e($enquiry->counselled_by); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Enquired By</label>
                                        <input type="text" name="enquired_by" value="<?php echo e($enquiry->enquired_by); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Media</label>
                                        <input type="text" name="media" value="<?php echo e($enquiry->media); ?>" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Physically Challenged</label>
                                        <select id="physicallyChallenged" name="physically_challenged" class="form-control form-control-sm" required>
                                            <option value="">Select Option</option>
                                            <option value="Yes" <?php echo e($enquiry->physically_challenged == 'Yes' ? 'selected' : ''); ?>>Yes</option>
                                            <option value="No" <?php echo e($enquiry->physically_challenged == 'No' ? 'selected' : ''); ?>>No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3" id="percentageInput" style="<?php echo e($enquiry->physically_challenged == 'Yes' ? 'display: block;' : 'display: none;'); ?>">
                                        <label>Physical Challenge Percentage</label>
                                        <input type="number" name="physical_challenge_percentage" value="<?php echo e($enquiry->physical_challenge_percentage); ?>" class="form-control form-control-sm" placeholder="Enter percentage" min="0" max="100" />
                                    </div>

                                    <script>
                                        document.getElementById("physicallyChallenged").addEventListener("change", function() {
                                            const selectedValue = this.value;
                                            const percentageInput = document.getElementById("percentageInput");

                                            if (selectedValue === "Yes") {
                                                percentageInput.style.display = "block";
                                            } else {
                                                percentageInput.style.display = "none";
                                            }
                                        });
                                    </script>

                                    <div class="form-group col-lg-3">
                                        <label>Batch Year</label>
                                        <select id="batchYear" name="batch_year" class="form-control form-control-sm" required>
                                            <option value="">Select</option>
                                            <?php $__currentLoopData = $academicYears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($year->academic_year); ?>" <?php echo e($enquiry->batch_year == $year->academic_year ? 'selected' : ''); ?>><?php echo e($year->academic_year); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>


<div class="form-group col-lg-3">
    <label>Type / Category</label>
    <select id="type" name="type" class="form-control form-control-sm" required>
        <option value="">Select Type / Category</option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($category); ?>" <?php echo e($enquiry->type == $category ? 'selected' : ''); ?>><?php echo e($category); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

                                



                                <div class="form-group col-lg-3">
                                    <label>Interested Course</label>
                                    <select id="course" name="course_id" class="form-control form-control-sm" required>
                                        <option value="">Select Course</option>
                                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($course->id); ?>" <?php echo e($enquiry->course_id == $course->id ? 'selected' : ''); ?>><?php echo e($course->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group col-lg-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
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

<?php $__env->startSection('js'); ?>
<script>
document.addEventListener('alpine:init', () => {
Alpine.data('app', () => ({
mother: <?php echo e(strpos($enquiry->relation_type, 'Mother') !== false ? 'true' : 'false'); ?>,
guardian: <?php echo e(strpos($enquiry->relation_type, 'Guardian') !== false ? 'true' : 'false'); ?>,
}))
})
</script>

<script>
$('#batchYear').change(function() {
var batchYear = $(this).val();

    if (batchYear) { // Ensure batch year is selected
        $.ajax({
            url: "<?php echo e(route('get.categories')); ?>",
            type: "GET",
            data: {
                batch_year: batchYear
            },
            success: function(response) {
                $('#type').empty().append('<option value="">Select Type / Category</option>');

                if (response.categories.length > 0) {
                    $.each(response.categories, function(key, category) {
                        $('#type').append('<option value="' + category + '">' + category + '</option>');
                    });
                }
            }
        });
    } else {
        console.error("Batch year is not selected");
    }
});

$('#batchYear, #type').change(function() {
    var batchYear = $('#batchYear').val();
    var type = $('#type').val();

    if (batchYear && type) { // Ensure both batch year and type are selected
        $.ajax({
            url: "<?php echo e(route('get.batch.data')); ?>",
            type: "GET",
            data: {
                batch_year: batchYear,
                type: type
            },
            success: function(response) {
                $('#course').empty().append('<option value="">Select Course</option>');

                if (response.courses.length > 0) {
                    $.each(response.courses, function(key, course) {
                        $('#course').append('<option value="' + course.id + '">' + course.name + '</option>');
                    });
                }
            }
        });
    } else {
        console.error("Batch year or type/category is not selected");
    }
});
</script>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\erp\resources\views/enquiry/edit.blade.php ENDPATH**/ ?>