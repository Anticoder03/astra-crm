@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Edit Follow-up</h1>

    <form action="{{ route('followups.update', $followup->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer</label>
            <select name="customer_id" id="customer_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2" required>
                <option value="" disabled>Select a customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $followup->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="followup_date" class="block text-sm font-medium text-gray-700">Follow-up Date</label>
            <input type="date" name="followup_date" id="followup_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2" value="{{ old('followup_date', $followup->followup_date) }}" required>
        </div>

        <div class="mb-4">
            <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
            <textarea name="remarks" id="remarks" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2" rows="4" required>{{ old('remarks', $followup->remarks) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2" required>
                <option value="Pending" {{ old('status', $followup->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ old('status', $followup->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Follow-up</button>
        </div>
    </form>
</div>
@endsection
