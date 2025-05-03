@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Policy Details</h1>

    <div class="mb-4">
        <strong>Customer:</strong> {{ $policy->customer->name }} ({{ $policy->customer->phone }})
    </div>

    <div class="mb-4">
        <strong>Policy Name:</strong> {{ $policy->policy_name }}
    </div>

    <div class="mb-4">
        <strong>Policy Number:</strong> {{ $policy->policy_number }}
    </div>

    <div class="mb-4">
        <strong>Sum Assured:</strong> ₹{{ number_format($policy->sum_assured, 2) }}
    </div>

    <div class="mb-4">
        <strong>Premium Amount:</strong> ₹{{ number_format($policy->premium_amount, 2) }}
    </div>

    <div class="mb-4">
        <strong>Premium Type:</strong> {{ $policy->premium_type }}
    </div>

    <div class="mb-4">
        <strong>Start Date:</strong> {{ $policy->start_date }}
    </div>

    <div class="mb-4">
        <strong>End Date:</strong> {{ $policy->end_date }}
    </div>

    <div class="mb-4">
        <strong>Status:</strong> {{ $policy->status }}
    </div>

    <a href="{{ route('policies.edit', $policy->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit Policy</a>
</div>
@endsection
