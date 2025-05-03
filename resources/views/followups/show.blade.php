@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Follow-up Details</h1>

    <div class="mb-4">
        <strong>Customer:</strong> {{ $followup->customer->name }}
    </div>

    <div class="mb-4">
        <strong>Follow-up Date:</strong> {{ $followup->followup_date }}
    </div>

    <div class="mb-4">
        <strong>Remarks:</strong> {{ $followup->remarks }}
    </div>

    <div class="mb-4">
        <strong>Status:</strong> {{ $followup->status }}
    </div>

    <a href="{{ route('followups.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back to List</a>
</div>
@endsection
