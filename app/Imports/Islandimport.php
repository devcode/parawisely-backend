<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Island;

class Islandimport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Island([
            'id' => $row[0],
            'name' => $row[1],
            'description' => $row[2],
            'image' => $row[3],
            'slug' => $row[4]
        ]);
    }
}
