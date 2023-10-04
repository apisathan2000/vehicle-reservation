<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        //
        // return response('Hello World !');
        return view('vehicles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        //
        $validated = $request->validate([
            // 'vnumber'=> 'required|string|max:8|ends_with:0-9|regex:/^[A-Z]/',

            'vnumber' => [
                'required',
                'string',
                'max:7',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^[A-Z]{2}[0-9]{4}$|^[A-Z]{3}[0-9]{4}$/', $value)) {
                        $fail('The ' . $attribute . ' is invalid.');
                    }
                },
            ],
        
            'mileage' => 'required|numeric',

            'date' => 'required|date',

            'time' => 'required|date_format:H:i',

            'location' => 'required|in:Ampara,Anuradhapura,Badulla,Batticaloa,Colombo,Galle,Gampaha,Hambantota,Jaffna,Kalutara,Kandy,Kegalle,Kilinochchi,Kurunegala,Mannar,Matale,Matara,Moneragala,Mullaitivu,Nuwara Eliya,Polonnaruwa,Puttalam,Ratnapura,Trincomalee,Vavuniya',

            'message' => 'required|string|max:255',

        ]);


        $request->user()->vehicles()->create($validated);
        

        return redirect(route('vehicles.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
