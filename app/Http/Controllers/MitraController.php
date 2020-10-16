<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\TypePlace;
use App\Models\TravelPlace;

class MitraController extends Controller
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
        $title = "Tambah Tempat";
        //
        $dataType = TypePlace::all();
        return view('page.backend.mitra.index', compact('dataAuth', 'title', 'dataType'));
    }

    public function show_data()
    {
        $id = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id);
        $title = "Data Tempat";
        //
        $dataType = TypePlace::all();
        $dataPlace = TravelPlace::with(['type', 'employee'])->where('creator_id', $dataAuth->id)->get();
        return view('page.backend.mitra.data', compact('dataAuth', 'title', 'dataType', 'dataPlace'));
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
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
