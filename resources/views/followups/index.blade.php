@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Follow-up List</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-700 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('followups.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create Follow-up</a>

    <table class="min-w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Customer</th>
                <th class="px-4 py-2 border">Follow-up Date</th>
                <th class="px-4 py-2 border">Remarks</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($followups as $followup)
                <tr>
                    <td class="px-4 py-2 border">{{ $followup->customer->name }}</td>
                    <td class="px-4 py-2 border">{{ $followup->followup_date }}</td>
                    <td class="px-4 py-2 border">{{ $followup->remarks }}</td>
                    <td class="px-4 py-2 border 
                    @if($followup->status === 'Pending') 
                        bg-yellow-200 
                    @elseif($followup->status === 'Completed') 
                        bg-green-200 
                    @endif">
                    {{ $followup->status }}
                </td>
                
                    <td class="px-4 py-2 border">
                        <a href="{{ route('followups.show', $followup->id) }}" class="text-blue-600">View</a> |
                        <a href="{{ route('followups.edit', $followup->id) }}" class="text-blue-600">Edit</a> |
                        <form method="POST" action="{{ route('followups.destroy', $followup->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
