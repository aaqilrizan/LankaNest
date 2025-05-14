@extends('layouts.realtor')

@section('title', 'Realtor Dashboard')

@section('content')

    <div class="relative bg-cover bg-center h-screen" style="background-image: url('{{ asset('images/realtor_hero.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto h-full flex flex-col items-center justify-center text-center relative z-10">
            <h1 class="text-white text-5xl font-bold">Welcome, {{ session('realtor.fname') }}!</h1>
            <p class="text-white text-2xl mt-4">"Empowering Realtors to Build Dreams, One Property at a Time."</p>
        </div>
    </div>

    <div class="py-16 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8">What You Can Do</h2>
            <div class="flex flex-wrap justify-center space-x-8">
                <a href="{{ url('/realtor/properties/create') }}" class="w-64 bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <img src="{{ asset('images/create_properties_icon.png') }}" alt="Create Properties" class="w-16 h-16 mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Create Properties</h3>
                    <p class="text-gray-600">Add new properties to the platform for clients to explore.</p>
                </a>

                <a href="{{ url('/realtor/check-bookings') }}" class="w-64 bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <img src="{{ asset('images/check_bookings_icon.png') }}" alt="Check Bookings" class="w-16 h-16 mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Check Bookings</h3>
                    <p class="text-gray-600">View and manage property bookings made by clients.</p>
                </a>

                <a href="{{ url('/realtor/check-visits') }}" class="w-64 bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                    <img src="{{ asset('images/check_visits_icon.png') }}" alt="Check Visits" class="w-16 h-16 mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Check Visits</h3>
                    <p class="text-gray-600">Track and manage scheduled property visits.</p>
                </a>
            </div>
        </div>
    </div>


@endsection
