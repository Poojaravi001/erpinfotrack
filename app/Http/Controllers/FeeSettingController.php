<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeeSetting;
use App\Models\FeeItem;
use Illuminate\Support\Facades\DB;
use App\Models\Course;


class FeeSettingController extends Controller
{
    public function index()
    {
        $feeSettings = FeeSetting::with('course', 'feeItems')->get();
        return view('feesettings.index', compact('feeSettings'));
    }
    

    public function create(Request $request)
    {
        $courses = Course::all(); // Fetch all courses
        $academicYears = Course::select('academic_year')->distinct()->pluck('academic_year'); // Fetch distinct academic years
        return view('feesettings.create', compact('courses', 'academicYears')); // Pass data to the view
    }
    

    public function store(Request $request)
    {

        $request->validate([
            'academic_year' => 'required',
            'category' => 'required',
            'shift' => 'required',
            'medium' => 'required',
            'course_id' => 'required|exists:courses,id',

            'semester' => 'required|integer',
            'grandTotal' => 'required|numeric',
            'fee_type' => 'required|array',
            'amount' => 'required|array',
            'fee_type.*' => 'required|string',
            'amount.*' => 'required|numeric',

        ]);
    
        DB::transaction(function () use ($request) {
            $feeSetting = FeeSetting::create([
                'academic_year' => $request->academic_year,
                'category' => $request->category,
                'shift' => $request->shift,
                'medium' => $request->medium,
                'course_id' => $request->course_id, // Store course_id, not course_name
                'semester' => $request->semester,
                'grandTotal' => $request->grandTotal,
            ]);
            
    
            foreach ($request->fee_type as $index => $feeType) {
                FeeItem::create([
                    'fee_setting_id' => $feeSetting->id,
                    'fee_type' => $feeType,
                    'amount' => $request->amount[$index],
                ]);
            }
        });
    
        return redirect()->route('feesettings.index')->with('success', 'Fee Settings saved successfully!');
    
    }
    

    public function update(Request $request, $id)
    {

        $request->validate([
            'academic_year' => 'required|string|max:9',
            'category' => 'required|string',
            'shift' => 'required|string',
            'medium' => 'required|string',
            'course_id' => 'required|exists:courses,id', // Ensure correct course_id
            'semester' => 'required|string',
            'fee_type' => 'required|array',
            'fee_type.*' => 'required|string',
            'amount' => 'required|array',
            'amount.*' => 'required|numeric|min:0',
        ]);
    
        DB::beginTransaction();
    
        try {
            // Fetch the existing FeeSetting record
            $feeSetting = FeeSetting::findOrFail($id);
    
            // Update FeeSetting details
            $feeSetting->update([
                'academic_year' => $request->academic_year,
                'category' => $request->category,
                'shift' => $request->shift,
                'medium' => $request->medium,
                'course_id' => $request->course_id,
                'semester' => $request->semester,
                'grand_total' => array_sum($request->amount),
            ]);
    
            // Update or create FeeItems
            foreach ($request->fee_type as $index => $feeType) {
                $amount = $request->amount[$index];
    
                // Find an existing FeeItem
                $feeItem = FeeItem::where('fee_setting_id', $feeSetting->id)
                    ->where('fee_type', $feeType)
                    ->first();
    
                if ($feeItem) {
                    // If the FeeItem exists, update it
                    $feeItem->update(['amount' => $amount]);
                } else {
                    // If it doesn't exist, create a new one
                    FeeItem::create([
                        'fee_setting_id' => $feeSetting->id,
                        'fee_type' => $feeType,
                        'amount' => $amount,
                    ]);
                }
            }
    
            DB::commit();
    
            return redirect()->route('feesettings.index')->with('success', 'Fee Settings updated successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error updating Fee Settings. Please try again.');
        }
    }
    

    public function edit($id)
    {
        $feeSetting = FeeSetting::with('feeItems')->findOrFail($id);
        $courses = Course::all();
        return view('feesettings.edit', compact('feeSetting', 'courses'));
    }

    public function show($id)
    {
        $feeSetting = FeeSetting::with('feeItems')->findOrFail($id);
        return view('feesettings.show', compact('feeSetting'));
    }

    public function destroy($id)
    {
        $feeSetting = FeeSetting::findOrFail($id);
        DB::beginTransaction();

        try {
            $feeSetting->feeItems()->delete();
            $feeSetting->delete();
            DB::commit();
            return redirect()->route('feesettings.index')->with('success', 'Fee Setting deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error deleting Fee Setting.');
        }
    }
    
    public function getFeeAmount($semester)
    {
        $fee = FeeItem::where('semester', $semester)->first();
        return response()->json(['amount' => $fee ? $fee->amount : 0]);
    }

 
// Fetch Categories Based on Academic Year
public function getCourseData($academicYear)
{
    $courses = Course::where('academic_year', $academicYear)->get();

    if ($courses->isEmpty()) {
        return response()->json(['error' => 'No data found'], 404);
    }

    $categories = $courses->pluck('category')->unique()->values();

    return response()->json([
        'categories' => $categories
    ]);
}

// Fetch Shift & Medium Based on Category
public function getCourseFilters($academicYear, $category)
{
    $courses = Course::where('academic_year', $academicYear)
                     ->where('category', $category)
                     ->get();

    if ($courses->isEmpty()) {
        return response()->json(['error' => 'No data found'], 404);
    }

    $shifts = $courses->pluck('shift')->unique()->values();
    $mediums = $courses->pluck('medium')->unique()->values();

    return response()->json([
        'shifts' => $shifts,
        'mediums' => $mediums
    ]);
}

// Fetch Courses Based on Shift & Medium
public function getFilteredCourses($academicYear, $category, $shift, $medium)
{
    $courses = Course::where('academic_year', $academicYear)
                     ->where('category', $category)
                     ->where('shift', $shift)
                     ->where('medium', $medium)
                     ->get(['id', 'name']);

    return response()->json(['courses' => $courses]);
}











}

