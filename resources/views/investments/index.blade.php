@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Investments</h1>
    <a href="{{ route('investments.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Add New Investment
    </a>
</div>

<div class="bg-white shadow rounded p-4">
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">ID</th>
                <th class="p-2">Customer</th>
                <th class="p-2">Fund Name</th>
                <th class="p-2">Amount</th>
                <th class="p-2">Type</th>
                <th class="p-2">Status</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($investments as $investment)
                <tr class="border-t">
                    <td class="p-2">{{ $investment->id }}</td>
                    <td class="p-2">{{ $investment->customer->name }}</td>
                    <td class="p-2">{{ $investment->fund_name }}</td>
                    <td class="p-2">{{ $investment->amount }}</td>
                    <td class="p-2">{{ $investment->investment_type }}</td>
                    <td class="p-2">
                        @php
                            $statusClasses = [
                                'Completed' => 'text-green-600 font-semibold',
                                'Active' => 'text-blue-500 font-semibold',
                                'Cancelled' => 'text-red-500 font-semibold',
                            ];
                        @endphp
                        <span class="{{ $statusClasses[$investment->status] ?? 'text-gray-700' }}">
                            {{ $investment->status }}
                        </span>
                    </td>
                    <td class="p-2 space-x-2">
                        <a href="{{ route('investments.show', $investment->id) }}" class="text-green-600 hover:underline">View</a>
                        <a href="{{ route('investments.edit', $investment->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('investments.destroy', $investment->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="p-4 text-center text-gray-500">No investments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
