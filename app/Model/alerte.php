<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class alerte extends Model
{
    protected $fillable = [
        'users_id', 'active' , 'alert' ,
    ];
    protected $table ='alerte';

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
