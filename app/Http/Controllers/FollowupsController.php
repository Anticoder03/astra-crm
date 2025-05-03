<?php

namespace App\Http\Controllers;

use App\Models\Followup;
use App\Models\Customer;
use App\Models\Followups;
use Illuminate\Http\Request;

class FollowupsController extends Controller
{
    // Display a listing of the followups
    public function index()
    {
        $followups = Followups::with('customer')->get(); // Get all followups with customer data
        return view('followups.index', compact('followups'));
    }

    // Show the form for creating a new followup
    public function create()
    {
        $customers = Customer::all(); // Get all customers
        return view('followups.create', compact('customers'));
    }

    // Store a newly created followup in the database
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'followup_date' => 'required|date',
            'remarks' => 'required|string',
            'status' => 'required|in:Pending,Completed',
        ]);

        // Create the followup
        Followups::create($request->all());

        // Redirect to the followups index with a success message
        return redirect()->route('followups.index')->with('success', 'Follow-up created successfully!');
    }

    // Display the specified followup
    public function show($id)
    {
        $followup = Followups::findOrFail($id);
        return view('followups.show', compact('followup'));
    }

    // Show the form for editing the specified followup
    public function edit($id)
    {
        $followup = Followups::findOrFail($id);
        $customers = Customer::all(); // Get all customers
        return view('followups.edit', compact('followup', 'customers'));
    }

    // Update the specified followup in the database
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'followup_date' => 'required|date',
            'remarks' => 'required|string',
            'status' => 'required|in:Pending,Completed',
        ]);

        $followup = Followups::findOrFail($id);
        $followup->update($request->all());

        // Redirect to the followups index with a success message
        return redirect()->route('followups.index')->with('success', 'Follow-up updated successfully!');
    }

    // Remove the specified followup from the database
    public function destroy($id)
    {
        $followup = Followups::findOrFail($id);
        $followup->delete();

        // Redirect to the followups index with a success message
        return redirect()->route('followups.index')->with('success', 'Follow-up deleted successfully!');
    }
}
