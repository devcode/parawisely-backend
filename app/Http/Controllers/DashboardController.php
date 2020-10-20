<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Section;
use App\Models\TravelPlace;

class DashboardController extends Controller
{
    public function index()
    {
        $id = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id);
        $title = "Dashboard";
        //
        $dataEmployee = Employee::get()->where('level_id', 2)->count();
        $dataSection = Section::count();
        $dataPlace = TravelPlace::count();
        return view('page.backend.admin.dashboard.index', compact('title', 'dataAuth', 'dataEmployee', 'dataCarousel', 'dataPlace'));
    }
}
