@extends('layouts.app')
@section('title', 'Edit Course')
@section('main')
<div class="main-content">
   <section class="section">
      <div class="section-body"> 
          <div class="row">
              <div class="col-12">
                  <div class="card card-primary">
                     <form method="post" action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      <div class="card-body">
                      <div class="row">
                        
                        <div class="form-group col-lg-3">
                          <label>Academic Year (UG & PG)</label>
                          <select id="academicYear" name="academic_year" class="form-control form-control-sm" required>
                            <option value="">Select</option>
                          </select>
                        </div>
                        
                        <div class="form-group col-lg-3">
                          <label>Category</label>
                          <select id="category" name="category" class="form-control form-control-sm" required>
                            <option value="">Select</option>
                          </select>
                        </div>
                        
                        <div class="form-group col-lg-3">
                          <label>Shift</label>
                          <select name="shift" class="form-control form-control-sm" required>
                             <option value="">Select</option>
                             <option value="Morning Shift" {{ $course->shift == 'Morning Shift' ? 'selected' : '' }}>Morning Shift</option>
                             <option value="Afternoon Shift" {{ $course->shift == 'Afternoon Shift' ? 'selected' : '' }}>Afternoon Shift</option>
                          </select>
                        </div>    

                        <div class="form-group col-lg-3">
                          <label>Medium</label>
                          <select name="medium" class="form-control form-control-sm" required>
                            <option value="">Select</option>
                            <option value="Tamil" {{ $course->medium == 'Tamil' ? 'selected' : '' }}>Tamil</option>
                            <option value="English" {{ $course->medium == 'English' ? 'selected' : '' }}>English</option>
                          </select>
                        </div>

                        <div class="form-group col-lg-4">
                          <label>Course Name</label>
                          <input type="text" name="name" value="{{ $course->name }}" class="form-control form-control-sm" required>
                        </div>

                        @foreach(['FC', 'OC', 'BC', 'MBC', 'SC_ST', 'OTHER'] as $field)
                        <div class="form-group col-lg-1">
                          <label>{{ $field }}</label>
                          <input type="number" name="{{ $field }}" min="0" value="{{ $course->$field }}" class="form-control form-control-sm seat-input" required>
                        </div>
                        @endforeach
                        
                        <div class="form-group col-lg-2">
                          <label>Total</label>
                          <input type="number" name="total" min="0" value="{{ $course->total }}" class="form-control form-control-sm" required id="total" readonly>
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

<script>
  // Populate Academic Year dynamically
  document.addEventListener("DOMContentLoaded", function () {
    const today = new Date();
    const currentYear = today.getFullYear();
    const options = [
      `${currentYear}-${currentYear + 3}`, 
      `${currentYear}-${currentYear + 2}`  
    ];
    
    const select = document.getElementById("academicYear");
    options.forEach(year => {
      const option = document.createElement("option");
      option.value = year;
      option.textContent = year;
      if (year === "{{ $course->academic_year }}") option.selected = true;
      select.appendChild(option);
    });

    // Populate category based on selected academic year
    select.addEventListener('change', function () {
      const categoryDropdown = document.getElementById('category');
      categoryDropdown.innerHTML = '<option value="">Select</option>';
      
      const selectedYear = this.value;
      const duration = parseInt(selectedYear.split('-')[1]) - parseInt(selectedYear.split('-')[0]);
      let categories = duration === 3 ? ["Aided UG", "SF UG"] : ["Aided PG", "SF PG"];
      
      categories.forEach(cat => {
        const option = new Option(cat, cat);
        if (cat === "{{ $course->category }}") option.selected = true;
        categoryDropdown.add(option);
      });
    });

    select.dispatchEvent(new Event('change'));
  });

  // Prevent negative values
  document.querySelectorAll('input[type="number"]').forEach(input => {
    input.addEventListener('input', function () {
      if (this.value < 0) {
        this.value = 0;
        alert('Negative values are not allowed!');
      }
    });
  });

  // Calculate total
  function calculateTotal() {
    const total = Array.from(document.querySelectorAll('.seat-input'))
      .reduce((sum, input) => sum + (parseInt(input.value) || 0), 0);
    document.getElementById('total').value = total;
  }

  document.querySelectorAll('.seat-input').forEach(input => {
    input.addEventListener('input', calculateTotal);
  });
  
  calculateTotal();
</script>
@endsection
