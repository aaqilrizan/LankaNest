@extends('layouts.customer')

@section('title', 'Home')

@section('content')
    <div class="relative bg-cover bg-center h-screen" style="background-image: url('{{ asset('images/customer_hero.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto h-full flex flex-col items-center justify-center text-center relative z-10">
            <h1 class="text-white text-8xl font-meow">Welcome to LankaNest</h1>
            <p class="text-white text-2xl mt-4">"Find Your Dream Home with Us"</p>
        </div>
    </div>

    <!-- Top Properties Section -->
    <div class="py-16 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-8">Featured Properties</h2>
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
