<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\User;

class AdminControlller extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users from the database
        return view('admin.dashboard', compact('users'));
    }

    public function create()
    {
        return view('admin.userscreate');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'User created successfully.');
    }

    public function properties()
    {
        // Fetch all properties from the database
        $properties = Property::all(); // Assuming you have a Property model
        //get the user who created the property
        foreach ($properties as $property) {
            $property->user = User::find($property->user_id);
        }

        return view('admin.properties', [
            'properties' => $properties,
        ]);
    }

    public function destroy($id)
    {
        // Find the property by ID and delete it
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('admin.properties.index')->with('success', 'Property deleted successfully.');
    }

    public function booking()
    {
        // Fetch all bookings from the database
        $bookings = Property::all(); // Assuming you have a Property model
        //get the user who created the property
        foreach ($bookings as $booking) {
            $booking->user = User::find($booking->user_id);
        }
        //get the timeslots
        foreach ($bookings as $booking) {
            $booking->timeSlots = $booking->timeSlots()->where('status', 'booked')->get();
        }

        return view('admin.bookings', [
            'bookings' => $bookings,
        ]);
    }

    public function destroyBooking($id)
    {
        // Find the booking by ID and delete it
        $booking = Property::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.booking.show')->with('success', 'Booking deleted successfully.');
    }
}
