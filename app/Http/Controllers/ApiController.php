<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPlace;
use App\Models\TypePlace;
use App\Models\Section;

class ApiController extends Controller
{
    public function index()
    {
        return $this->success(TravelPlace::all());
    }

    public function dataPlace()
    {
        $data = TravelPlace::all();
        return $this->success($data);
    }

    public function getTravelPlace()
    {
        $data = TravelPlace::all();
        return $this->success($data);
    }

    public function getTypePlace()
    {
        $data = TypePlace::all();
        return $this->success($data);
    }

    public function getEksplorasi()
    {
        $data = TypePlace::with('places')->get();
        return $this->success($data);
    }

    public function dataType()
    {
        $data = TypePlace::all();
        return $this->success($data);
    }

    public function dataSection()
    {
        $data = Section::all();
        return $this->success($data);
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
