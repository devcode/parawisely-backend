<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Carousel;
use App\Models\Employee;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id);
        $title = "Carousel";
        //
        $dataCarousel = Carousel::all();
        return view('page.backend.admin.carousel.index', compact('title', 'dataCarousel', 'dataAuth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif',
            'description' => 'required',
        ]);

        $image = $request->file('image');

        if ($image != null) {
            $image_name = $image->getClientOriginalName();
            $image_full_name = time() . "-" . $image_name;
            $upload_path = 'backend/uploads/carousel';
            $image->move($upload_path, $image_full_name);
            $image_url = $image_full_name;
            Carousel::create([
                'image' => $image_url,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('carousel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $id)
    {
        $id_user = Auth::guard('employee')->id();
        $dataAuth = Employee::find($id_user);
        $title = "Carousel";
        //
        return view('page.backend.admin.carousel.edit', compact('title', 'dataAuth', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpg,jpeg,png,gif',
            'description' => 'required',
        ]);

        $image = $request->file('image');

        if ($image != null) {
            $image_path = public_path("backend/uploads/carousel/{$id->image}");
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            $image_name = $image->getClientOriginalName();
            $image_full_name = time() . "-" . $image_name;
            $upload_path = 'backend/uploads/carousel';
            $image->move($upload_path, $image_full_name);
            $image_url = $image_full_name;
            Carousel::where('id', $id->id)->update([
                'image' => $image_url,
                'description' => $request->description,
            ]);
        } else {
            Carousel::where('id', $id->id)->update([
                'description' => $request->description,
            ]);
        }
        return redirect()->route('carousel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel = Carousel::find($id);
        $image_path = public_path("backend/uploads/carousel/{$carousel->image}");
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        Carousel::destroy($id);
        return redirect()->route('carousel');
    }
}
