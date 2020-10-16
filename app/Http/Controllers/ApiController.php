<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPlace;
use App\Models\TypePlace;

class ApiController extends Controller
{
    public function dataPlace()
    {
        $data = TravelPlace::with(['type', 'employee'])->get();
        return $this->success(response()->json($data));
    }

    public function dataType()
    {
        $data = TypePlace::all();
        return $this->success(response()->json($data));
    }
}
