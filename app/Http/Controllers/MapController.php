<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPlace;
use Illuminate\Http\Response;

class MapController extends Controller
{
    public function index()
    {
        return view('page.frontend.map');
    }

    public function dataMap(Request $request)
    {
        $provinsi = $request->provinsi;
        $kabupaten = $request->kabupaten;
        $kecamatan = $request->kecamatan;

        if ($provinsi) {
            $data = TravelPlace::with('type')->where('provinsi_id', $provinsi)->get();
        } else {
            $data = TravelPlace::with('type')->get();
        }
        return response()->json($data);
    }
}
