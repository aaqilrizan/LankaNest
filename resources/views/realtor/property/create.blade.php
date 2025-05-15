@extends('layouts.realtor')

@section('title', 'Property Create')

@section('content')

    <div class="container mx-auto py-16">
        <h1 class="text-4xl font-bold text-center mb-8">Create New Property</h1>
        <div class="bg-white shadow-lg rounded-lg p-8">
            <form action="{{ url('/realtor/properties/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Property Title</label>
                    <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2"></textarea>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 font-bold mb-2">Price</label>
                    <input type="number" id="price" name="price" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-gray-700 font-bold mb-2">Location</label>
                    <input type="text" id="location" name="location" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">Property Image</label>
                    <input type="file" id="image" name="image" multiple accept=".jpg,.jpeg,.png,.webp,.svg" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="type" class="block text-gray-700 font-bold mb-2">Property Type</label>
                    <select id="type" name="type" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                        <option value="house">House</option>
                        <option value="apartment">Apartment</option>
                        <option value="commercial">Commercial</option>
                        <option value="land">Land</option>
                    </select>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Create Property</button>
            </form>
        </div>
    </div>


@endsection
