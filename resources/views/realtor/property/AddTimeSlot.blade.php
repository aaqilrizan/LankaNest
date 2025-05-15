@extends('layouts.realtor')

@section('title', 'Property Time Slots')

@section('content')
    <!-- Add Time Slot -->
    <div class="container mx-auto py-16">
        <h1 class="text-4xl font-bold text-center mb-8">Add Time Slot</h1>
        <div class="bg-white shadow-lg rounded-lg p-8">
            <form action="{{ url('/realtor/properties/storeTimeSlot/' . $property->id) }}" method="POST">
                @csrf
                <div class="flex justify-evenly">
                    <div class="mb-4 w-1/4">
                        <label for="date" class="block text-gray-700 font-bold mb-2">Date</label>
                        <input type="date" id="date" name="date" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <!-- Start Time -->
                    <div class="mb-4 w-1/4">
                        <label for="start_time" class="block text-gray-700 font-bold mb-2">Start Time</label>
                        <input type="time" id="start_time" name="start_time" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <!-- End Time -->
                    <div class="mb-4 w-1/4">
                        <label for="end_time" class="block text-gray-700 font-bold mb-2">End Time</label>
                        <input type="time" id="end_time" name="end_time" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 w-full">Add Time Slot</button>
            </form>
        </div>
        @if($timeSlots->count() > 0)
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
                    @foreach($timeSlots as $timeSlot)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $timeSlot->date }}</td>
                            <td class="py-2 px-4 border-b">{{ $timeSlot->start_time }}</td>
                            <td class="py-2 px-4 border-b">{{ $timeSlot->end_time }}</td>
                            <td class="py-2 px-4 border-b">
                                <form action="{{ url('/realtor/properties/deleteTimeSlot/' . $timeSlot->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
