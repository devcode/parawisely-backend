<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Employee;
use App\Models\TypePlace;

class TypePlaceController extends Controller
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
        $title = "TypePlace";
        //
        $dataType = TypePlace::all();
        return view('page.backend.typePlace.index', compact('title', 'dataType', 'dataAuth'));
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
        $request->validate([
            'type_icon' => 'required|image|mimes:jpg,jpeg,png,gif',
            'type_name' => 'required',
        ]);

        $image = $request->file('type_icon');

        if ($image != null) {
            $image_name = $image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'backend/uploads/icon';
            $image->move($upload_path, $image_full_name);
            $image_url = $image_full_name;
            TypePlace::create([
                'type_icon' => $image_url,
                'type_name' => $request->type_name,
            ]);
        }

        return redirect()->route('type');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TypePlace $id)
    {
        $id_user = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id_user);
        $title = "Carousel";
        //
        return view('page.backend.typePlace.edit', compact('title', 'dataAuth', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypePlace $id)
    {
        $request->validate([
            'type_icon' => 'image|mimes:jpg,jpeg,png,gif',
            'type_name' => 'required',
        ]);

        $image = $request->file('image');

        if ($image != null) {
            $image_path = public_path("backend/uploads/icon/{$id->image}");
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            $image_name = $image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'backend/uploads/icon';
            $image->move($upload_path, $image_full_name);
            $image_url = $image_full_name;
            TypePlace::where('id', $id->id)->update([
                'type_icon' => $image_url,
                'type_name' => $request->type_name,
            ]);
        } else {
            TypePlace::where('id', $id->id)->update([
                'type_name' => $request->type_name,
            ]);
        }
        return redirect()->route('type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = TypePlace::find($id);
        $image_path = public_path("backend/uploads/icon/{$type->type_icon}");
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        TypePlace::destroy($id);
        return redirect()->route('type');
    }
}
