<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policies extends Model
{
    use HasFactory;

    // Table name (optional if same as model name)
    protected $table = 'policies';

    // Fillable fields for mass assignment
    protected $fillable = [
        'customer_id',
        'policy_name',
        'policy_number',
        'sum_assured',
        'premium_amount',
        'premium_type',
        'start_date',
        'end_date',
        'status'
    ];

    // Define the relationship with the Customer model
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
