<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Level;
use Illuminate\Support\Facades\File;

class LevelController extends Controller
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
        $title = "Level";
        //
        $dataLevel = Level::all();
        return view('page.backend.admin.level.index', compact('title', 'dataLevel', 'dataAuth'));
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
            'name_level' => 'required',
        ]);

        Level::create([
            'name_level' => $request->name_level,
        ]);

        return redirect()->route('level')->with('success', 'disimpan');
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
    public function edit(Level $id)
    {
        $id_user = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id_user);
        $title = "Employee";
        //
        return view('page.backend.admin.level.edit', compact('title', 'dataAuth', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $id)
    {

        $request->validate([
            'name_level' => 'required',
        ]);

        Level::where('id', $id->id)->update([
            'name_level' => $request->name_level,
        ]);

        return redirect()->route('level')->with('success', 'diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Level::destroy($id);
        return redirect()->route('level')->with('success', 'dihapus');
    }
}
