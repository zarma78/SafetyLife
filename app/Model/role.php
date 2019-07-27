<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $fillable = [
        'name',
    ];
    protected $table ='role';

    public function users(){
        return $this->hasMany('app\User');
    }
}
