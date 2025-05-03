@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow rounded-lg">

    <h2 class="text-2xl font-bold mb-4">Analytics Dashboard</h2>

    {{-- Investment Analytics --}}
    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-2 text-blue-700">Monthly Investments</h3>
        <table class="w-full table-auto border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Month</th>
                    <th class="px-4 py-2 border">Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($investments as $inv)
                <tr>
                    <td class="px-4 py-2 border">{{ \Carbon\Carbon::create()->month($inv->month)->format('F') }}</td>
                    <td class="px-4 py-2 border">₹{{ number_format($inv->total, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Policy Analytics --}}
    <div class="mb-8">
        <h3 class="text-xl font-semibold mb-2 text-green-700">Monthly Policies</h3>
        <table class="w-full table-auto border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Month</th>
                    <th class="px-4 py-2 border">Number of Policies</th>
                </tr>
            </thead>
            <tbody>
                @foreach($policies as $policy)
                <tr>
                    <td class="px-4 py-2 border">{{ \Carbon\Carbon::create()->month($policy->month)->format('F') }}</td>
                    <td class="px-4 py-2 border">{{ $policy->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Followups Analytics --}}
    <div>
        <h3 class="text-xl font-semibold mb-2 text-yellow-700">Follow-ups Status</h3>
        <table class="w-full table-auto border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($followupsStatus as $status)
                <tr class="
                    @if($status->status === 'Pending') bg-yellow-100 
                    @elseif($status->status === 'Completed') bg-green-100 
                    @else bg-gray-100 
                    @endif">
                    <td class="px-4 py-2 border">{{ $status->status }}</td>
                    <td class="px-4 py-2 border">{{ $status->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
