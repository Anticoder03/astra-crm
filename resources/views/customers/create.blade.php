<!-- resources/views/customers/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-6">Add New Customer</h1>

    <!-- Show Validation Errors -->
    @if ($errors->any())
        <div class="mb-4">
            <ul class="bg-red-100 text-red-700 p-4 rounded">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('customers.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-semibold">Phone</label>
            <input type="text" name="phone" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-semibold">Address</label>
            <textarea name="address" class="w-full border rounded p-2" rows="3" required></textarea>
        </div>

        <div>
            <label class="block font-semibold">Occupation</label>
            <input type="text" name="occupation" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-semibold">Date of Birth</label>
            <input type="date" name="dob" class="w-full border rounded p-2" required>
        </div>

        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded">
                Save Customer
            </button>
        </div>
    </form>
</div>
@endsection
