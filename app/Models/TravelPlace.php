<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypePlace;
use App\Models\Employee;

class TravelPlace extends Model
{
    use HasFactory;

    protected $table = 'tb_place';
    protected $fillable = [
        'type_id', 'is_active', 'creator_id',
        'name_place', 'address', 'provinsi',
        'kabupaten', 'latitude', 'longitude',
        'description', 'image', 'slug'
    ];

    public function type()
    {
        return $this->hasOne(TypePlace::class, 'id', 'type_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'creator_id');
    }
}
