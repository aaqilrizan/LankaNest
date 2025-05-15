<?php

namespace App\Http\Controllers;

use App\Models\AppointmentBooking;
use App\Models\Property;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Fetch the top 5 expensive properties
        $properties = Property::orderBy('price', 'desc')->take(5)->get();

        return view('customer.home', [
            'properties' => $properties,
        ]);
    }

    public function properties()
    {
        // Fetch all properties
        $properties = Property::all();

        return view('customer.properties', [
            'properties' => $properties,
        ]);
    }

    public function show($id)
    {
        // Fetch a single property by ID
        $property = Property::findOrFail($id);

        //Fetch the seller
        $seller = $property->user;

        return view('customer.property.show', [
            'property' => $property,
            'seller' => $seller,
        ]);
    }

    public function book($id)
    {
        // Fetch a single property by ID
        $property = Property::findOrFail($id);

        //Fetch  the timeslots
        $timeslots = $property->timeSlots()->where('status', 'available')->get();

        //check if user have already booked a timeslot
        $user = auth()->user();
        $bookedTimeslot = $user->appointmentBookings()->where('property_id', $property->id)->first();

        if ($bookedTimeslot) {
            return redirect()->route('properties.show', $property->id)->with('error', 'You have already booked a timeslot for this property.');
        }

        return view('customer.property.book', [
            'property' => $property,
            'timeslots' => $timeslots,
        ]);
    }

    public function bookStore(Request $request, $id)
    {


        // Fetch the property
        $property = Property::findOrFail($id);

        // Check if the user has already booked a timeslot for this property
        $user = auth()->user();


        $timeslot = $property->timeSlots()->find($request->input('time_slot_id'));


        // Create a new appointment booking
        AppointmentBooking::create([
            'property_id' => $property->id,
            'user_id' => $user->id,
            'time_slot_id' => $timeslot->id,
            'status' => 'booked',
        ]);

        return redirect()->route('properties.show', $property->id)->with('success', 'Appointment booked successfully.');
    }
}
