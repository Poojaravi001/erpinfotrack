@extends('layouts.app')
@section('title', 'Courses List')
@section('main')
<div class="main-content">
   <section class="section">
      <div class="section-body"> 
          <div class="row">
              <div class="col-12">
                  <div class="card card-primary">
                     <form method="post" id="myForm" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                        @csrf
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
                             <option value="Morning Shift">Morning Shift</option>
                             <option value="Afternoon Shift">Afternoon Shift</option>
                          </select>
                        </div>    

                        <div class="form-group col-lg-3">
                          <label>Medium</label>
                          <select name="medium" class="form-control form-control-sm" required>
                            <option value="">Select</option>
                            <option value="Tamil">Tamil</option>
                            <option value="English">English</option>
                          </select>
                        </div>

                        <div class="form-group col-lg-4">
                          <label>Course Name</label>
                          <input type="text" name="name" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group col-lg-1">
                          <label>FC</label>
                          <input type="number" name="FC" min="0" class="form-control form-control-sm" required id="FC">
                        </div>
                        
                        <div class="form-group col-lg-1">
                          <label>OC</label>
                          <input type="number" name="OC" min="0" class="form-control form-control-sm" required id="OC">
                        </div>
                        
                        <div class="form-group col-lg-1">
                          <label>BC</label>
                          <input type="number" name="BC" min="0" class="form-control form-control-sm" required id="BC">
                        </div>
                       
                        <div class="form-group col-lg-1">
                          <label>MBC</label>
                          <input type="number" name="MBC" min="0" class="form-control form-control-sm" required id="MBC">
                        </div>
                        
                        <div class="form-group col-lg-1">
                          <label>SC/ST</label>
                          <input type="number" name="SC_ST" min="0" class="form-control form-control-sm" required id="SC_ST">
                        </div>
                        
                        <div class="form-group col-lg-1">
                          <label>Other</label>
                          <input type="number" name="OTHER" min="0" class="form-control form-control-sm" required id="OTHER">
                        </div>
                        
                        <div class="form-group col-lg-2">
                          <label>Total</label>
                          <input type="number" name="total" min="0" class="form-control form-control-sm" required id="total" readonly>
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

<script>
  // Populate Academic Year dynamically
  const today = new Date();
const currentYear = today.getFullYear();
const startYear = currentYear; // Set startYear to current year dynamically

const options = [
  `${startYear}-${startYear + 3}`, // UG (3 years)
  `${startYear}-${startYear + 2}`  // PG (2 years)
];


  const select = document.getElementById("academicYear");
  options.forEach(year => select.innerHTML += `<option value="${year}">${year}</option>`);

  // Prevent negative numbers
  document.querySelectorAll('input[type="number"]').forEach(input => {
    input.addEventListener('input', () => {
      if (input.value < 0) {
        input.value = 0;
        alert('Negative values are not allowed!');
      }
    });
  });

  // Calculate total
  function calculateTotal() {
    const total = ['FC', 'OC', 'BC', 'MBC', 'SC_ST', 'OTHER']
      .map(id => parseInt(document.getElementById(id).value) || 0)
      .reduce((a, b) => a + b, 0);
    document.getElementById('total').value = total;
  }

  document.querySelectorAll('input[type="number"]').forEach(input => {
    input.addEventListener('input', calculateTotal);
  });

  calculateTotal();

  // Populate category based on academic year selection
 // Populate category based on academic year selection
// Populate category based on academic year selection
document.getElementById('academicYear').addEventListener('change', function () {
    const categoryDropdown = document.getElementById('category');
    categoryDropdown.innerHTML = '<option value="">Select</option>';

    const selectedYear = this.value;
    const years = selectedYear.split('-');
    const duration = parseInt(years[1]) - parseInt(years[0]);

    let categories = [];
    if (duration === 3) { 
        // UG courses (3 years)
        categories = [
          { value: 'Aided UG', text: 'Aided UG' }, 
          { value: 'SF UG', text: 'SF UG' }
        ];
    } else if (duration === 2) { 
        // PG courses (2 years)
        categories = [
          { value: 'Aided PG', text: 'Aided PG' }, 
          { value: 'SF PG', text: 'SF PG' }
        ];
    }

    categories.forEach(option => {
        const opt = document.createElement('option');
        opt.value = option.value;
        opt.text = option.text;
        categoryDropdown.appendChild(opt);
    });
});


</script>
@endsection
