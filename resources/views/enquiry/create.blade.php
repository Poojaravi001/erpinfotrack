@extends('layouts.app')
@section('title', 'Enquiry List')
@section('main')
<div class="main-content">
   <section class="section">
      <div class="section-body"> 
          <div class="row">
              <div class="col-12">
                  <div class="card card-primary" x-data="app">

                     <form method="post" id="myForm" action="{{ route('enquiry.store') }}" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">


                        <div class="row">
                          {{-- <div class="form-group col-lg-3">
                             <label>Enquiry ID</label>
                              <input type="text" name="EnquiryID" class="form-control form-control-sm" required>
                         </div> --}}

                  
                         <div class="form-group col-lg-3">
                            <label>Date</label>
                            <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group col-lg-3">
                           <label>Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" required>
                       </div>
                      
                       {{-- <div class="form-group col-lg-3">
                        <label>Type</label>
                         <select name="type" class="form-control form-control-sm" required>
                           <option value="">Select Type</option>
                           <option value="Outside Student">Outside Student</option>
                           <option value="Inside Student">Inside Student</option>
                         </select>
                      </div> --}}

                      <div class="form-group col-lg-3">
                        <label>Date of Birth</label>
                         <input type="date" name="dob" class="form-control form-control-sm" required>
                    </div>

                      <div class="form-group col-lg-3">
                        <label>Blood Group</label>
                        <select name="blood_group" class="form-control form-control-sm" required>
                          <option value="">Select Blood Group</option>
                          <option value="A+">A+</option>
                          <option value="A-">A-</option>
                          <option value="B+">B+</option>
                          <option value="B-">B-</option>
                          <option value="O+">O+</option>
                          <option value="O-">O-</option>
                          <option value="AB+">AB+</option>
                          <option value="AB-">AB-</option>
                        </select>
                    </div>


                    <div class="form-group col-lg-3">
                      <label>Gender</label>
                       <select name="gender" class="form-control form-control-sm" required>
                         <option value="">Select Gender</option>
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>
                         <option value="Transgender">Transgender</option>
                       </select>
                
                    </div>

                    <div class="form-group col-lg-3">
                      <label>Mobile No</label>
                       <input type="text" name="mobile_no" maxlength="10" class="form-control form-control-sm @error('mobile_no') is-invalid @enderror">
                       @error('mobile_no')
                       <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                
                  </div>


                
                  <div class="form-group col-lg-3">
                    <label>Alternate Mobile No</label>
                    <input type="text" name="alternate_mobile_no" maxlength="10" class="form-control form-control-sm">
                  </div>
                  
                  <div class="form-group col-lg-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control form-control-sm">
                  </div>

                  <div class="form-group col-lg-3">
                    <label>School Name</label>
                     <input type="text" name="school_name" class="form-control form-control-sm" required>
                </div>

                  <div class="form-group col-lg-3">
                    <label>Group</label>
                     <select name="school_group" class="form-control form-control-sm" required>
                       <option value="">Select Group</option>
                       <option value="Science">Science</option>
                       <option value="Commerce">Commerce</option>
                       <option value="Arts">Arts</option>
                     </select>
                </div>


                  <div class="form-group col-lg-3">
                    <label>Address Line1</label>
                     <input type="text" name="address_line1" class="form-control form-control-sm" required>
                </div>

                <div class="form-group col-lg-3">
                  <label>Address Line2</label>
                   <input type="text" name="address_line2" class="form-control form-control-sm" required>
              </div>

              <div class="form-group col-lg-3">
                <label>Taluk</label>
                 <input type="text" name="taluk" class="form-control form-control-sm" required>
            </div>
              
            <div class="form-group col-lg-3">
              <label>State</label>
               <select name="state" class="form-control form-control-sm" required>
                 <option value="">Select State</option>
                 @foreach ($states as $state)
                 <option value="{{$state->State}}">{{$state->State}}</option>
                 @endforeach
               </select>
          </div>

              <div class="form-group col-lg-3">
                <label>District</label>
                 <select name="city" class="form-control form-control-sm" required>
                   <option value="">Select District</option>
                   @foreach ($districts as $district)
                   <option value="{{$district->District}}">{{$district->District}}</option>
                   @endforeach
                 </select>
            </div>

   


            <div class="form-group col-lg-3">
              <label>Pincode</label>
               <input type="number" name="pincode" class="form-control form-control-sm">
          </div>
        
                   
          <div class="form-group col-lg-12"><h6> Parents Details</h6> <hr style="border-bottom: 1px solid #ccc;"></div>

          <div class="form-group col-lg-12">
            <label>Relation Type</label>
             <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" value="Father" name="relation_type" id="relation_type_father" checked>
               <label class="form-check-label" for="relation_type_father">
                 Father
               </label>
               
             </div>
             <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" value="Mother" x-model="mother" name="relation_type" id="relation_type_mother">
               <label class="form-check-label" for="relation_type_mother">
                 Mother
               </label>
             </div>

             <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" value="Guardian" x-model="guardian" name="relation_type" id="relation_type_guardian">
              <label class="form-check-label" for="relation_type_guardian">
                Guardian
              </label>
            </div>

          </div>

          <div class="form-group col-lg-3">
            <label>Father Name</label>
             <input type="text" name="father_name" class="form-control form-control-sm" required>
        </div>

        <div class="form-group col-lg-3">
          <label>Father Mobile No</label>
           <input type="text" name="father_no" class="form-control form-control-sm" required>
      </div>

      <div class="form-group col-lg-3">
        <label>Father Occupation</label>
         <input type="text" name="father_occupation" class="form-control form-control-sm">
    </div>

    <div class="form-group col-lg-3">
      <label>Father Email </label>
       <input type="text" name="father_email" class="form-control form-control-sm">
  </div>


  <div class="form-group col-lg-3" x-show="mother">
    <label>Mother Name</label>
     <input type="text" name="mother_name" class="form-control form-control-sm">
