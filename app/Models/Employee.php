<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Level;
use Illuminate\Support\Facades\Crypt;

class Employee extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'tb_employee';
    protected $fillable = ['name', 'email', 'password', 'level_id', 'image'];

    public function level()
    {
        return $this->hasOne(Level::class, 'id', 'level_id');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
