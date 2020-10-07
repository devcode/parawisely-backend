<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Employee;
use App\Models\TravelPlace;
use App\Models\TypePlace;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id);
        $title = "Place";
        //
        $dataPlace = TravelPlace::with(['type', 'employee'])->get();
        $dataType = TypePlace::all();
        return view('page.backend.place.index', compact('title', 'dataPlace', 'dataType', 'dataAuth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $id_user = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id_user);
        $title = "Place";
        //
        $dataType = TypePlace::all();
        return view('page.backend.place.add', compact('title', 'dataAuth', 'dataType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_user = Auth::guard('employee')->id();
        $request->validate([
            'name_place' => 'required',
            'address' => 'required',
            'propinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'description' => 'required',
            'type_place' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        $image = $request->file('image');

        if ($image != null) {
            $image_name = $image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'backend/uploads/placeImage';
            $image->move($upload_path, $image_full_name);
            $image_url = $image_full_name;
            TravelPlace::create([
                'type_id' => $request->type_place,
                'creator_id' => $id_user,
                'name_place' => $request->name_place,
                'address' => $request->address,
                'provinsi_id' => $request->propinsi,
                'kabupaten_id' => $request->kabupaten,
                'kecamatan_id' => $request->kecamatan,
                'kelurahan_id' => $request->kelurahan,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'description' => $request->description,
                'image' => $image_url
            ]);
        }

        return redirect()->route('place');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TravelPlace $id)
    {
        $id_user = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id_user);
        $title = "Place";
        //
        return view('page.backend.place.show', compact('dataAuth', 'title', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TravelPlace $id)
    {
        $id_user = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id_user);
        $title = "Place";
        //
        $dataType = TypePlace::all();
        return view('page.backend.place.edit', compact('dataAuth', 'title', 'id', 'dataType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TravelPlace $id)
    {
        $id_user = Auth::guard('employee')->id();
        $request->validate([
            'name_place' => 'required',
            'address' => 'required',
            'description' => 'required',
            'type_place' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        $image = $request->file('image');

        if ($image != null) {
            $image_path = public_path("backend/uploads/placeImage/{$id->image}");
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            $image_name = $image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'backend/uploads/placeImage';
            $image->move($upload_path, $image_full_name);
            $image_url = $image_full_name;
            TravelPlace::where('id', $id->id)->update([
                'type_id' => $request->type_place,
                'creator_id' => $id_user,
                'name_place' => $request->name_place,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'description' => $request->description,
                'image' => $image_url
            ]);
        } else {
            TravelPlace::where('id', $id->id)->update([
                'type_id' => $request->type_place,
                'creator_id' => $id_user,
                'name_place' => $request->name_place,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'description' => $request->description,
            ]);
        }
        return redirect()->route('place');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = TravelPlace::find($id);
        $image_path = public_path("backend/uploads/placeImage/{$place->image}");
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        TravelPlace::destroy($id);
        return redirect()->route('place');
    }
}
