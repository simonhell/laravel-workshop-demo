<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Drink;

class User extends Authenticatable
{
    public function drinks() {
        return $this->hasMany('App\Drink');
    }
}
