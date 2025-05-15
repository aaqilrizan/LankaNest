@extends('layouts.customer')
@section('title', 'Property Details')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-3xl font-bold mb-4">{{ $property->property_name }}</h2>
            <img src="{{ asset('storage/'.$property->image_path) }}" alt="{{ $property->property_name }}" class="w-full h-64 object-cover mb-4">
            <p class="text-gray-700 mb-4">Location: {{ $property->location }}</p>
            <p class="text-gray-700 mb-4">Price: LKR. {{ number_format($property->price, 2) }}</p>
            <p class="text-gray-700 mb-4">Description: {{ $property->description }}</p>
            <p class="text-gray-700 mb-4">Property Type: {{ $property->property_type }}</p>
            <p class="text-gray-700 mb-4">Sold By: <strong>{{ $seller->name }} </strong> </p>
            <a href="{{ url('/properties/book/' . $property->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Book Appointment</a>
        </div>
    </div>
@endsection
