<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

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
        return redirect()->route('dashboard');
    }

    public function changePassword(Employee $employee)
    {
        $title = "Change Password";
        $id = Auth::guard('employee')->id();
        $dataAuth = Employee::with('level')->find($id);
        //
        return view('page.backend.admin.profile.changePassword', compact('employee', 'dataAuth', 'title'));
    }

    public function procesChange(Request $request, Employee $id)
    {
        $password_now = $request->now_password;
        $old_password = $request->old_password;
        $retype_old_password = $request->retype_old_password;

        echo "passsword old () =>  " . $id->password;
        echo "<br>";
        echo "passsword new () =>  " . bcrypt($old_password);
    }
}
