<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\TravelPlace;

class PlaceImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new TravelPlace([
            'id' => $row[0],
            'type_id' => $row[1],
            'creator_id' => $row[2],
            'island_id' => $row[3],
            'name_place' => $row[4],
            'slug' => $row[5],
            'address' => $row[6],
            'provinsi' => $row[7],
            'kabupaten' => $row[8],
            'latitude' => $row[9],
            'longitude' => $row[10],
            'description' => $row[11],
            'image' => $row[12],
            'is_active' => $row[13],
        ]);
    }
}
