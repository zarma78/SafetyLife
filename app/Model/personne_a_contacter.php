<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class personne_a_contacter extends Model
{
    protected $fillable = [
        'email' , 'first_name', 'last_name' , 'num_phone' , 'address' , 'users_id' ,
    ];
    protected $table ='personne_a_contacter';
    public function users(){
        return $this->hasOne('app\User');
    }
}
