<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    protected $fillable = [
        'title' , 'content' , 'users_id' ,
    ];
    protected $table ='info';

    public function users(){
        return $this->hasMany('app\User');
    }
}
