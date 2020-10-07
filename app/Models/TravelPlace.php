<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypePlace;
use App\Models\Employee;

class TravelPlace extends Model
{
    use HasFactory;
    protected $table = 'tb_travel_place';
    protected $fillable = ['type_id', 'creator_id', 'name_place', 'address', 'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'kelurahan_id', 'latitude', 'longitude', 'description', 'image'];

    public function type()
    {
        return $this->hasOne(TypePlace::class, 'id', 'type_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'creator_id');
    }
}
