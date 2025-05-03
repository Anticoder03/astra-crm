@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-4">Add New Investment</h1>

    <form action="{{ route('investments.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Customer</label>
            <select name="customer_id" class="w-full border rounded px-3 py-2">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Fund Name</label>
            <input type="text" name="fund_name" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Investment Type</label>
            <select name="investment_type" class="w-full border rounded px-3 py-2" required>
                <option value="SIP">SIP</option>
                <option value="LumpSum">LumpSum</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Amount</label>
            <input type="number" step="0.01" name="amount" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Start Date</label>
            <input type="date" name="start_date" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tenure Months (only for SIP)</label>
            <input type="number" name="tenure_months" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2" required>
                <option value="Active">Active</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Save Investment
        </button>
    </form>
</div>
@endsection
