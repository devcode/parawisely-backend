<?php

namespace App\Http\Controllers;

use App\Http\Resources\TravelPlaceResource;
use App\Models\Comment;
use App\Models\Island;
use Illuminate\Http\Request;
use App\Models\TravelPlace;
use App\Models\TypePlace;
use App\Models\Section;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function getAllPlace()
    {
        $data = TravelPlace::all();
        return $this->success($data);
    }

    public function map()
    {
        $places = TravelPlace::with('type')->get();

        $geoJSON = $places->map(function ($place) {
            return [
                'type' => "Feature",
                'properties' => new TravelPlaceResource($place),
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        $place->longitude,
                        $place->latitude
                    ]
                ]
            ];
        });

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $geoJSON
        ]);
    }

    public function getPlacebyType($id)
    {
        if ($id == 0) { // all
            return $this->success(TravelPlace::all());
        }

        if (!is_numeric($id)) {
            return $this->fail();
        }

        $data = TravelPlace::where('type_id', $id)->get();
        if ($data) {
            return $this->success($data);
        } else {
            return $this->notfound();
        }
    }

    public function getPlaceDetail($slug)
    {
        $data = TravelPlace::where('slug', $slug)->with('comments')->first();
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

    public function wisataDaerah()
    {
        $data = Island::with('places')->get();
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
        $validator = Validator::make($request->all(), [
            'place_id' => 'required',
            'name' => 'required|min:3',
            'email' => 'required|email',
            'comment' => 'required|min:10'
        ]);

        if ($validator->fails()) {
            return $this->fail($validator->errors());
        } else {
            $hasComment = TravelPlace::where('id', $request->place_id)->first();
            if ($hasComment) {
                $comment = Comment::create([
                    'place_id' => $request->place_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'comment' => $request->comment
                ]);

                if ($comment) {
                    return $this->success($comment);
                } else {
                    return $this->fail('post gagal');
                }
            } else {
                return $this->notFound();
            }
        }
    }

    public function sendContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->fail($validator->errors());
        } else {
            $contact = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message
            ]);
            if ($contact) {
                return $this->success($contact);
            } else {
                return $this->fail('post gagal');
            }
        }
    }
}
