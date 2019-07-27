<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class allergie extends Model
{
    protected $fillable = [
        'name', 'détails' ,
    ];
    protected $table ='allergie';

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
