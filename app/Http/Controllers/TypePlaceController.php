<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Employee;
use App\Models\TypePlace;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TypeImport;
use App\Exports\TypeExport;

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
        $title = "Tipe Tempat";
        //
        $dataType = TypePlace::all();
        return view('page.backend.admin.typePlace.index', compact('title', 'dataType', 'dataAuth'));
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
            'icon' => 'required',
            'type_name' => 'required',
        ]);

        TypePlace::create([
            'type_icon' => $request->icon,
            'type_name' => $request->type_name,
            'slug' => Str::slug($request->type_name),
            'description' => $request->description,
        ]);

        return redirect()->route('type')->with('success', 'ditambah');
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
        $title = "Tipe Tempat";
        //
        return view('page.backend.admin.typePlace.edit', compact('title', 'dataAuth', 'id'));
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
            'icon' => 'required',
            'type_name' => 'required',
        ]);

        TypePlace::where('id', $id->id)->update([
            'type_icon' => $request->icon,
            'type_name' => $request->type_name,
            'slug' => Str::slug($request->type_name),
            'description' => $request->description,
        ]);
        return redirect()->route('type')->with('success', 'diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TypePlace::destroy($id);
        return redirect()->route('type')->with('success', 'dihapus');
    }

    public function fileImport(Request $request)
    {
        Excel::import(new TypeImport, $request->file('file')->store('temp'));
        return back()->with('success', 'disimpan');
    }

    public function fileExport()
    {
        return Excel::download(new TypeExport, 'type-collection.xlsx');
    }
}
