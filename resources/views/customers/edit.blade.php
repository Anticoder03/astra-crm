@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Edit Customer</h1>
    </div>

    <div class="bg-white shadow rounded p-6">
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700">Address</label>
                <textarea name="address" id="address" rows="3" class="w-full px-4 py-2 border rounded" required>{{ old('address', $customer->address) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="occupation" class="block text-gray-700">Occupation</label>
                <input type="text" name="occupation" id="occupation" value="{{ old('occupation', $customer->occupation) }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="dob" class="block text-gray-700">Date of Birth</label>
                <input type="date" name="dob" id="dob" value="{{ old('dob', $customer->dob) }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Update Customer</button>
        </form>
    </div>
@endsection
