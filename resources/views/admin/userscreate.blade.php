@extends('layouts.admin')

@section('title', 'Create User')

@section('content')

    <div class="container mx-auto py-16">
        <h1 class="text-4xl font-bold text-center mb-8">Create New User</h1>
        <div class="bg-white shadow-lg rounded-lg p-8">
            <form action="{{ url('/admin/users/store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Full Name</label>
                    <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 font-bold mb-2">Role</label>
                    <select id="role" name="role" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                        <option value="user">User</option>
                        <option value="realtor">Realtor</option>

                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create User</button>
                </div>
            </form>
        </div>
    </div>

@endsection
