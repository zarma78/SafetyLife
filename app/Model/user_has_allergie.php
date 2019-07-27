<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class user_has_allergie extends Model
{
    protected $fillable = [

    ];
    protected $table ='user_has_allergie';
    public function avis(){
        return $this->hasMany('app\Model\user_has_allergie');
    }
}
