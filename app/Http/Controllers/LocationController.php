<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view('location.index', ['locations' => $locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'image | required | mimes:jpg,png,jpeg,gif,svg | max: 2048 | dimensions:min_width=100,min_height=100',
            'place' => 'required | min: 3 | max: 255',
            'country' => 'required | min: 3',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->place . '.' . $extension;
            $file->move('storage/locations/', $filename);

            if($validate){
                $location = new Location;
                $location->image = $filename;
                $location->place = $request->place;
                $location->country = $request->country;
                $location->country_code = $request->country_code;
                $location->airport = $request->airport;
                $location->airport_code = $request->airport_code;
                $location->days = $request->days;
                $location->nights = $request->nights;
                $location->package_name = $request->package_name;
                $location->package_style = $request->package_style;
                $location->description = $request->description;
                $location->price = $request->price;
                $location->status = $request->status;
                $location->edited_by = $request->edited_by;
                $location->save();
                $request->session()->flash('newLocation', $location->place);
                return redirect()->route('location.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::where('id', $id)->first();
        return view('location.deleteLocation', ['location'=>$location]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::where('id', $id)->first();
        return view('location.editLocation', ['location'=>$location]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'image' => 'image | required | mimes:jpg,png,jpeg,gif,svg | max: 2048 | dimensions:min_width=100,min_height=100',
            'place' => 'required | min: 3 | max: 255',
            'country' => 'required | min: 3',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->place . '.' . $extension;
            $file->move('storage/locations/', $filename);
        
            $sessionValue =  auth()->user()->name;
            if($sessionValue){
                if($validate){
                    Location::where('id', $id)
                            ->update(['image' => $filename,
                                    'place' => $request->place,
                                    'country' => $request->country,
                                    'country_code' => $request->country_code,
                                    'airport' => $request->airport,
                                    'airport_code' => $request->airport_code,
                                    'days' => $request->days,
                                    'nights' => $request->nights,
                                    'package_name' => $request->package_name,
                                    'package_style' => $request->package_style,
                                    'description' => $request->description,
                                    'price' => $request->price,
                                    'status' => $request->status,
                                    'edited_by' => $sessionValue,
                                    ]);
                    $request->session()->flash('updateLocation', $request->place);
                    return redirect()->route('location.index');
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $location = Location::where('id', $id)->delete();
        $request->session()->flash('deleteLocation', $location->place);
        return redirect()->route('location.index');
    }
}
