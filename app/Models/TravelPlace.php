<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypePlace;
use App\Models\Employee;
use App\Models\Island;

class TravelPlace extends Model
{
    use HasFactory;

    protected $table = 'tb_place';
    protected $fillable = [
        'type_id', 'is_active', 'creator_id', 'island_id',
        'name_place', 'slug', 'address', 'provinsi',
        'kabupaten', 'latitude', 'longitude',
        'description', 'image', 'slug'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'place_id', 'id');
    }

    public function type()
    {
        return $this->hasOne(TypePlace::class, 'id', 'type_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'creator_id');
    }

    public function island()
    {
        return $this->hasOne(Island::class, 'id', 'island_id');
    }

    public function scopeWhereLike($query, $column, $value)
    {
        return $query->where($column, 'like', '%' . $value . '%');
    }

    public function scopeOrWhereLike($query, $column, $value)
    {
        return $query->orWhere($column, 'like', '%' . $value . '%');
    }
}
