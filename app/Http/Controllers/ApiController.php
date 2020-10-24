<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

    public function dataIsland()
    {
        $data = Island::all();
        return $this->success($data);
    }

    public function getDestinasiPilihan()
    {
        $data = TravelPlace::all()->random(4);
        return $this->success($data);
    }

    public function getComment($place_id)
    {
        $data = Comment::with('place')->where('place_id', $place_id)->get();
        return $this->success($data);
    }

    public function sendComment(Request $request)
    {
        $request->validate([
            'place_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
        ]);

        Comment::create([
            'place_id' => $request->place_id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment
        ]);

        $msg = [
            'success' => true,
            'message' => 'Komentar berhasil dikirim'
        ];

        return response()->json($msg);
    }
}