</div>

<div class="form-group col-lg-3" x-show="mother">
  <label>Mother Mobile No</label>
   <input type="text" name="mother_no" class="form-control form-control-sm">
</div>

<div class="form-group col-lg-3" x-show="mother">
<label>Mother Occupation</label>
 <input type="text" name="mother_occupation" class="form-control form-control-sm">
</div>

<div class="form-group col-lg-3" x-show="mother">
<label>Mother Email </label>
<input type="text" name="mother_email" class="form-control form-control-sm">
</div>




    <div class="form-group col-lg-3" x-show="guardian">
      <label>Guardian Name</label>
       <input type="text" name="guardian_name" class="form-control form-control-sm">
  </div>
  
  <div class="form-group col-lg-3" x-show="guardian">
    <label>Guardian Mobile No</label>
     <input type="text" name="guardian_no" class="form-control form-control-sm">
  </div>
  
  <div class="form-group col-lg-3" x-show="guardian">
  <label>Guardian Occupation</label>
   <input type="text" name="guardian_occupation" class="form-control form-control-sm">
  </div>
  
  <div class="form-group col-lg-3" x-show="guardian">
  <label>Guardian Email </label>
  <input type="text" name="guardian_email" class="form-control form-control-sm">
  </div>
 



    <div class="form-group col-lg-12"><h6>Additional  Details</h6> <hr style="border-bottom: 1px solid #ccc;"></div>
    {{-- <div class="form-group col-lg-3">
      <label>Refereed By</label>
      <select name="refereed_by" class="form-control form-control-sm" required>
      <option value="">Select Refereed By</option>
      <option value="Advertisement">Advertisement</option>
      <option value="Email">Email</option>
      <option value="Phone">Phone</option>
      <option value="Campus walk-in">Campus walk-in</option>
      <option value="Website">Website</option>
      <option value="Pamplet">Pamplet</option>
      <option value="Events">Events</option>
      <option value="Others">Others</option>
    </select>
  </div> --}}

    <div class="form-group col-lg-3">
      <label>Refereed By</label>
      <select name="refereed_by" class="form-control form-control-sm" required>
      <option value="">Select Refereed By</option>
      <option value="Agency">Agency</option>
      <option value="Staff">Staff</option>
      <option value="Students">Students</option>
    </select>
  </div>

  {{-- <div class="form-group col-lg-3">
    <label>Remarks</label>
     <textarea name="remarks" class="form-control form-control-sm" cols="30" rows="5"></textarea>
  </div> --}}

  <div class="form-group col-lg-3">
    <label>Enrollment Date</label>
     <input type="date" value="{{date('Y-m-d')}}" name="enrollment_date" class="form-control form-control-sm">
