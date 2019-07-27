<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class history_user extends Model
{
    protected $fillable = [
        'first_name', 'last_name' , 'email', 'age', 'num_phone' , 'sexe', 'address' , 'password' , 'hopital_id' , 'users_id' ,
    ];
    protected $table ='history_user';

    public function users(){
        return $this->hasOne('app\User');
    }
}
