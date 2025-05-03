@extends('layouts.layout2')

@section('title', $formData['title'])

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">{{ $formData['title'] }}</h2>

    <form action="#" method="POST">
        @csrf

        @foreach($formData['fields'] as $name => $field)
            <div class="mb-4">
                <label for="{{ $name }}" class="block text-gray-700 font-medium mb-2">
                    {{ $field['label'] }}
                </label>

                @if($field['type'] === 'select')
                    <select name="{{ $name }}" id="{{ $name }}" class="w-full border rounded px-3 py-2">
                        @foreach($field['options'] as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                @else
                    <input 
                        type="{{ $field['type'] }}" 
                        name="{{ $name }}" 
                        id="{{ $name }}"
                        class="w-full border rounded px-3 py-2"
                    />
                @endif
            </div>
        @endforeach

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Submit
        </button>
    </form>
</div>
@endsection
