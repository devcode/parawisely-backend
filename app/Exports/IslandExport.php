<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Island;

class IslandExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Island::all();
    }
}
