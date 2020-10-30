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
use GuzzleHttp\Promise\Is;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function getAllPlace()
    {
        $data = TravelPlace::where('status', 1)->with('comments')->get();
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

    public function wisataDaerahLah($islandId, $idPlace)
    {
        if ($idPlace == 0 && $islandId) {
            return $this->success(Island::where('id', $islandId)->with('places')->first());
        }

        if (!is_numeric($idPlace) && !is_numeric($islandId)) {
            return $this->fail();
        }

        $data = Island::where('id', $islandId)->with(['places' => function ($query) use ($idPlace) {
            $query->where('type_id', $idPlace);
        }])->first();

        // $data = TravelPlace::where('island_id', $islandId)->where('type_id', $idPlace)->get();

        if ($data) {
            return $this->success($data);
        } else {
            return $this->notFound();
        }
    }

    public function getPlacebyType($id)
    {
        if ($id == 0) {
            return $this->success(TravelPlace::with('comments')->get());
        }

        if (!is_numeric($id)) {
            return $this->fail();
        }

        $data = TravelPlace::where('type_id', $id)->with('comments')->get();
        if ($data) {
            return $this->success($data);
        } else {
            return $this->notfound();
        }
    }


    public function getPlacebyTypeCk(Request $request)
    {
        $categories = $request->input('categories');
        if ($categories == null) { // All Data
            return $this->success(TravelPlace::all());
        }

        if (!is_array($categories)) {
            return $this->fail();
        }

        $data = TravelPlace::whereIn('type_id', $categories)->get();
        if ($data) {
            return $this->success($data);
        } else {
            return $this->notFound();
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

    public function wisataDaerahDetail($slug)
    {
        $data = Island::where('slug', $slug)->with('places')->first();

        if (is_null($data)) {
            return $this->notFound();
        } else {
            return $this->success($data);
        }
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
        if (!is_numeric($place_id)) {
            return $this->fail();
        }
        $data = Comment::where('place_id', $place_id)->get();

        if (!$data) {
            return $this->notFound();
        }

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

                $comme = Comment::where('place_id', $request->place_id)->get();

                if ($comment) {
                    return $this->success($comme);
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

    public function getPlacePagination(Request $request)
    {
        if (!is_numeric($request->get('page')) && $request->get('limit')) {
            return $this->fail();
        }
        $page = $request->has('page') ? $request->get('page') : 1;
        $limit = $request->has('limit') ? $request->get('limit') : 10;

        $data = TravelPlace::with('comments')->limit($limit)->offset(($page - 1) * $limit)->get()->toArray();

        return $this->success($data);
    }

    public function getSearch($query)
    {
        // $places = TravelPlace::whereLike('name_place', $query)->get();
        $places = TravelPlace::with('type')->whereHas('type', function ($kontol) use ($query) {
            $kontol->where('type_name', 'ilike', "%" . $query . "%");
        })->OrWhereLike('name_place', $query)->OrWhereLike('provinsi', $query)->OrWhereLike('kabupaten', $query)->get();

        if (is_null($places)) {
            return $this->notFound();
        } else {
            return $this->success($places);
        }
    }
}
