<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePlace extends Model
{
    use HasFactory;
    protected $table = 'tb_type_travel';
    protected $fillable = ['type_name', 'type_icon'];
}
