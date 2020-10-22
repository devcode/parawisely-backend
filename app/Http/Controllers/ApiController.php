<?php

namespace App\Http\Controllers;

use App\Models\Island;
use Illuminate\Http\Request;
use App\Models\TravelPlace;
use App\Models\TypePlace;
use App\Models\Section;

class ApiController extends Controller
{
    public function getAllPlace()
    {
        $data = TravelPlace::all();
        return $this->success($data);
    }

    public function getPlacebyType($slug)
    {
        $data = TypePlace::where('slug', $slug)->with('places')->get();
        if (!$data) {
            return $this->notFound();
        }

        return $this->success($data);
    }

    public function getPlaceDetail($slug)
    {
        $data = TravelPlace::where('slug', $slug)->first();
        if (!$data) {
            return $this->notFound();
        }
        return $this->success($data);
    }

    public function getAllSection()
    {
        $data = Section::all();
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

<<<<<<< HEAD
    public function getDestinasiPilihan()
=======
    public function dataIsland()
    {
        $data = Island::all();
        return $this->success($data);
    }

    public function destinasiPilihan()
>>>>>>> 52d43bef2140d9bce0fc8a6afb995e3a2ab04d80
    {
        $data = TravelPlace::all()->random(4);
        return $this->success($data);
    }
}
