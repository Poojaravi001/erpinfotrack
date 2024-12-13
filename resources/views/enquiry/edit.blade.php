@extends('layouts.app')
@section('title', 'Enquiry List')
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
                             <label>Name</label>
                              <input type="text" name="name" value="{{$enquiry->name}}" class="form-control form-control-sm" required>
                         </div>
                        
                         {{-- <div class="form-group col-lg-3">
                          <label>Type</label>
                           <select name="type" class="form-control form-control-sm" required>
                             <option value="">Select Type</option>
                             <option value="Outside Student" @if($enquiry->type == 'Outside Student') selected @endif>Outside Student</option>
                             <option value="Inside Student" @if($enquiry->type == 'Inside Student') selected @endif>Inside Student</option>
                           </select>
                        </div>
   --}}
                        <div class="form-group col-lg-3">
                          <label>Date of Birth</label>
                           <input type="date" value="{{ $enquiry->dob }}" name="dob" class="form-control form-control-sm" required>
                      </div>
  
                      <div class="form-group col-lg-3">
                        <label>Gender</label>
                         <select name="gender" class="form-control form-control-sm" required>
                           <option value="">Select Gender</option>
                           <option value="Male" @if($enquiry->gender == 'Male') selected @endif>Male</option>
                           <option value="Female" @if($enquiry->gender == 'Female') selected @endif>Female</option>
                           <option value="Transgender" @if($enquiry->gender == 'Transgender') selected @endif>Transgender</option>
                         </select>
                  
                      </div>
  
                      <div class="form-group col-lg-3">
                        <label>Mobile No</label>
                         <input type="text" name="mobile_no" value="{{$enquiry->mobile_no}}" maxlength="10" class="form-control form-control-sm @error('mobile_no') is-invalid @enderror">
                         @error('mobile_no')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                  
                    </div>

                    <div class="form-group col-lg-3">
                      <label>Alternate Mobile No</label>
                       <input type="text" name="alternate_mobile_no" value="{{$enquiry->alternate_mobile_no}}" maxlength="10" class="form-control form-control-sm @error('alternate_mobile_no') is-invalid @enderror">
                       @error('alternate_mobile_no')
                       <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                
                  </div>


                     
                  <div class="form-group col-lg-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{$enquiry->email}}" class="form-control form-control-sm @error('email') is-invalid @enderror">
                       @error('email')
                       <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                  </div>

                  <div class="form-group col-lg-3">
                    <label>School Name</label>
                     <input type="text" name="school_name" value="{{$enquiry->school_name}}" class="form-control form-control-sm @error('school_name') is-invalid @enderror">
                       @error('school_name')
                       <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                </div>

                <div class="form-group col-lg-3">
                  <label>Group</label>
                    <input type="text" name="school_group" value="{{$enquiry->school_group}}" class="form-control form-control-sm @error('school_group') is-invalid @enderror">
                    @error('school_group')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
              </div>

                    <div class="form-group col-lg-3">
                      <label>Address Line1</label>
                       <input type="text" name="address_line1" value="{{$enquiry->address_line1}}" class="form-control form-control-sm" required>
                  </div>
  
                  <div class="form-group col-lg-3">
                    <label>Address Line2</label>
                     <input type="text" name="address_line2" value="{{$enquiry->address_line2}}" class="form-control form-control-sm" required>
                </div>
  
                <div class="form-group col-lg-3">
                  <label>Taluk</label>
                  <input type="text" name="taluk" value="{{$enquiry->taluk}}" class="form-control form-control-sm" required>
              </div>
                
              <div class="form-group col-lg-3">
                <label>State</label>
                <input type="text" name="state" value="{{$enquiry->state}}" class="form-control form-control-sm" required>
            </div>
  
                <div class="form-group col-lg-3">
                  <label>District</label>
                  <input type="text" name="district" value="{{$enquiry->city}}" class="form-control form-control-sm" required>
              </div>
  
  
              <div class="form-group col-lg-3">
                <label>Pincode</label>
                <input type="text" name="pincode" value="{{$enquiry->pincode}}" class="form-control form-control-sm" required>
            </div>
          
                     
            <div class="form-group col-lg-12"><h6> Parents Details</h6> <hr style="border-bottom: 1px solid #ccc;"></div>

           
  
            <div class="form-group col-lg-3">
              <label>Father Name</label>
               <input type="text" name="father_name" value="{{$enquiry->father_name}}" class="form-control form-control-sm" required>
          </div>
  
          <div class="form-group col-lg-3">
            <label>Father Mobile No</label>
             <input type="text" name="father_no" value="{{$enquiry->father_no}}"  class="form-control form-control-sm" required>
        </div>
  
        <div class="form-group col-lg-3">
          <label>Father Occupation</label>
           <input type="text" name="father_occupation" value="{{$enquiry->father_occupation}}" class="form-control form-control-sm">
      </div>
  
      <div class="form-group col-lg-3">
        <label>Father Email </label>
         <input type="text" name="father_email" value="{{$enquiry->father_email}}" class="form-control form-control-sm">
    </div>
  
  
    <div class="form-group col-lg-3">
      <label>Mother Name</label>
       <input type="text" name="mother_name" value="{{$enquiry->mother_name}}" class="form-control form-control-sm">
  </div>
  
  <div class="form-group col-lg-3">
    <label>Mother Mobile No</label>
     <input type="text" name="mother_no" value="{{$enquiry->mother_no}}" class="form-control form-control-sm">
  </div>
  
  <div class="form-group col-lg-3">
  <label>Mother Occupation</label>
   <input type="text" name="mother_occupation" value="{{$enquiry->mother_occupation}}" class="form-control form-control-sm">
  </div>
  
  <div class="form-group col-lg-3">
  <label>Mother Email </label>
  <input type="text" name="mother_email" value="{{$enquiry->mother_email}}" class="form-control form-control-sm">
  </div>
  
  
  
  
      <div class="form-group col-lg-3">
        <label>Guardian Name</label>
         <input type="text" name="guardian_name" value="{{$enquiry->guardian_name}}" class="form-control form-control-sm">
    </div>
    
    <div class="form-group col-lg-3">
      <label>Guardian Mobile No</label>
       <input type="text" name="guardian_no" value="{{$enquiry->guardian_no}}" class="form-control form-control-sm">
    </div>
    
    <div class="form-group col-lg-3">
    <label>Guardian Occupation</label>
     <input type="text" name="guardian_occupation" value="{{$enquiry->guardian_occupation}}" class="form-control form-control-sm">
    </div>
    
    <div class="form-group col-lg-3">
    <label>Guardian Email </label>
    <input type="text" name="guardian_email" value="{{$enquiry->guardian_email}}" class="form-control form-control-sm">
    </div>
   
  
  
  
      <div class="form-group col-lg-12"><h6>Additional Details</h6> <hr style="border-bottom: 1px solid #ccc;"></div>
  
      {{-- <div class="form-group col-lg-3">
        <label>Refereed By</label>
        <select name="refereed_by" class="form-control form-control-sm" required>
        <option value="">Select Refereed By</option>
        <option value="Advertisement" @if($enquiry->refereed_by == 'Advertisement') selected @endif>Advertisement</option>
        <option value="Email" @if($enquiry->refereed_by == 'Email') selected @endif>Email</option>
        <option value="Phone" @if($enquiry->refereed_by == 'Phone') selected @endif>Phone</option>
        <option value="Campus walk-in" @if($enquiry->refereed_by == 'Campus walk-in') selected @endif>Campus walk-in</option>
        <option value="Website" @if($enquiry->refereed_by == 'Website') selected @endif>Website</option>
        <option value="Pamplet" @if($enquiry->refereed_by == 'Pamplet') selected @endif>Pamplet</option>
        <option value="Events" @if($enquiry->refereed_by == 'Events') selected @endif>Events</option>
        <option value="Others" @if($enquiry->refereed_by == 'Others') selected @endif>Others</option>
      </select>
    </div> --}}
    <div class="form-group col-lg-3">
      <label>Refered By</label>
      <input type="text" name="refereed_by" value="{{$enquiry->refereed_by}}" class="form-control form-control-sm" required>
  </div>

    <div class="form-group col-lg-3">
      <label>Enrollment Date</label>
       <input type="date" value="{{$enquiry->enrollment_date}}" name="enrollment_date" class="form-control form-control-sm">
  </div>


 <div class="form-group col-lg-3">
  <label>Counselled By</label>
  <input type="text" name="counselled_by" value="{{$enquiry->counselled_by}}" class="form-control form-control-sm" required>
