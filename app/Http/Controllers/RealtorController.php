<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RealtorController extends Controller
{
    public function index()
    {
        return view('realtor.dashboard');
    }

    public function create()
    {
        return view('realtor.property.create');
    }

    public function store(Request $request)
    {
        // Handle the property creation logic here
        // For example, save the property to the database

        return redirect()->route('realtor.dashboard')->with('success', 'Property created successfully.');
    }
}