</div>


<div class="form-group col-lg-3">
  <label>Counselled By</label>
   <input type="text" name="counselled_by" class="form-control form-control-sm" >
</div>

  <div class="form-group col-lg-3">
    <label>Enquired By</label>
     <input type="text" name="enquired_by" class="form-control form-control-sm">
  </div>

<div class="form-group col-lg-3">
  <label>Media</label>
   <input type="text"  name="media" class="form-control form-control-sm">
</div>
<div class="form-group col-lg-3">
  <label>Physically Challenged</label>
  <select id="physicallyChallenged" name="physically_challenged" class="form-control form-control-sm" required>
    <option value="">Select Option</option>
    <option value="Yes">Yes</option>
    <option value="No">No</option>
  </select>
</div>

<!-- This input field is initially hidden -->
<div class="form-group col-lg-3" id="percentageInput" style="display: none;">
  <label>Physical Challenge Percentage</label>
  <input
    type="number"
    name="physical_challenge_percentage"
    class="form-control form-control-sm"
    placeholder="Enter percentage"
    min="0"
    max="100"
  />
</div>

<script>
  // JavaScript to handle showing/hiding the input field
  document.getElementById("physicallyChallenged").addEventListener("change", function () {
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
      <option value="{{ $year->academic_year }}">{{ $year->academic_year }}</option>
  @endforeach
  </select>
</div>

<div class="form-group col-lg-3">
  <label>Type / Category</label>
  <select id="type" name="type" class="form-control form-control-sm" required>
      <option value="">Select Type / Category</option>
  </select>
</div>

<div class="form-group col-lg-3">
  <label>Interested Course</label>
  <select id="course" name="course_id" class="form-control form-control-sm" required>
      <option value="">Select Course</option>
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
@endsection

@section('js')
<script>

  document.addEventListener('alpine:init', () => {
      Alpine.data('app', () => ({
       mother:null,
       guardian:null,
      }))
  })
  
</script>

<script>
  $('#batchYear').change(function () {
      var batchYear = $(this).val();
  
      if (batchYear) {  // Ensure batch year is selected
          $.ajax({
              url: "{{ route('get.categories') }}",
              type: "GET",
              data: { batch_year: batchYear },
              success: function (response) {
                  $('#type').empty().append('<option value="">Select Type / Category</option>');
  
                  if (response.categories.length > 0) {
                      $.each(response.categories, function (key, category) {
                          $('#type').append('<option value="' + category + '">' + category + '</option>');
                      });
                  }
              }
          });
      } else {
          console.error("Batch year is not selected");
      }
  });
  
  $('#batchYear, #type').change(function () {
      var batchYear = $('#batchYear').val();
      var type = $('#type').val();
  
      if (batchYear && type) {  // Ensure both batch year and type are selected
          $.ajax({
              url: "{{ route('get.batch.data') }}",
              type: "GET",
              data: { batch_year: batchYear, type: type },
              success: function (response) {
                  $('#course').empty().append('<option value="">Select Course</option>');
  
                  if (response.courses.length > 0) {
                      $.each(response.courses, function (key, course) {
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