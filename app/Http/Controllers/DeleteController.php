<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeleteController extends Controller
{
    function ListUsers(){
        $users = new User();
        $all_users = $users::all();
        return response()->json($all_users, 200);
    }

    function ListUsersById(Request $request)
    {
        $my_user = $this->ListUsers()->where("id", "=", $request->id);
        return response()->json($my_user, 200 );
    }

    function ListUsersByFirstName(Request $request){
        $my_user = $this->ListUsers()->where("first_name", "=", $request->first_name);
        return response()->json($my_user, 200 );
    }

    function ListUsersByLastName(Request $request){
        $my_user = $this->ListUsers()->where("last_name", "=", $request->last_name);
        return response()->json($my_user, 200 );
    }

    function ListUsersByHopital(Request $request){
        $my_user = $this->ListUsers()->where("hopital_id", "=", $request->hopital_id);
        return response()->json($my_user, 200 );
    }


    function ListUserByAllergie(Request $request){
        $users = new user_has_allergie();
        $my_users = $users::all()->where("users_id", "=" , $request->users_id)->pluck("allergie_id");
        if($my_users->isEmpty())
            return response()->json("is empty");
        foreach ($my_users as $my_user){
            $arr[] = array($this->ListAllergie()->where("id" , "=" , $my_user)->pluck("name"));
        }
        return response()->json($arr, 200 );
    }

    function ListHopital(){
        $hopital = new hopital();
        $all_hopital = $hopital::all();
        return response()->json($all_hopital, 200);
    }

    function ListHopitalById(Request $request){
        $my_hopital = $this->ListHopital()->where("id" , "=" , $request->id);
        return response()->json($my_hopital, 200);
    }

    function ListHopitalByName(Request $request){
        $my_hopital = $this->ListHopital()->where("name" , "=" , $request->name);
        return response()->json($my_hopital, 200);
    }

    function ListAllergie(){
        $allergie = new allergie();
        $all_allergie = $allergie::all();
        return response()->json($all_allergie, 200);
    }

    function ListAllergieById(Request $request){
        $my_allergie = $this->ListAllergie()->where("id" , "=" , $request->id);
        return response()->json($my_allergie, 200);
    }

    function ListAllergieByName(Request $request){
        $my_allergie = $this->ListAllergie()->where("name" , "=" , $request->name);
        return response()->json($my_allergie, 200);
    }

    function ListHistory(){

    }

    function ListHistoryByUser(){

    }
}
