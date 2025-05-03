@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Investment</h1>

    <form action="{{ route('investments.update', $investment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Customer</label>
            <select name="customer_id" class="w-full border rounded px-3 py-2">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $investment->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Fund Name</label>
            <input type="text" name="fund_name" value="{{ $investment->fund_name }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Investment Type</label>
            <select name="investment_type" class="w-full border rounded px-3 py-2" required>
                <option value="SIP" {{ $investment->investment_type == 'SIP' ? 'selected' : '' }}>SIP</option>
                <option value="LumpSum" {{ $investment->investment_type == 'LumpSum' ? 'selected' : '' }}>LumpSum</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Amount</label>
            <input type="number" step="0.01" name="amount" value="{{ $investment->amount }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Start Date</label>
            <input type="date" name="start_date" value="{{ $investment->start_date }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tenure Months</label>
            <input type="number" name="tenure_months" value="{{ $investment->tenure_months }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2" required>
                <option value="Active" {{ $investment->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Completed" {{ $investment->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ $investment->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update Investment
        </button>
    </form>
</div>
@endsection
