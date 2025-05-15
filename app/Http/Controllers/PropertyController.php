<?php

namespace App\Http\Controllers;

use App\Models\AppointmentBooking;
use App\Models\Property;
use App\Models\PropertyTimeSlot;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('realtor.property.view', [
            'properties' => Property::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function create()
    {
        return view('realtor.property.create');
    }

    public function store(Request $request)
    {
        $authuserid = auth()->user()->id;


        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('properties', 'public');

        } else {
            $imagePath = null;
        }


        Property::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'location' => $request->input('location'),
            'image_path' => $imagePath,
            'type' => $request->input('type'),
            'user_id' => $authuserid,
        ]);

        return redirect()->route('realtor.dashboard')->with('success', 'Property created successfully.');




        return redirect()->route('realtor.dashboard')->with('success', 'Property created successfully.');
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('realtor.property.show', [
            'property' => $property,
        ]);
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('properties', 'public');
            $property->image_path = $imagePath;
        }

        $property->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'location' => $request->input('location'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('realtor.properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('realtor.properties.index')->with('success', 'Property deleted successfully.');
    }

    public function timeslots($id)
    {
        $property = Property::findOrFail($id);
        $timeSlots = $property->timeSlots()->get();

        return view('realtor.property.AddTimeSlot', [
            'property' => $property,
            'timeSlots' => $timeSlots,
        ]);
    }

    public function storeTimeSlot(Request $request, $id)
    {
        //get the start time and make interval of 1 hour till the end time
        $starttime = $request->input('start_time');
        $endtime = $request->input('end_time');

        $start = \Carbon\Carbon::createFromFormat('H:i', $starttime);
        $end = \Carbon\Carbon::createFromFormat('H:i', $endtime);
        $interval = \Carbon\CarbonInterval::hour(1);

        $period = \Carbon\CarbonPeriod::create($start, $interval, $end);

        // Loop through the period and create time slots
        foreach ($period as $date) {
            $timeSlots[] = [
                'property_id' => $id,
                'start_time' => $date->format('H:i'),
                'end_time' => $date->addHour()->format('H:i'),
                'date' => $request->input('date'),
            ];
        }
        // Store the time slots in the database
        foreach ($timeSlots as $timeSlot) {
            $property = Property::findOrFail($id);
            $property->timeSlots()->create($timeSlot);
        }

        return redirect()->route('realtor.properties.view', $id)->with('success', 'Time slots created successfully.');
    }

    public function deleteTimeSlot($id)
    {
        $timeSlot = PropertyTimeSlot::findOrFail($id);
        $timeSlot->delete();

        return redirect()->route('realtor.properties.view', $timeSlot->property_id)->with('success', 'Time slot deleted successfully.');
    }

    public function bookings()
    {
        $user = auth()->user();
        $properties = $user->properties()->pluck('id');
        $bookings = AppointmentBooking::whereIn('property_id', $properties)
            ->with(['property', 'user', 'timeSlot'])
            ->get();



        return view('realtor.bookings', [
            'bookings' => $bookings,
        ]);
    }
}
