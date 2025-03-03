<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{

	public $table = 'courses';

	protected $guarded = [];

	function admissions()
	{
		return $this->hasMany('App\Models\Admission', 'course_id', 'id');
	}


	public function feeSettings()
{
    return $this->hasMany(FeeSetting::class, 'course_id');
}


	public static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			$user = Auth::user();
			$model->created_by = $user->id;
			$model->updated_by = $user->id;
		});
		static::updating(function ($model) {
			$user = Auth::user();
			$model->updated_by = $user->id;
		});
	}
}
