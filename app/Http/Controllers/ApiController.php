<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPlace;
use App\Models\TypePlace;

class ApiController extends Controller
{
    public function index()
    {
        return $this->success(TravelPlace::all());
    }

    public function dataPlace()
    {
        $data = TravelPlace::with(['type', 'employee'])->get();
        return $this->success($data);
    }

    public function getTravelPlace()
    {
        $data = TravelPlace::all();
        return $this->success($data);
    }

    public function dataType()
    {
        $data = TypePlace::all();
        return $this->success(response()->json($data));
    }

    public function destinasiPilihan()
    {
        $data = TravelPlace::all()->random(4);
        return $this->success($data);
    }

    protected function getPlaceByTypeId($id)
    {
        $data = TravelPlace::where('type_id', $id)->get();
        return $this->success($data);
    }
}
