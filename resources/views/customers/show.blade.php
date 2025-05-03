@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Customer Details</h1>
        <a href="{{ route('customers.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Back to Customers List
        </a>
    </div>

    <div class="bg-white shadow rounded p-6">
        <div class="mb-4">
            <strong class="text-gray-700">Name:</strong>
            <p>{{ $customer->name }}</p>
        </div>

        <div class="mb-4">
            <strong class="text-gray-700">Email:</strong>
            <p>{{ $customer->email }}</p>
        </div>

        <div class="mb-4">
            <strong class="text-gray-700">Phone:</strong>
            <p>{{ $customer->phone }}</p>
        </div>

        <div class="mb-4">
            <strong class="text-gray-700">Address:</strong>
            <p>{{ $customer->address }}</p>
        </div>

        <div class="mb-4">
            <strong class="text-gray-700">Occupation:</strong>
            <p>{{ $customer->occupation }}</p>
        </div>

        <div class="mb-4">
            <strong class="text-gray-700">Date of Birth:</strong>
            <p>{{ \Carbon\Carbon::parse($customer->dob)->format('d-m-Y') }}</p>
        </div>
    </div>
@endsection
