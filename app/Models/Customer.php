<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Table name (optional if same as model name)
    protected $table = 'customers';

    // Fillable fields (for mass assignment)
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'occupation',
        'dob',
    ];

    /**
     * Get the investments for the customer.
     */
    public function investments()
    {
        return $this->hasMany(Investments::class, 'customer_id');
    }
}
