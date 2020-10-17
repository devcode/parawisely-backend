<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPlace;
use App\Models\TypePlace;

class ApiController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        return $this->success(TravelPlace::all());
    }

=======
>>>>>>> 003be4129b15852855b393e036cb6c9891ff368b
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
}
