<?php

namespace App\Http\Controllers;

use App\Models\Investments;
use App\Models\Customer;
use Illuminate\Http\Request;

class InvestmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $investments = Investments::with('customer')->get();
        return view('investments.index', compact('investments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all(); // Need customers to select for investment
        return view('investments.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate form input
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'fund_name' => 'required|string|max:255',
            'investment_type' => 'required|in:SIP,LumpSum',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'tenure_months' => 'nullable|integer|min:0',
            'status' => 'required|in:Active,Completed,Cancelled',
        ]);

        Investments::create($request->all());

        return redirect()->route('investments.index')->with('success', 'Investment created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Investments $investment)
    {
        $investment->load('customer');
        return view('investments.show', compact('investment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Investments $investment)
    {
        $customers = Customer::all();
        return view('investments.edit', compact('investment', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Investments $investment)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'fund_name' => 'required|string|max:255',
            'investment_type' => 'required|in:SIP,LumpSum',
            'amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'tenure_months' => 'nullable|integer|min:0',
            'status' => 'required|in:Active,Completed,Cancelled',
        ]);

        $investment->update($request->all());

        return redirect()->route('investments.index')->with('success', 'Investment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investments $investment)
    {
        $investment->delete();
        return redirect()->route('investments.index')->with('success', 'Investment deleted successfully!');
    }
}
