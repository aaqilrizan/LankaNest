@extends('layouts.realtor')

@section('title', 'Bookings')

@section('content')
    <div class="py-16 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-8">Bookings</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($bookings as $booking)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/'.$booking->property->image_path) }}" alt="{{ $booking['property_name'] }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">{{ $booking->property->title }}</h3>
                            <p class="text-gray-600 mb-2">Location: {{ $booking->property->location }}</p>
                            <p class="text-gray-600 mb-2">Price: LKR. {{ number_format($booking->property->price) }}</p>
                            <p class="text-gray-600 mb-2">Booking Date: {{ $booking->timeSlot->date }}</p>
                            <p class="text-gray-600 mb-2">Booking Time: {{ $booking->timeSlot->start_time }} - {{$booking->timeSlot->end_time}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
