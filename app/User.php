<?php

namespace App;

use App\Model\allergie;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name' , 'email', 'age', 'num_phone' , 'sexe', 'address' , 'password' , 'enable' , 'hopital_id' , 'pays', 'ville', 'code_postal' , 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table ='users';

    public function hopital(){
        return $this->hasOne('App\Model\hopital');
    }

    public function allergie(){
        return $this->belongsToMany(allergie::class);
    }

    public function personne_a_contacter(){
        return $this->hasOne('App\Model\personne_a_contacter');
    }
}
