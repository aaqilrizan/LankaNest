@extends('layouts.realtor')

@section('title', 'Property Edit')

@section('content')

    <!-- Edit Property -->
    <div class="container mx-auto py-16">
        <h1 class="text-4xl font-bold text-center mb-8">Edit Property</h1>
        <div class="bg-white shadow-lg rounded-lg p-8">
            <form action="{{ url('/realtor/properties/update/' . $property->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Property Title</label>
                    <input type="text" id="title" name="title" value="{{ $property->title }}" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2">{{ $property->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 font-bold mb-2">Price</label>
                    <input type="number" id="price" name="price" value="{{ $property->price }}" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-gray-700 font-bold mb-2">Location</label>
                    <input type="text" id="location" name="location" value="{{ $property->location }}" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">Property Image</label>
                    <input type="file" id="image" name="image[]" multiple accept=".jpg,.jpeg,.png,.webp,.svg" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                </div>
                <div class="mb-4 ">
                    <label for="type" class="block text-gray-700 font-bold mb-2">Property Type</label>
                    <select id="type" name="type" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                        <option value="house" {{ $property->type == 'house' ? 'selected' : '' }}>House</option>
                        <option value="apartment" {{ $property->type == 'apartment' ? 'selected' : '' }}>Apartment</option>
                        <option value="commercial" {{ $property->type == 'commercial' ? 'selected' : '' }}>Commercial</option>
                        <option value="land" {{ $property->type == 'land' ? 'selected' : '' }}>Land</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-bold mb-2">Property Status</label>
                    <select id="status" name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                        <option value="available" {{ $property->status == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="sold" {{ $property->status == 'sold' ? 'selected' : '' }}>Sold</option>
                        <option value="rented" {{ $property->status == 'rented' ? 'selected' : '' }}>Rented</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update Property</button>
            </form>
        </div>
    </div>

@endsection
