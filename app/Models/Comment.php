<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TravelPlace;
use Illuminate\Support\Str;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'tb_comment';
    protected $fillable = ['place_id', 'name', 'email', 'comment'];

    public function place()
    {
        return $this->hasOne(TravelPlace::class, 'id', 'place_id');
    }
}
