<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Level;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
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
        $title = "Pegawai";
        //
        $dataEmployee = Employee::with('level')->get();
        $dataLevel = Level::all();
        return view('page.backend.admin.employee.index', compact('title', 'dataEmployee', 'dataLevel', 'dataAuth'));
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
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        $image = $request->file('image');

        if ($image != null) {
            $image_name = $image->getClientOriginalName();
            // $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = time() . "-" . $image_name;
            $upload_path = 'backend/uploads/';
            $image->move($upload_path, $image_full_name);
            $image_url = $image_full_name;
            Employee::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'level_id' => $request->level,
                'image' => $image_url
            ]);
        } else {
            Employee::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'level_id' => $request->level,
                'image' => "default.png"
            ]);
        }
        return redirect()->back()->with('success', 'Data berhasil disimpan');
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
    public function edit(Employee $id)
    {
        $id_user = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id_user);
        $title = "Pegawai";
        //
        $dataLevel = Level::all();
        return view('page.backend.admin.employee.edit', compact('title', 'dataLevel', 'dataAuth', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        $image = $request->file('image');

        if ($image != null) {
            $image_path = public_path("backend/uploads/{$id->image}");
            if (File::exists($image_path) && $id->image != "default.png") {
                unlink($image_path);
            }
            $image_name = $image->getClientOriginalName();
            $image_full_name = time() . "-" . $image_name;
            $upload_path = 'backend/uploads/';
            $image->move($upload_path, $image_full_name);
            $image_url = $image_full_name;
            Employee::where('id', $id->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'level_id' => $request->level,
                'image' => $image_url
            ]);
        } else {
            Employee::where('id', $id->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'level_id' => $request->level,
            ]);
        }
        return redirect()->route('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Employee::find($id);
        $image_path = public_path("backend/uploads/{$admin->image}");
        if (File::exists($image_path) && $admin->image != "default.png") {
            unlink($image_path);
        }
        Employee::destroy($id);
        return redirect()->route('employee');
    }
}
