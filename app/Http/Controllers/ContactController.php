<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $id_auth = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id_auth);
        $title = "Pesan";
        //
        $dataContactCount = Contact::count();
        $dataContact = Contact::limit(3)->get();
        return view('page.backend.admin.contact.index', compact('dataAuth', 'title', 'dataContactCount', 'dataContact'));
    }

    public function show(Contact $id)
    {
        $id_auth = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id_auth);
        $title = "Pesan";
        //

        return view('page.backend.admin.contact.detail', compact('title', 'dataAuth', 'id'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $data = array(
            'name_recipe' => $request->name_recipe,
            'email_recipe' => $request->email_recipe,
            'message' => $request->message
        );

        Mail::to($request->email_recipe)->send(new ContactEmail($data));
        return back()->with('success', 'Email Berhasil dikirim');
    }

    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()->back()->with('success', 'dihapus');
    }
}
