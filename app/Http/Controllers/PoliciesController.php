<?php

namespace App\Http\Controllers;

use App\Models\Policies;
use App\Models\Customer;
use Illuminate\Http\Request;

class PoliciesController extends Controller
{
    // Display a listing of the policies
    public function index(Request $request)
    {
        $query = Policies::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('policy_name', 'like', "%{$search}%")
                  ->orWhere('policy_number', 'like', "%{$search}%")
                  ->orWhereHas('customer', function ($q2) use ($search) {
                      $q2->where('name', 'like', "%{$search}%")
                         ->orWhere('phone', 'like', "%{$search}%");
                  });
            });
        }

        $policies = $query->with('customer')->get(); // Eager load the associated customer

        return view('policies.index', compact('policies'));
    }

    // Show the form for creating a new policy
    public function create()
    {
        $customers = Customer::all(); // Pass all customers to the view
        return view('policies.create', compact('customers'));
    }

    // Store a newly created policy in the database
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'policy_name' => 'required|string|max:255',
            'policy_number' => 'required|string|unique:policies,policy_number',
            'sum_assured' => 'required|numeric',
            'premium_amount' => 'required|numeric',
            'premium_type' => 'required|in:Monthly,Quarterly,Yearly',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:Active,Matured,Cancelled',
        ]);

        Policies::create($request->all());

        return redirect()->route('policies.index')->with('success', 'Policy created successfully.');
    }

    // Display the specified policy
    public function show(Policies $policy)
    {
        return view('policies.show', compact('policy'));
    }

    // Show the form for editing the specified policy
    public function edit(Policies $policy)
    {
        $customers = Customer::all(); // Pass all customers to the view
        return view('policies.edit', compact('policy', 'customers'));
    }

    // Update the specified policy in storage
    public function update(Request $request, Policies $policy)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'policy_name' => 'required|string|max:255',
            'policy_number' => 'required|string|unique:policies,policy_number,' . $policy->id,
            'sum_assured' => 'required|numeric',
            'premium_amount' => 'required|numeric',
            'premium_type' => 'required|in:Monthly,Quarterly,Yearly',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:Active,Matured,Cancelled',
        ]);

        $policy->update($request->all());

        return redirect()->route('policies.index')->with('success', 'Policy updated successfully.');
    }

    // Remove the specified policy from storage
    public function destroy(Policies $policy)
    {
        $policy->delete();
        return redirect()->route('policies.index')->with('success', 'Policy deleted successfully.');
    }
}
