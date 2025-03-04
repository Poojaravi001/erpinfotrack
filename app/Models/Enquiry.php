<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Enquiry extends Model
{
 
    public $table = 'enquiry';

    protected $fillable = ['name', 'type', 'dob', 'gender', 'mobile_no', 'alternate_mobile_no', 'email', 'school_name','school_group','address_line1', 'address_line2','taluk', 'city', 'state', 'father_name', 'father_no', 'father_occupation', 'relation_type', 'pincode', 'mother_name', 'mother_no', 'mother_occupation', 'mother_email', 'guardian_name', 'guardian_no', 'guardian_occupation', 'guardian_email', 'refereed_by', 'enrollment_date','counselled_by','enquired_by','media','physically_challenged','physical_challenge_percentage', 'interested_course', 'father_email', 'blood_group','batch_year', 'course_id','date'
];

	//  function course(){
	//  	return $this->hasOne('App\Models\Course', 'id', 'interested_course');
	// }

	function followup(){
		return $this->hasMany('App\Models\EnquiryFollowup', 'enquiry_id', 'id');
	}

	public function course()
	{
		return $this->belongsTo(Course::class, 'course_id', 'id');
	}

	public static function boot()
	{
		parent::boot();
		static::creating(function($model)
		{
			$user = Auth::user();
			$model->created_by = $user->id;
			$model->updated_by = $user->id;
		});
		static::updating(function($model)
		{
			$user = Auth::user();
			$model->updated_by = $user->id;
		});
	}
}