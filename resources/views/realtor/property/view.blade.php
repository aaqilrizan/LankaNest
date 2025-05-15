@extends('layouts.realtor')

@section('title', 'Property Create')

@section('content')


    <!-- List all of the Property -->
    <div class="container mx-auto py-16">
        <h1 class="text-4xl font-bold text-center mb-8">My Properties</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($properties as $property)
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <img src="{{ asset('storage/' . $property->image_path) }}" alt="{{ $property->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h2 class="text-xl font-bold mb-2">{{ $property->title }}</h2>
                    <p class="text-gray-700 mb-2"><strong>Price:</strong> LKR.{{ $property->price }} </p>
                    <p class="text-gray-700 mb-2"><strong>Location:</strong> {{ $property->location }}</p>
                    <p class="text-gray-700 mb-2"><strong>Type:</strong> {{ $property->type }}</p>
                    <!--Add booking time, Edit and Delete buttons -->
                    <div class="flex justify-evenly mt-4">
                        <a href="{{ url('/realtor/properties/timeSlots/' . $property->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Time Slots</a>
                        <a href="{{ url('/realtor/properties/edit/' . $property->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Edit</a>
                        <form action="{{ url('/realtor/properties/delete/' . $property->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

@endsection
