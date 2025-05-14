@extends('layouts.admin') <!-- Assuming you have a base layout for admin -->

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mx-auto py-16">
    <h1 class="text-4xl font-bold text-center mb-8">User Management</h1>
    <div class="flex justify-end mb-4">
        <a href="{{ url('/admin/users/create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New User</a>
    </div>
    <div class="bg-white shadow-lg rounded-lg p-8">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Full Name</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Role</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="text-gray-700 hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $user->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $user->role }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="{{ url('/admin/users/edit/' . $user->id) }}" class="text-blue-500 hover:underline mr-4">Edit</a>
                            <a href="{{ url('/admin/users/delete/' . $user->id) }}" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
