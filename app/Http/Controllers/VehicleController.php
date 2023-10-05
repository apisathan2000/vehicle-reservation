<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        //
        $user = Auth::user();
        $vehicles = $user->vehicles()
                        ->latest()
                        ->paginate(5);

        // return view('vehicles.index',compact('vehicles'))->with(request()->input('page'));
        return view('vehicles.index',compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        //
        $validated = $request->validate([
            // 'vnumber'=> 'required|string|max:8|ends_with:0-9|regex:/^[A-Z]/',

            'Vehicle_Number' => [
                'required',
                'string',
                'max:7',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^[A-Z]{2}[0-9]{4}$|^[A-Z]{3}[0-9]{4}$/', $value)) {
                        // $fail('The ' . $attribute . ' is invalid.');
                        return redirect(route('vehicles.index'))->with('failure','Check the Vehicle Number');
                    }
                },
            ],

            // 'Vehicle_Number'=> 'required|string',
        
            'Mileage' => 'required|numeric',

            'Reservation_Date' => 'required|date',

            'Reservation_Time' => 'required',

            'Location' => 'required|in:Ampara,Anuradhapura,Badulla,Batticaloa,Colombo,Galle,Gampaha,Hambantota,Jaffna,Kalutara,Kandy,Kegalle,Kilinochchi,Kurunegala,Mannar,Matale,Matara,Moneragala,Mullaitivu,Nuwara Eliya,Polonnaruwa,Puttalam,Ratnapura,Trincomalee,Vavuniya',

            'Message' => 'required|string|max:255',

        ]);

        

        $request->user()->vehicles()->create($validated);

        // dd($request->all());

        
        return redirect(route('vehicles.index'))->with('success','Reservation Made Successfully !');

    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle):View
    {
        //
        return view('vehicles.show');
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
