@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Policies</h1>

    <form method="GET" action="{{ route('policies.index') }}" class="mb-6">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Search by Policy Name, Number, Customer Name..."
            class="border p-2 w-full md:w-1/3 rounded"
        >
    </form>

    <a href="{{ route('policies.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Policy</a>

    <table class="min-w-full table-auto">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 text-left">Policy Name</th>
                <th class="p-2 text-left">Customer Name</th>
                <th class="p-2 text-left">Premium Amount</th>
                <th class="p-2 text-left">Status</th>
                <th class="p-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($policies as $policy)
                <tr class="border-t">
                    <td class="p-2">{{ $policy->policy_name }}</td>
                    <td class="p-2">{{ $policy->customer->name }}</td>
                    <td class="p-2">{{ number_format($policy->premium_amount, 2) }}</td>
                    <td class="p-2">{{ $policy->status }}</td>
                    <td class="p-2">
                        <a href="{{ route('policies.show', $policy->id) }}" class="text-green-600">Show</a> | 
                        <a href="{{ route('policies.edit', $policy->id) }}" class="text-blue-600">Edit</a> | 
                        <form method="POST" action="{{ route('policies.destroy', $policy->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
