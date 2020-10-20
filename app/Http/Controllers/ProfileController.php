<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $title = "Update Profile";
        $id = Auth::guard('employee')->id();
        $dataAuth = Employee::with('level')->find($id);
        return view('page.backend.admin.profile.index', compact('title', 'dataAuth'));
    }

    public function update(Request $request, Employee $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif'
        ]);

        $image = $request->file('image');

        if ($image != null) {
            $image_path = public_path("backend/uploads/{$id->image}");
            if (File::exists($image_path) && $id->image != "default.png") {
                unlink($image_path);
            }
            $image_name = $image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'backend/uploads/';
            $image->move($upload_path, $image_full_name);
            $image_url = $image_full_name;
            Employee::where('id', $id->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'image' => $image_url
            ]);
        } else {
            Employee::where('id', $id->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        if (Auth::guard('employee')->user()->level_id == 1) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('mitra');
        }
    }

    public function changePassword()
    {
        $id = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id);
        $title = "Ganti Password";
        //
        return view('page.auth.changePassword', compact('dataAuth', 'title'));
    }

    public function changePasswordProccess(Request $request)
    {
        $request->validate([
            'password_now' => 'required',
            'password_new' => 'required|confirmed',
            'password_new_confirmation' => 'required',
        ]);

        $id = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id);

        if (!(Hash::check($request->password_now, $dataAuth->password))) {
            return redirect()->back()->with('error', 'Password Saat ini tidak sama');
        } elseif ($request->password_now == $request->password_new) {
            return redirect()->back()->with('error', 'Password dulu dengan saat ini sama');
        } else {
            $dataAuth->password = $request->password_new;
            $dataAuth->save();
            return redirect()->back()->with('success', 'diupdate');
        }
    }
}
