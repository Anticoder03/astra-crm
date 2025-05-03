<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query()->with('investments'); // Eager load investments

        // If search parameters are provided
        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhereHas('investments', function ($q2) use ($search) {
                      $q2->where('investment_type', 'like', "%{$search}%")
                         ->orWhere('fund_name', 'like', "%{$search}%");
                  });
            });
        }

        $customers = $query->get();

        return view('dashboard.index', compact('customers'));
    }
}
