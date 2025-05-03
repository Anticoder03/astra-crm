@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-4">Investment Details</h1>

    <div class="mb-2"><strong>Customer:</strong> {{ $investment->customer->name }}</div>
    <div class="mb-2"><strong>Fund Name:</strong> {{ $investment->fund_name }}</div>
    <div class="mb-2"><strong>Investment Type:</strong> {{ $investment->investment_type }}</div>
    <div class="mb-2"><strong>Amount:</strong> {{ $investment->amount }}</div>
    <div class="mb-2"><strong>Start Date:</strong> {{ $investment->start_date }}</div>
    @if ($investment->investment_type == 'SIP')
        <div class="mb-2"><strong>Tenure Months:</strong> {{ $investment->tenure_months }}</div>
    @endif
    <div class="mb-2"><strong>Status:</strong> {{ $investment->status }}</div>

    <div class="mt-4">
        <a href="{{ route('investments.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
            Back
        </a>
    </div>
</div>
@endsection
