<?php

namespace App\Models;

use Illuminate\Foundation\Auth\Account as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ["id"];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
