@extends('layouts.customer')

@section('title', 'Book Property Visit')

@section('content')

    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-3xl font-bold mb-4">Book a Visit for {{ $property->property_name }}</h2>
            <img src="{{ asset('storage/'.$property->image_path) }}" alt="{{ $property->property_name }}" class="w-full h-64 object-cover mb-4">
            <p class="text-gray-700 mb-4">Location: {{ $property->location }}</p>
            <p class="text-gray-700 mb-4">Price: LKR. {{ number_format($property->price, 2) }}</p>
            <p class="text-gray-700 mb-4">Description: {{ $property->description }}</p>
            <p class="text-gray-700 mb-4">Property Type: {{ $property->property_type }}</p>

            <h2 class="text-2xl font-bold text-center mt-8 mb-4">Existing Time Slots</h2>
            <div class="bg-white shadow-lg rounded-lg p-8">
                <table class="min-w-full bg-white">
                    <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Date</th>
                        <th class="py-2 px-4 border-b">Start time</th>
                        <th class="py-2 px-4 border-b">End time</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($timeslots as $timeSlot)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $timeSlot->date }}</td>
                            <td class="py-2 px-4 border-b">{{ $timeSlot->start_time }}</td>
                            <td class="py-2 px-4 border-b">{{ $timeSlot->end_time }}</td>
                            <td class="py-2 px-4 border-b">
                                <form action="{{ url('/customer/timeslot/book/' . $property->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="time_slot_id" value="{{ $timeSlot->id }}">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Book</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

