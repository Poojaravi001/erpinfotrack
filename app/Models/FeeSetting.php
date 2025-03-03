<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class FeeSetting extends Model
{
    protected $table = 'fee_setting';  // Ensure it matches the table name

    protected $fillable = [
        'academic_year', 
        'category', 
        'shift', 
        'medium', 
        'course_id', 
        'semester',
        'grandTotal'
    ];

    // Relationship: One FeeSetting has many FeeItems
    public function feeItems()
{
    return $this->hasMany(FeeItem::class, 'fee_setting_id');
}



public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}

    
    
    


}