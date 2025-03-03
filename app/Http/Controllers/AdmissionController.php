<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Enquiry;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class AdmissionController extends Controller
{
    public function index(Request $request)
    {
        $admissions = Admission::all();
        $data = DB::select('SELECT count(a.id) as admission, b.name FROM `admission` a INNER JOIN courses b ON a.course_id = b.id GROUP BY a.course_id');
        $admissions = Admission::with('course')->get();
        return view('admission.index', compact('admissions', 'data'));
    }

    public function create(Request $request)
    {
        $courses = Course::all();
        $districts = DB::table('district_list')->get();
        $states = DB::table('district_list')->select('State')->distinct()->get();
        $enquiries = Enquiry::all();
        // $health_issues = Enquiry::groupBy('health_issues')->get();
        $blood_group = Enquiry::groupBy('blood_group')->get();
        // $document_type = Enquiry::groupBy('document_type')->get();
        $mobile_no = Enquiry::groupBy('mobile_no')->get();
    
        $academicYears = Course::select('academic_year')->distinct()->orderBy('academic_year', 'desc')->get();
        // $academicYears = DB::table('admission')->select('batch_year')->distinct()->get();
    
        return view('admission.create', compact('courses', 'districts', 'states', 'blood_group', 'mobile_no', 'academicYears', 'enquiries'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'mobile_no' => ['unique:admission,mobile_no', 'numeric'],
        ]);

        $data  = $request->except(['student_photo', 'documents', '_token', '_method']);
        if ($request->hasFile('student_photo')) {
            $student_photo = $request->file('student_photo')->store('admission', 'public');
            $data['student_photo'] = $student_photo;
        }
        if ($request->hasFile('documents')) {
            $documents = $request->file('documents')->store('admission/documents', 'public');
            $data['documents'] = $documents;
        }
        $enquiry = Admission::create($data);
        return to_route('admission.index');
    }

    function show(Request $request, Admission $admission)
    {
        return view('fees.create', compact('admission'));
    }

    // public function edit(Request $request, Enquiry $enquiry, $id)
    // {
        // $courses = Course::all(); 
        // $districts = DB::table('district_list')->get();
        // $states = DB::table('district_list')->select('State')->distinct()->get();

        // $health_issues = Enquiry::groupBy('health_issues')->get();
        // $blood_group = Enquiry::groupBy('blood_group')->get();
        // $document_type = Enquiry::groupBy('document_type')->get();

        // return view('enquiry.edit',compact('enquiry','courses','districts','states','health_issues','blood_group','document_type'));

        // $course = Course::findOrFail($id); // Fetch the course from the database
        // return view('admission.edit', compact('course')); // Pass $course to the view

    // }public function edit(Request $request, Enquiry $enquiry, $id)

   public function edit(Request $request, Enquiry $enquiry, $id)
   {
    $course = Course::findOrFail($id);
    return view('admission.edit', compact('course', 'id'));
}


    public function update(Request $request, Enquiry $enquiry)
    {
        // $data  = $request->except(['student_photo', 'documents', '_token', '_method']);
        // if($request->hasFile('student_photo')){
        //     $student_photo = $request->file('student_photo')->store('enquiry', 'public');
        //     $data['student_photo'] = $student_photo;
        // }
        // if($request->hasFile('documents')){
        //     $documents = $request->file('documents')->store('enquiry/documents', 'public');
        //     $data['documents'] = $documents;
        // }
        // $enquiry->update($data);
        // return to_route('enquiry.index');
    }

    // public function destroy(Request $request, Enquiry $enquiry)
    // {
    //     $enquiry->delete();
    //     return to_route('enquiry.index');
    // }

    // function enquiry(Request $request, $search, $value)
    // {
    //     $enquiry = Enquiry::where($search, $value)->first();
    //     if (!$enquiry)
    //         return response()->json(['message' => 'Enquiry not found!'], 404);
    //     return response()->json($enquiry, 200);
    // }

    public function getBatchData(Request $request)
    {
        $batchYear = $request->batch_year;
        $type = $request->type;

        // Fetch courses based on batch year and type/category
        $courses = Course::where('academic_year', $batchYear)
            ->where('category', $type)
            ->get();

        return response()->json([
            'courses' => $courses
        ]);
    }

    public function getCategories(Request $request)
    {
        $batchYear = $request->batch_year;

        // Fetch distinct categories for the selected batch year
        $categories = Course::where('academic_year', $batchYear)
            ->distinct()
            ->pluck('category');

        return response()->json([
            'categories' => $categories
        ]);
    }
}
