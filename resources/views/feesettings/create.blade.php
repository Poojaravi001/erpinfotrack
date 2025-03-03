@extends('layouts.app')

@section('title', 'Fee Settings')

@section('css')
    <link rel="stylesheet" href="{{ asset('bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10 mb-3">
                                    <h6 class="col-deep-purple">Fees Settings</h6>
                                </div>
                                <div class="col-12">
                                    <form action="{{ route('feesettings.store')  }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                        <div class="row">
                                            <div class="form-group col-lg-3">
                                                <label>Academic year</label>
                                                <select id="academicYear" name="academic_year" class="form-control form-control-sm" required>
                                                    <option value="">Select</option>
                                                    @foreach($academicYears as $year)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endforeach
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
                      
                                              <div class="form-group col-lg-3">
                                                <label>Semester</label>
                                                <select id="semester" name="semester" class="form-control form-control-sm" required>
                                                    <option value="">Select</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label>Course Name</label>
                                                <select name="course_id" class="form-control     form-control-sm" required>
                                                    <option value="">Select a Course</option>
                                                    @foreach($courses as $course)
                                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-12 form-group mt-0">
                                          <button type="button" class="btn btn-warning" id="addItemButton">
                                              <i class="fa fa-plus"></i> Add Item
                                          </button>
                                        </div>
                                        
                                        <div id="itemContainer"></div>
                                        
                                        <!-- Template for Cloning -->
                                        <template id="itemTemplate">
                                          <div class="col-md-12 row mb-3 itemRow">
                                              <div class="col-md-3 form-group">
                                                  <label class="col-blue">Fee Type</label>
                                                  <input type="text" name="fee_type[]" class="form-control form-control-sm" required />
                                              </div>
                                              <div class="col-md-2 form-group">
                                                  <label class="col-blue">Amount</label>
                                                  <input type="number" name="amount[]" class="form-control form-control-sm amountField" required />
                                              </div>
                                        
                                              <div class="col-md-1 form-group">
                                                  <button type="button" class="btn btn-danger mt-4 removeRow">
                                                      <i class="fa fa-times"></i>
                                                  </button>
                                              </div>
                                          </div>
                                        </template>
                                        
                                        <div class="col-md-12 row mt-4">
                                          <div class="col-md-3 form-group">
                                              <label class="col-blue font-weight-bold">Grand Total</label>
                                              <input type="number" id="grandTotal" name="grandTotal" class="form-control form-control-sm" readonly />
                                          </div>
                                        </div>
                                        
                                </div>
                                   <div class="form-group col-lg-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const academicYearDropdown = document.getElementById('academicYear');
    const categoryDropdown = document.getElementById('category');
    const shiftDropdown = document.querySelector('select[name="shift"]');
    const mediumDropdown = document.querySelector('select[name="medium"]');
    const courseDropdown = document.querySelector('select[name="course_id"]');

    // Function to populate dropdowns
    function populateDropdown(dropdown, options, placeholder = "Select") {
        dropdown.innerHTML = "";
        dropdown.appendChild(new Option(placeholder, "", true, true));
        options.forEach(opt => dropdown.appendChild(new Option(opt.text, opt.value)));
    }

    // Fetch Course Data Based on Selected Academic Year
    academicYearDropdown?.addEventListener("change", function () {
        const academicYear = this.value;

        if (academicYear) {
            fetch(`/get-courses/${academicYear}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    // Populate Category dropdown
                    populateDropdown(categoryDropdown, data.categories.map(cat => ({ value: cat, text: cat })), "Select Category");
                    
                    // Reset other dropdowns
                    populateDropdown(shiftDropdown, []);
                    populateDropdown(mediumDropdown, []);
                    populateDropdown(courseDropdown, []);
                })
                .catch(error => console.error('Error fetching categories:', error));
        } else {
            populateDropdown(categoryDropdown, []);
            populateDropdown(shiftDropdown, []);
            populateDropdown(mediumDropdown, []);
            populateDropdown(courseDropdown, []);
        }
    });

    // Fetch Shift & Medium Based on Selected Category
    categoryDropdown?.addEventListener("change", function () {
        const academicYear = academicYearDropdown.value;
        const category = this.value;

        if (category) {
            fetch(`/get-course-filters/${academicYear}/${category}`)
                .then(response => response.json())
                .then(data => {
                    populateDropdown(shiftDropdown, data.shifts.map(shift => ({ value: shift, text: shift })), "Select Shift");
                    populateDropdown(mediumDropdown, data.mediums.map(med => ({ value: med, text: med })), "Select Medium");
                    
                    // Reset Course Dropdown
                    populateDropdown(courseDropdown, []);
                })
                .catch(error => console.error('Error fetching shifts/mediums:', error));
        } else {
            populateDropdown(shiftDropdown, []);
            populateDropdown(mediumDropdown, []);
            populateDropdown(courseDropdown, []);
        }
    });

    // Fetch Courses Based on Selected Shift & Medium
    [shiftDropdown, mediumDropdown].forEach(dropdown => {
        dropdown?.addEventListener("change", function () {
            const academicYear = academicYearDropdown.value;
            const category = categoryDropdown.value;
            const shift = shiftDropdown.value;
            const medium = mediumDropdown.value;

            if (shift && medium) {
                fetch(`/get-courses/${academicYear}/${category}/${shift}/${medium}`)
                    .then(response => response.json())
                    .then(data => {
                        populateDropdown(courseDropdown, data.courses.map(course => ({ value: course.id, text: course.name })), "Select Course");
                    })
                    .catch(error => console.error('Error fetching courses:', error));
            } else {
                populateDropdown(courseDropdown, []);
            }
        });
    });
});

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const itemContainer = document.getElementById('itemContainer');
        const addItemButton = document.getElementById('addItemButton');
        const itemTemplate = document.getElementById('itemTemplate');
        
        const academicYearDropdown = document.getElementById('academicYear');
        const categoryDropdown = document.getElementById('category');
        const semesterDropdown = document.getElementById('semester');
        const courseDropdown = document.querySelector('select[name="course_id"]');
    
        /*** Add New Item ***/
        addItemButton?.addEventListener("click", function () {
            const newItem = itemTemplate.content.cloneNode(true);
            itemContainer.appendChild(newItem);
            updateGrandTotal();
        });
    
        /*** Event Delegation for Remove & Input Change ***/
        itemContainer?.addEventListener("click", function (e) {
            if (e.target.closest(".removeRow")) {
                e.target.closest(".itemRow").remove();
                updateGrandTotal();
            }
        });
    
        itemContainer?.addEventListener("input", function (e) {
            if (e.target.matches('input[name="amount[]"]')) {
                updateGrandTotal();
            }
        });
    
        function updateGrandTotal() {
            let grandTotal = [...document.querySelectorAll('input[name="amount[]"]')]
                .reduce((sum, field) => sum + (parseFloat(field.value) || 0), 0);
            document.getElementById("grandTotal").value = grandTotal.toFixed(2);
        }
    
        /*** Dropdown Management ***/
        academicYearDropdown?.addEventListener("change", updateCategoryOptions);
        categoryDropdown?.addEventListener("change", function () {
            updateSemesterOptions();
            updateCourseOptions();
        });
    
        function populateDropdown(dropdown, options, placeholder = "Select") {
            dropdown.innerHTML = "";
            dropdown.appendChild(new Option(placeholder, "", true, true));
            options.forEach(opt => dropdown.appendChild(new Option(opt.text, opt.value)));
        }
    
        function updateCategoryOptions() {
            const year = academicYearDropdown.value;
            const options = year === "2024-2026"
                ? [{ value: "PG", text: "Aided PG" }, { value: "SF_PG", text: "SF PG" }]
                : year === "2025-2027"
                ? [{ value: "UG", text: "Aided UG" }, { value: "SF_UG", text: "SF UG" }]
                : [];
    
            populateDropdown(categoryDropdown, options);
            updateSemesterOptions();
        }
    
        function updateSemesterOptions() {
            const category = categoryDropdown.value;
            const options = (category === "UG" || category === "SF_UG")
                ? Array.from({ length: 6 }, (_, i) => ({ value: i + 1, text: `Semester ${i + 1}` }))
                : (category === "PG" || category === "SF_PG")
                ? Array.from({ length: 4 }, (_, i) => ({ value: i + 1, text: `Semester ${i + 1}` }))
                : [];
    
            populateDropdown(semesterDropdown, options);
        }
    
        function updateCourseOptions() {
            const category = categoryDropdown.value;
            const courses = JSON.parse(document.getElementById("coursesData").textContent);
            const filteredCourses = courses.filter(course =>
                (category === "UG" || category === "SF_UG") ? course.type === "UG" :
                (category === "PG" || category === "SF_PG") ? course.type === "PG" : false
            ).map(course => ({ value: course.id, text: course.name }));
    
            populateDropdown(courseDropdown, filteredCourses, "Select a Course");
        }
    });
    </script>
    
 
    
  
@endsection