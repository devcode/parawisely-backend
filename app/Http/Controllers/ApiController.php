<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPlace;

class ApiController extends Controller
{
    public function index()
    {
        return $this->success(TravelPlace::all());
    }
    public function dataPlace()
    {
        $data = TravelPlace::with(['type', 'employee'])->get();
        return $this->success(response()->json($data));
    }
}
