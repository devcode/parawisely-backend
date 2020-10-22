<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    use HasFactory;
    protected $table = 'tb_island';
    protected $fillable = ['name', 'description', 'image', 'slug'];
}
