@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">

    <h1 class="text-2xl font-bold mb-4">CRM Dashboard</h1>

    <form method="GET" action="{{ route('dashboard.index') }}" class="mb-6">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Search by Customer Name, Phone, Investment Type..."
            class="border p-2 w-full md:w-1/3 rounded"
        >
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 text-left">Customer Name</th>
                    <th class="p-2 text-left">Phone</th>
                    <th class="p-2 text-left">Investments</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr class="border-t">
                        <td class="p-2">{{ $customer->name }}</td>
                        <td class="p-2">{{ $customer->phone }}</td>
                        <td class="p-2">
                            @if($customer->investments->isEmpty())
                                <span class="text-gray-400">No investments</span>
                            @else
                                <ul class="list-disc list-inside">
                                    @foreach ($customer->investments as $investment)
                                        <li>
                                            <strong>{{ $investment->fund_name }}</strong> - 
                                            {{ $investment->investment_type }} - 
                                            ₹{{ number_format($investment->amount, 2) }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center p-4 text-gray-500">No customers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
