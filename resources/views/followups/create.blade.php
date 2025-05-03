@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Create New Follow-up</h1>

    <form action="{{ route('followups.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer</label>
            <select name="customer_id" id="customer_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2" required>
                <option value="" disabled selected>Select a customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="followup_date" class="block text-sm font-medium text-gray-700">Follow-up Date</label>
            <input type="date" name="followup_date" id="followup_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2" value="{{ old('followup_date') }}" required>
        </div>

        <div class="mb-4">
            <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
            <textarea name="remarks" id="remarks" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2" rows="4" required>{{ old('remarks') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm py-2" required>
                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Follow-up</button>
        </div>
    </form>
</div>
@endsection