</div>
  
<div class="form-group col-lg-3">
  <label>Enquired By</label>
  <input type="text" name="enquired_by" value="{{$enquiry->enquired_by}}" class="form-control form-control-sm" required>
</div>

  {{-- <div class="form-group col-lg-3">
    <label>Blood group</label>
     <select name="blood_group" class="select">
      <option value="">Select Blood Group</option>
      @foreach ($blood_group as $row)
      <option value="{{$row->blood_group}}" @if($enquiry->blood_group == $row->blood_group) selected @endif>{{$row->blood_group}}</option>
      @endforeach
    </select>
  </div> --}}
  
  {{-- <div class="form-group col-lg-3">
    <label>student photo</label>
     <input type="file"  name="student_photo"  accept="image/*" class="form-control form-control-sm" @if($enquiry->student_photo != "") disabled @endif> 
  </div> --}}
  
  {{-- <!-- <div class="form-group col-lg-3">
    <label>Document Type</label>
    <select name="document_type" class="select">
      <option value="">Select Document Type</option>
      @foreach ($document_type as $row)
      <option value="{{$row->document_type}}" @if($enquiry->document_type == $row->document_type) selected @endif>{{$row->document_type}}</option>
      @endforeach
    </select>
  </div> --> --}}

  <!-- <div class="form-group col-lg-3">
    <label>Documents</label>
     <input type="file"  name="documents"  accept="image/*,application/pdf" class="form-control form-control-sm" @if($enquiry->documents != "") disabled @endif>
  </div> -->
  
  {{-- <!-- <div class="form-group col-lg-3">
    <label>Health Issues</label>
    <select name="health_issues" class="select">
      <option value="">Select Health Issues</option>
      @foreach ($health_issues as $issue)
      <option value="{{$issue->health_issues}}" @if($enquiry->health_issues == $issue->health_issues) selected @endif>{{$issue->health_issues}}</option>
      @endforeach
    </select>
  </div>
   --> --}}
  <!-- <div class="form-group col-lg-3">
    <label>Health Remarks</label>
     <textarea name="health_remarks" class="form-control form-control-sm" cols="30" rows="5"> {{$enquiry->health_remarks}}</textarea>
  </div>
   -->
   <div class="form-group col-lg-3">
    <label>Media</label>
    <input type="text" name="media" value="{{$enquiry->media}}" class="form-control form-control-sm" required>
  </div>

  <div class="form-group col-lg-3">
    <label>Physically Challenged</label>
    <input type="text" name="physically_challenged" value="{{$enquiry->physically_challenged}}" class="form-control form-control-sm" required>
  </div>

  <div class="form-group col-lg-3">
    <label>Interested Course</label>
    <input type="text" name="interested_course" value="{{$enquiry->interested_course}}" class="form-control form-control-sm" required>
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
