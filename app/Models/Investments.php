<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investments extends Model
{
    use HasFactory;

    protected $table = 'investments';

    protected $fillable = [
        'customer_id',
        'fund_name',
        'investment_type',
        'amount',
        'start_date',
        'tenure_months',
        'status',
    ];

    /**
     * Get the customer that owns the investment.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
