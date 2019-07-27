<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class hopital extends Model
{
    protected $fillable = [
        'name', 'phone_number' , 'address' ,
    ];
    protected $table ='hopital';

    public function users(){
        return $this->hasMany('app\User');
    }
}
