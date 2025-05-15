@extends('layouts.customer')

@section('title', 'Home')

@section('content')

    <div class="py-16 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-8">Listed Properties</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($properties as $property)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/'.$property['image_path']) }}" alt="{{ $property['property_name'] }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">{{ $property['property_name'] }}</h3>
                            <p class="text-gray-600 mb-2">Location: {{ $property['location'] }}</p>
                            <p class="text-gray-600 mb-2">Price: ${{ number_format($property['price'], 2) }}</p>
                            <a href="{{ url('/properties/' . $property['id']) }}" class="text-blue-500 hover:underline">More Information</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
