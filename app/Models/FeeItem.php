<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class FeeItem extends Model
{
    protected $table = 'fee_item';  // Ensure it matches the table name

    protected $fillable = [
        'fee_setting_id',
        'fee_type',
        'amount'
    ];

    // Relationship: Each FeeItem belongs to one FeeSetting
    public function feeSetting()
    {
        return $this->belongsTo(FeeSetting::class, 'fee_setting_id');
    }
}


    // Relationship: Each FeeItem belongs to one FeeSetting
    // public function feeSetting()
    // {
    //     return $this->belongsTo(FeeSetting::class, 'fee_setting_id');
    // }