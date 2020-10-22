<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Employee;
use App\Models\TravelPlace;
use App\Models\TypePlace;
use App\Models\Island;
use Illuminate\Support\Str;

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
        $title = "Tempat Wisata";
        //
        $dataPlace = TravelPlace::with(['type', 'employee'])->get();
        $dataType = TypePlace::all();
        return view('page.backend.admin.place.index', compact('title', 'dataPlace', 'dataType', 'dataAuth'));
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
        $title = "Tempat Wisata";
        //
        $dataType = TypePlace::all();
        $dataIsland = Island::all();
        return view('page.backend.admin.place.add', compact('title', 'dataAuth', 'dataType', 'dataIsland'));
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
            'island' => 'required',
            'address' => 'required',
            'propinsi' => 'required',
            'kabupaten' => 'required',
            'description' => 'required',
            'type_place' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $image = $request->file('image');

        $place_name_new = $request->name_place;
        $place_name = TravelPlace::where('name_place', $place_name_new)->count();

        if ($place_name == 0) {
            if ($image != null) {
                $image_name = $image->getClientOriginalName();
                $image_full_name = time() . "-" . $image_name;
                $upload_path = 'backend/uploads/placeImage';
                $image->move($upload_path, $image_full_name);
                $image_url = $image_full_name;
                TravelPlace::create([
                    'type_id' => $request->type_place,
                    'creator_id' => $id_user,
                    'island_id' => $request->island,
                    'name_place' => $request->name_place,
                    'address' => $request->address,
                    'provinsi' => $request->propinsi,
                    'kabupaten' => $request->kabupaten,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'description' => $request->description,
                    'is_active' => 0,
                    'image' => $image_url,
                    'slug' => Str::slug($request->name_place)
                ]);
            }
            if (Auth::guard('employee')->user()->level_id == 1) {
                return redirect()->route('place')->with('success', 'disimpan');
            } else {
                return redirect()->route('mitra')->with('success', 'disimpan');
            }
        } else {
            if (Auth::guard('employee')->user()->level_id == 1) {
                return redirect()->route('place')->with('gagal', 'gagal');
            } else {
                return redirect()->route('mitra')->with('gagal', 'gagal');
            }
        }
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
        $title = "Tempat Wisata";
        //
        return view('page.backend.admin.place.show', compact('dataAuth', 'title', 'id'));
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
        $title = "Tempat Wisata";
        //
        $dataType = TypePlace::all();
        $dataIsland = Island::all();
        return view('page.backend.admin.place.edit', compact('dataAuth', 'title', 'id', 'dataType', 'dataIsland'));
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
            'island' => 'required',
            'address' => 'required',
            'propinsi' => 'required',
            'kabupaten' => 'required',
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
            $image_full_name = time() . "-" . $image_name;
            $upload_path = 'backend/uploads/placeImage';
            $image->move($upload_path, $image_full_name);
            $image_url = $image_full_name;
            TravelPlace::where('id', $id->id)->update([
                'type_id' => $request->type_place,
                'creator_id' => $id_user,
                'island_id' => $request->island,
                'name_place' => $request->name_place,
                'address' => $request->address,
                'provinsi' => $request->propinsi,
                'kabupaten' => $request->kabupaten,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'description' => $request->description,
                'image' => $image_url,
                'slug' => Str::slug($request->name_place)
            ]);
        } else {
            TravelPlace::where('id', $id->id)->update([
                'type_id' => $request->type_place,
                'creator_id' => $id_user,
                'island_id' => $request->island,
                'name_place' => $request->name_place,
                'address' => $request->address,
                'provinsi' => $request->propinsi,
                'kabupaten' => $request->kabupaten,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'description' => $request->description,
                'slug' => Str::slug($request->name_place)
            ]);
        }
        if (Auth::guard('employee')->user()->level_id == 1) {
            return redirect()->route('place')->with('success', 'diupdate');
        } else {
            return redirect()->route('mitra')->with('success', 'diupdate');
        }
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
        if (Auth::guard('employee')->user()->level_id == 1) {
            return redirect()->route('place')->with('success', 'dihapus');
        } else {
            return redirect()->route('mitra')->with('success', 'dihapus');
        }
    }

    public function change(Request $request)
    {
        $place_id = $request->tempat_id;
        $place = TravelPlace::find($place_id);
        $place->is_active = $request->status;
        $place->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
