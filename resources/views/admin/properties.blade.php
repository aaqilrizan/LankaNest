@extends('layouts.admin')

@section('title', 'Properties')

@section('content')

    <!-- Show the properties in the table -->
    <div class="py-16 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-8">Properties</h2>
{{--            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">--}}
{{--                @foreach ($properties as $property)--}}
{{--                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">--}}
{{--                        <img src="{{ asset('storage/'.$property->image_path) }}" alt="{{ $property['property_name'] }}" class="w-full h-48 object-cover">--}}
{{--                        <div class="p-4">--}}
{{--                            <h3 class="text-xl font-semibold mb-2">{{ $property->title }}</h3>--}}
{{--                            <p class="text-gray-600 mb-2">Location: {{ $property->location }}</p>--}}
{{--                            <p class="text-gray-600 mb-2">Price: LKR. {{ number_format($property->price) }}</p>--}}
{{--                            <p class="text-gray-600 mb-2">Description: {{ $property->description }}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
            <div class="bg-white shadow-lg rounded-lg p-8">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Image</th>
                        <th class="border border-gray-300 px-4 py-2">Property Name</th>
                        <th class="border border-gray-300 px-4 py-2">Description</th>
                        <th class="border border-gray-300 px-4 py-2">Location</th>
                        <th class="border border-gray-300 px-4 py-2">Price</th>
                        <th class="border border-gray-300 px-4 py-2">type</th>
                        <th class="border border-gray-300 px-4 py-2">Realtor</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($properties as $property)
                        <tr class="text-gray-700 hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $property->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <img src="{{ asset('storage/'.$property->image_path) }}" alt="{{ $property['property_name'] }}" class="w-16 h-16 object-cover">
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $property->title }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $property->description }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $property->location }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $property->price }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $property->type }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $property->user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ url('/admin/properties/delete/' . $property->id) }}" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this property?');">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
