<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\TypePlace;

class TypeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new TypePlace([
            'id' => $row[0],
            'type_name' => $row[1],
            'slug' => $row[2],
            'type_icon' => $row[3],
            'description' => $row[4]
        ]);
    }
}
