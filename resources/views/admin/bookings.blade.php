@extends('layouts.admin')

@section('title', 'Bookings')

@section('content')

    <!-- Show the bookings in the table -->
    <div class="py-16 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-8">Bookings</h2>
            <div class="bg-white shadow-lg rounded-lg p-8">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Property Name</th>
                        <th class="border border-gray-300 px-4 py-2">Booking Date</th>
                        <th class="border border-gray-300 px-4 py-2">Booking Time</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($bookings as $booking)
                        <tr class="text-gray-700 hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $booking->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $booking->title }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $booking->timeSlots[0]->date }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $booking->timeSlots[0]->start_time }} - {{ $booking->timeSlots[0]->end_time }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ url('/admin/bookings/delete/' . $booking->id) }}" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this booking?');">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
