@extends('layouts.app')
@section('title', 'Edit Enquiry')
@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary" x-data="app">
                        <form method="post" action="{{ route('enquiry.update', $enquiry->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-lg-3">
                                        <label>Date</label>
                                        <input type="date" name="date" value="{{ $enquiry->date }}" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ $enquiry->name }}" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Date of Birth</label>
                                        <input type="date" value="{{ $enquiry->dob }}" name="dob" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Blood Group</label>
                                        <select name="blood_group" class="form-control form-control-sm" required>
                                            <option value="">Select Blood Group</option>
                                            <option value="A+" {{ $enquiry->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                                            <option value="A-" {{ $enquiry->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                                            <option value="B+" {{ $enquiry->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                                            <option value="B-" {{ $enquiry->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                                            <option value="O+" {{ $enquiry->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                                            <option value="O-" {{ $enquiry->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                                            <option value="AB+" {{ $enquiry->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                                            <option value="AB-" {{ $enquiry->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control form-control-sm" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male" {{ $enquiry->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ $enquiry->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Transgender" {{ $enquiry->gender == 'Transgender' ? 'selected' : '' }}>Transgender</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Mobile No</label>
                                        <input type="text" name="mobile_no" maxlength="10" value="{{ $enquiry->mobile_no }}" class="form-control form-control-sm @error('mobile_no') is-invalid @enderror">
                                        @error('mobile_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Alternate Mobile No</label>
                                        <input type="text" name="alternate_mobile_no" maxlength="10" value="{{ $enquiry->alternate_mobile_no }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{ $enquiry->email }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>School Name</label>
                                        <input type="text" name="school_name" value="{{ $enquiry->school_name }}" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Group</label>
                                        <select name="school_group" class="form-control form-control-sm" required>
                                            <option value="">Select Group</option>
                                            <option value="Science" {{ $enquiry->school_group == 'Science' ? 'selected' : '' }}>Science</option>
                                            <option value="Commerce" {{ $enquiry->school_group == 'Commerce' ? 'selected' : '' }}>Commerce</option>
                                            <option value="Arts" {{ $enquiry->school_group == 'Arts' ? 'selected' : '' }}>Arts</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Address Line1</label>
                                        <input type="text" name="address_line1" value="{{ $enquiry->address_line1 }}" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Address Line2</label>
                                        <input type="text" name="address_line2" value="{{ $enquiry->address_line2 }}" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Taluk</label>
                                        <input type="text" name="taluk" value="{{ $enquiry->taluk }}" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>State</label>
                                        <select name="state" class="form-control form-control-sm" required>
                                            <option value="">Select State</option>
                                            @foreach ($states as $state)
                                            <option value="{{$state->State}}" {{ $enquiry->state == $state->State ? 'selected' : '' }}>{{$state->State}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>District</label>
                                        <select name="city" class="form-control form-control-sm" required>
                                            <option value="">Select District</option>
                                            @foreach ($districts as $district)
                                            <option value="{{$district->District}}" {{ $enquiry->city == $district->District ? 'selected' : '' }}>{{$district->District}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Pincode</label>
                                        <input type="number" name="pincode" value="{{ $enquiry->pincode }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-12"><h6>Parents Details</h6> <hr style="border-bottom: 1px solid #ccc;"></div>

                                    <div class="form-group col-lg-12">
                                        <label>Relation Type</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="Father" name="relation_type" id="relation_type_father" {{ strpos($enquiry->relation_type, 'Father') !== false ? 'checked' : '' }}>
                                            <label class="form-check-label" for="relation_type_father">
                                                Father
                                            </label>
                                        </div>
                                           <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="Mother" x-model="mother" name="relation_type" id="relation_type_mother" {{ strpos($enquiry->relation_type, 'Mother') !== false ? 'checked' : '' }}>
                                            <label class="form-check-label" for="relation_type_mother">
                                                Mother
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="Guardian" x-model="guardian" name="relation_type" id="relation_type_guardian" {{ strpos($enquiry->relation_type, 'Guardian') !== false ? 'checked' : '' }}>
                                            <label class="form-check-label" for="relation_type_guardian">
                                                Guardian
                                            </label>
                                        </div>

                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Father Name</label>
                                        <input type="text" name="father_name" value="{{ $enquiry->father_name }}" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Father Mobile No</label>
                                        <input type="text" name="father_no" value="{{ $enquiry->father_no }}" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Father Occupation</label>
                                        <input type="text" name="father_occupation" value="{{ $enquiry->father_occupation }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Father Email </label>
                                        <input type="text" name="father_email" value="{{ $enquiry->father_email }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="mother">
                                        <label>Mother Name</label>
                                        <input type="text" name="mother_name" value="{{ $enquiry->mother_name }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="mother">
                                        <label>Mother Mobile No</label>
                                        <input type="text" name="mother_no" value="{{ $enquiry->mother_no }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="mother">
                                        <label>Mother Occupation</label>
                                        <input type="text" name="mother_occupation" value="{{ $enquiry->mother_occupation }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="mother">
                                        <label>Mother Email </label>
                                        <input type="text" name="mother_email" value="{{ $enquiry->mother_email }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="guardian">
                                        <label>Guardian Name</label>
                                        <input type="text" name="guardian_name" value="{{ $enquiry->guardian_name }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="guardian">
                                        <label>Guardian Mobile No</label>
                                        <input type="text" name="guardian_no" value="{{ $enquiry->guardian_no }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="guardian">
                                        <label>Guardian Occupation</label>
                                        <input type="text" name="guardian_occupation" value="{{ $enquiry->guardian_occupation }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3" x-show="guardian">
                                        <label>Guardian Email </label>
                                        <input type="text" name="guardian_email" value="{{ $enquiry->guardian_email }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-12"><h6>Additional Details</h6> <hr style="border-bottom: 1px solid #ccc;"></div>

                                    <div class="form-group col-lg-3">
                                        <label>Refereed By</label>
                                        <select name="refereed_by" class="form-control form-control-sm" required>
                                            <option value="">Select Refereed By</option>
                                            <option value="Agency" {{ $enquiry->refereed_by == 'Agency' ? 'selected' : '' }}>Agency</option>
                                            <option value="Staff" {{ $enquiry->refereed_by == 'Staff' ? 'selected' : '' }}>Staff</option>
                                            <option value="Students" {{ $enquiry->refereed_by == 'Students' ? 'selected' : '' }}>Students</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Enrollment Date</label>
                                        <input type="date" value="{{ $enquiry->enrollment_date }}" name="enrollment_date" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Counselled By</label>
                                        <input type="text" name="counselled_by" value="{{ $enquiry->counselled_by }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Enquired By</label>
                                        <input type="text" name="enquired_by" value="{{ $enquiry->enquired_by }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Media</label>
                                        <input type="text" name="media" value="{{ $enquiry->media }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label>Physically Challenged</label>
                                        <select id="physicallyChallenged" name="physically_challenged" class="form-control form-control-sm" required>
                                            <option value="">Select Option</option>
                                            <option value="Yes" {{ $enquiry->physically_challenged == 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ $enquiry->physically_challenged == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-3" id="percentageInput" style="{{ $enquiry->physically_challenged == 'Yes' ? 'display: block;' : 'display: none;' }}">
                                        <label>Physical Challenge Percentage</label>
                                        <input type="number" name="physical_challenge_percentage" value="{{ $enquiry->physical_challenge_percentage }}" class="form-control form-control-sm" placeholder="Enter percentage" min="0" max="100" />
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
                                            @foreach($academicYears as $year)
                               <option value="{{ $year->academic_year }}" {{ $enquiry->batch_year == $year->academic_year ? 'selected' : '' }}>{{ $year->academic_year }}</option>
@endforeach
</select>
</div>


<div class="form-group col-lg-3">
    <label>Type / Category</label>
    <select id="type" name="type" class="form-control form-control-sm" required>
        <option value="">Select Type / Category</option>
        @foreach ($categories as $category)
        <option value="{{ $category }}" {{ $enquiry->type == $category ? 'selected' : '' }}>{{ $category }}</option>
        @endforeach
    </select>
</div>

                                



                                <div class="form-group col-lg-3">
                                    <label>Interested Course</label>
                                    <select id="course" name="course_id" class="form-control form-control-sm" required>
                                        <option value="">Select Course</option>
                                        @foreach ($courses as $course)
                                        <option value="{{ $course->id }}" {{ $enquiry->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                        @endforeach
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
@endsection

@section('js')
<script>
document.addEventListener('alpine:init', () => {
Alpine.data('app', () => ({
mother: {{ strpos($enquiry->relation_type, 'Mother') !== false ? 'true' : 'false' }},
guardian: {{ strpos($enquiry->relation_type, 'Guardian') !== false ? 'true' : 'false' }},
}))
})
</script>

<script>
$('#batchYear').change(function() {
var batchYear = $(this).val();

    if (batchYear) { // Ensure batch year is selected
        $.ajax({
            url: "{{ route('get.categories') }}",
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
            url: "{{ route('get.batch.data') }}",
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
@endsection




