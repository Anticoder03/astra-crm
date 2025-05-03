<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followups extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural form of the model name
    protected $table = 'followups';

    // The attributes that are mass assignable
    protected $fillable = [
        'customer_id',
        'followup_date',
        'remarks',
        'status',
    ];

    // Define the relationship with the Customer model
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
