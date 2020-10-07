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
}
