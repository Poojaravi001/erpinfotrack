@extends('layouts.app')
@section('title', 'Edit Fee Settings')

@section('main')
<div class="main-content">
   <section class="section">
      <div class="section-body">
         <div class="card card-primary">
            <div class="card-body">
               <div class="row">
                  <div class="col-10 mb-3">
                     <h6 class="col-deep-purple">Edit Fee Settings</h6>
                  </div>
               </div>

               <form action="{{ route('feesettings.update', ['feesetting' => $feeSetting->id]) }}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="row">
                     <!-- Academic Year -->
                     <div class="form-group col-lg-3">
                        <label>Academic Year</label>
                        <select name="academic_year" class="form-control form-control-sm" required>
                           <option value="">Select</option>
                           <option value="2024-2026" {{ $feeSetting->academic_year == '2024-2026' ? 'selected' : '' }}>2024-2026</option>
                           <option value="2025-2027" {{ $feeSetting->academic_year == '2025-2027' ? 'selected' : '' }}>2025-2027</option>
                        </select>
                     </div>

                     <!-- Category -->
                     <div class="form-group col-lg-3">
                        <label>Category</label>
                        <select name="category" class="form-control form-control-sm" required>
                           <option value="">Select</option>
                           <option value="PG" {{ $feeSetting->category == 'PG' ? 'selected' : '' }}>Aided PG</option>
                           <option value="SF_PG" {{ $feeSetting->category == 'SF_PG' ? 'selected' : '' }}>SF PG</option>
                           <option value="UG" {{ $feeSetting->category == 'UG' ? 'selected' : '' }}>Aided UG</option>
                           <option value="SF_UG" {{ $feeSetting->category == 'SF_UG' ? 'selected' : '' }}>SF UG</option>
                        </select>
                     </div>

                     <!-- Shift -->
                     <div class="form-group col-lg-3">
                        <label>Shift</label>
                        <select name="shift" class="form-control form-control-sm" required>
                           <option value="">Select</option>
                           <option value="Morning Shift" {{ $feeSetting->shift == 'Morning Shift' ? 'selected' : '' }}>Morning Shift</option>
                           <option value="Afternoon Shift" {{ $feeSetting->shift == 'Afternoon Shift' ? 'selected' : '' }}>Afternoon Shift</option>
                        </select>
                     </div>

                     <!-- Medium -->
                     <div class="form-group col-lg-3">
                        <label>Medium</label>
                        <select name="medium" class="form-control form-control-sm" required>
                           <option value="">Select</option>
                           <option value="Tamil" {{ $feeSetting->medium == 'Tamil' ? 'selected' : '' }}>Tamil</option>
                           <option value="English" {{ $feeSetting->medium == 'English' ? 'selected' : '' }}>English</option>
                        </select>
                     </div>

                     <!-- Course Name -->
                     {{-- <div class="form-group col-lg-4">
                        <label>Course Name</label>
                        <input type="text" name="course_id" class="form-control form-control-sm" value="{{ $course->id }}">{{ $course->name }}" required>
                     </div> --}}

                     <!-- Course Name -->
                     <div class="form-group col-lg-4">
                        <label>Course Name</label>
                        <select name="course_id" class="form-control form-control-sm" required>
                           <option value="">Select</option>
                           @foreach ($courses as $course)
                           <option value="{{ $course->id }}" {{ $feeSetting->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                           @endforeach
                        </select>
                     </div>
                 

                  <div class="form-group col-lg-4">
                     <label>Semester</label>
                     <select name="semester" class="form-control form-control-sm" required>
                         <option value="">Select</option>
                         <option value="1" {{ $feeSetting->semester == '1' ? 'selected' : '' }}>Semester 1</option>
                         <option value="2" {{ $feeSetting->semester == '2' ? 'selected' : '' }}>Semester 2</option>
                         <option value="3" {{ $feeSetting->semester == '3' ? 'selected' : '' }}>Semester 3</option>
                         <option value="4" {{ $feeSetting->semester == '4' ? 'selected' : '' }}>Semester 4</option>
                         <option value="5" {{ $feeSetting->semester == '5' ? 'selected' : '' }}>Semester 5</option>
                         <option value="6" {{ $feeSetting->semester == '6' ? 'selected' : '' }}>Semester 6</option>
                     </select>
                 </div>
                 
               </div>
                  <!-- Add Item Button -->
                  <div class="col-md-12 form-group mt-0">
                     <button type="button" class="btn btn-warning" id="addItemButton">
                        <i class="fa fa-plus"></i> Add Item
                     </button>
                  </div>

                  <!-- Item Container -->
                  <div id="itemContainer">
                     @foreach($feeSetting->feeItems as $item)
                     <div class="col-md-12 row mb-3 itemRow">
                        <div class="col-md-3 form-group">
                           <label>Fee Type</label>
                           <input type="text" name="fee_type[]" class="form-control form-control-sm" value="{{ $item->fee_type }}" required>
                        </div>
                        <div class="col-md-2 form-group">
                           <label>Amount</label>
                           <input type="number" name="amount[]" class="form-control form-control-sm amountField" value="{{ $item->amount }}" required>
                        </div>
                        <div class="col-md-1 form-group">
                           <button type="button" class="btn btn-danger mt-4 removeRow">
                              <i class="fa fa-times"></i>
                           </button>
                        </div>
                     </div>
                     @endforeach
                  </div>

                  <!-- Grand Total -->
                  <div class="col-md-12 row mt-4">
                     <div class="col-md-3 form-group">
                        <label class="font-weight-bold">Grand Total</label>
                        <input type="number" id="grandTotal" class="form-control form-control-sm" value="{{ $feeSetting->grand_total }}" readonly />
                     </div>
                  </div>

                  <!-- Submit Button -->
                  <div class="form-group col-lg-12">
                     <button type="submit" class="btn btn-primary">Update</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>
</div>

<script>
   document.addEventListener('DOMContentLoaded', function () {
       const container = document.getElementById('itemContainer');
       const addItemButton = document.getElementById('addItemButton');

       function updateGrandTotal() {
           let grandTotal = 0;
           document.querySelectorAll('.amountField').forEach(field => {
               let value = parseFloat(field.value);
               if (!isNaN(value)) {
                   grandTotal += value;
               }
           });
           document.getElementById('grandTotal').value = grandTotal.toFixed(2);
       }

       document.querySelectorAll('.amountField').forEach(field => {
           field.addEventListener('input', updateGrandTotal);
       });

       document.querySelectorAll('.removeRow').forEach(button => {
           button.addEventListener('click', function () {
               this.closest('.itemRow').remove();
               updateGrandTotal();
           });
       });

       addItemButton.addEventListener('click', function () {
           let newItemRow = document.createElement('div');
           newItemRow.classList.add('col-md-12', 'row', 'mb-3', 'itemRow');
           newItemRow.innerHTML = `
               <div class="col-md-3 form-group">
                   <label>Fee Type</label>
                   <input type="text" name="fee_type[]" class="form-control form-control-sm" required />
               </div>
               <div class="col-md-2 form-group">
                   <label>Amount</label>
                   <input type="number" name="amount[]" class="form-control form-control-sm amountField" required />
               </div>
               <div class="col-md-1 form-group">
                   <button type="button" class="btn btn-danger mt-4 removeRow">
                       <i class="fa fa-times"></i>
                   </button>
               </div>
           `;

           newItemRow.querySelector('.removeRow').addEventListener('click', function () {
               newItemRow.remove();
               updateGrandTotal();
           });

           newItemRow.querySelector('.amountField').addEventListener('input', updateGrandTotal);
           container.appendChild(newItemRow);
       });

       updateGrandTotal();
   });
</script>
@endsection
