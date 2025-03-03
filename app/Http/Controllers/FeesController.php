<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Admission, Fees, Course, FeeSetting, FeeItem, };



class FeesController extends Controller
{
    public function index()
{
    // Retrieve admissions with related payments and calculate pending fees
    $admissions = Admission::with(['payments'])->get()->map(function ($admission) {
        $paidFee = $admission->payments->sum('amount'); // Sum of all payments
        // $admission->pending_fee = $admission->course_fee - $paidFee; // Calculate pending fee
        return $admission;
    });

    return view('fees.index', compact('admissions'));
}

    


    // public function create(Request $request)
    // {
    //     $admissions = Admission::all();  // Fetch all admissions
    // $courses = Course::all();  // Fetch all courses
    // $names = Admission::with('course')->get();  // Fetch all names
    //     $course_fee = 0;
    //     $courses = Course::all();
    //     $names = Admission::with('course')->get();
    
    //     if ($request->ajax()) {
    //         if ($request->filled(['mobile_no', 'course', 'name'])) {
    //             $admission = Admission::where('mobile_no', $request->mobile_no)
    //                 ->where('course_id', $request->course)
    //                 ->where('name', $request->name)
    //                 ->first();
    
    //             if ($admission) {
    //                 $course_fee = $admission->remaining_fees();
    //                 return response()->json([
    //                     'admission' => $admission,
    //                     'course_fee' => $course_fee,
    //                 ]);
    //             }
    //         }
    //         return response()->json(['error' => 'No admission found'], 404);
    //     }
    
    //     return view('fees.create', compact('admissions', 'course_fee', 'courses', 'names'));
    // }
    
    public function create(Request $request)
    {
        $admissions = Admission::all();  // Fetch all admissions
        $batchYear = $request->batch_year;
         // Fetch types based on batch year (modify according to your data structure)
        //  $types = Type::where('batch_year', $batchYear)->pluck('name')->toArray();
        $courses = Course::all(); // Fetch all courses
        $names = Admission::with('course')->get();  // Fetch all names with course details
        $semesters = FeeSetting::distinct()->pluck('semester');
        $academicYears = FeeSetting::distinct()->pluck('academic_year');
        $feeTypes = FeeItem::distinct()->pluck('fee_type');
        $feeItems = FeeItem::all();
    
        if ($request->ajax()) {
            if ($request->filled(['name', 'reg_no', 'course'])) {
                $admission = Admission::where('name', $request->name)
                    ->where('reg_no', $request->reg_no)
                    ->where('course_id', $request->course)
                    ->first();
    
                if ($admission) {
                    $course_fee = $admission->remaining_fees();
                    return response()->json([
                        'admission' => $admission,
                        'course_fee' => $course_fee,
                    ]);

                }
            }
            return response()->json(['error' => 'No admission found'], 404);
        }
    
        return view('fees.create', compact('admissions', 'courses', 'names', 'semesters', 'academicYears', 'feeTypes', 'feeItems'))->with('admission', null);

    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'admission_id' => 'required|exists:admission,id',
            'payment_date' => 'required|date',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'concession_type' => 'nullable|string',
            'concession_amt' => 'nullable|numeric|min:0',
        ]);
    
        if ($request->filled('concession_type') && $request->concession_type === "percentage") {
            $validated['concession_per'] = $validated['concession_amt'];
            $validated['concession_amt'] = ($validated['concession_amt'] / 100) * $request->course_fee;
        }
    
        $fee = Fees::create($validated);
        
        // Redirect to receipt page
        return redirect()->route('fees.receipt', ['id' => $fee->id]);
    }
    
    public function show($admission_id)
    {
        $admission = Admission::findOrFail($admission_id);
        return view('fees.show', compact('admission'));
    }

    public function edit(Fees $fees)
    {
        return view('fees.edit', compact('fees'));
    }

    public function update(Request $request, Fees $fees)
    {
        $validated = $request->validate([
            'payment_date' => 'required|date',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
        ]);

        $fees->update($validated);
        return redirect()->route('admission.index')->with('success', 'Fees updated successfully');
    }

    public function destroy(Fees $fees)
    {
        $fees->delete();
        return redirect()->route('admission.index')->with('success', 'Fees deleted successfully');
    }


    public function applyConcession($concessionType, $concessionAmt, $courseFee)
{
    if ($concessionType === "percentage") {
        return ($concessionAmt / 100) * $courseFee;
    }
    return $concessionAmt;
}


// public function generateReceipt(Request $request)
// {
//     $validated = $request->validate([
//         'admission_id' => 'required|exists:admissions,id',
//         'title' => 'required|string|max:255',
//         'amount' => 'required|numeric|min:0',
//         'payment_date' => 'required|date',
//         'payment_method' => 'required|string',
//         'remarks' => 'nullable|string|max:255',
//     ]);

//     $admission = Admission::findOrFail($validated['admission_id']);

//     $receiptDetails = [
//         'name' => $admission->name,
//         'admission_no' => $admission->id,
//         'course' => $admission->course->name ?? 'N/A',
//         'fees_title' => $validated['title'],
//         'amount' => $validated['amount'],
//         'payment_date' => $validated['payment_date'],
//         'payment_method' => $validated['payment_method'],
//         'remarks' => $validated['remarks'] ?? 'No remarks provided',
//     ];

//     return view('receipts.generate', compact('receiptDetails'));
// }



public function getBatchData(Request $request)
{
    $batchYear = $request->batch_year;

    // Fetch courses based on batch year
    $courses = Course::where('academic_year', $batchYear)->get();

    // Fetch distinct categories for the selected batch year
    $categories = Course::where('academic_year', $batchYear)
                         ->distinct()
                         ->pluck('category');

    return response()->json([
        'courses' => $courses,
        'categories' => $categories
    ]);
}



public function getFeeDetails($id)
{
    // Find FeeItem by ID
    $feeItem = FeeItem::find($id);

    if ($feeItem) {
        // Return fee amount as JSON response
        return response()->json([
            'amount' => $feeItem->amount,
        ]);
    }

    // Return default amount 0 if FeeItem is not found
    return response()->json(['amount' => 0]);
}

public function receipt($id)
{
    $fee = Fees::findOrFail($id);
    return view('fees.receipt', compact('fee'));
}

}
