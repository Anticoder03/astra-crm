@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Edit Policy</h1>

    <form action="{{ route('policies.update', $policy->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer</label>
            <select name="customer_id" id="customer_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $policy->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }} ({{ $customer->phone }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="policy_name" class="block text-sm font-medium text-gray-700">Policy Name</label>
            <input type="text" name="policy_name" id="policy_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $policy->policy_name }}" required>
        </div>

        <div class="mb-4">
            <label for="policy_number" class="block text-sm font-medium text-gray-700">Policy Number</label>
            <input type="text" name="policy_number" id="policy_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $policy->policy_number }}" required>
        </div>

        <div class="mb-4">
            <label for="sum_assured" class="block text-sm font-medium text-gray-700">Sum Assured</label>
            <input type="number" step="0.01" name="sum_assured" id="sum_assured" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $policy->sum_assured }}" required>
        </div>

        <div class="mb-4">
            <label for="premium_amount" class="block text-sm font-medium text-gray-700">Premium Amount</label>
            <input type="number" step="0.01" name="premium_amount" id="premium_amount" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $policy->premium_amount }}" required>
        </div>

        <div class="mb-4">
            <label for="premium_type" class="block text-sm font-medium text-gray-700">Premium Type</label>
            <select name="premium_type" id="premium_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="Monthly" {{ $policy->premium_type == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                <option value="Quarterly" {{ $policy->premium_type == 'Quarterly' ? 'selected' : '' }}>Quarterly</option>
                <option value="Yearly" {{ $policy->premium_type == 'Yearly' ? 'selected' : '' }}>Yearly</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $policy->start_date }}" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="date" name="end_date" id="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $policy->end_date }}" required>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="Active" {{ $policy->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Matured" {{ $policy->status == 'Matured' ? 'selected' : '' }}>Matured</option>
                <option value="Cancelled" {{ $policy->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Policy</button>
        </div>
    </form>
</div>
@endsection
