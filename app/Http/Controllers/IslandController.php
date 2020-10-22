<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Island;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class IslandController extends Controller
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
        $title = "Pulau";
        //
        $dataIsland = Island::all();
        return view('page.backend.admin.island.index', compact('dataAuth', 'title', 'dataIsland'));
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
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $image = $request->file('image');

        if ($image != null) {
            $image_name = $image->getClientOriginalName();
            $image_full_name = time() . "-" . $image_name;
            $upload_path = 'backend/uploads/island';
            $image->move($upload_path, $image_full_name);
            $image_url = $image_full_name;
            Island::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image_url,
                'slug' => Str::slug($request->name)
            ]);
            return redirect()->back()->with('success', 'disimpan');
        } else {
            return redirect()->back()->with('gagal', 'gagal');
        }
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
    public function edit(Island $id)
    {
        $id_user = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id_user);
        $title = "Pulau";
        //
        return view('page.backend.admin.island.edit', compact('dataAuth', 'title', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Island $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        $image = $request->file('image');

        if ($image != null) {
            $image_path = public_path("backend/uploads/island/{$id->image}");
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            $image_name = $image->getClientOriginalName();
            $image_full_name = time() . "-" . $image_name;
            $upload_path = 'backend/uploads/island';
            $image->move($upload_path, $image_full_name);
            $image_url = $image_full_name;
            Island::where('id', $id->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image_url,
                'slug' => Str::slug($request->name)
            ]);
        } else {
            Island::where('id', $id->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => Str::slug($request->name)
            ]);
        }
        return redirect()->route('island')->with('success', 'diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $place = Island::find($id);
        $image_path = public_path("backend/uploads/island/{$place->image}");
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        Island::destroy($id);

        return redirect()->back()->with('success', 'dihapus');
    }
}
