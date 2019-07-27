<?php

namespace App\Http\Controllers;

use App\Model\allergie;
use App\Model\history_user;
use App\Model\info;
use App\Model\personne_a_contacter;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class UpdateController extends Controller
{
    function UpdateUsers(Request $request){
        $users = User::find($request->id);
        if ($users == null) {
            return response()->json("nous n'avons pas trouver la personne demandé");
        }

        if(Auth::user()->role_id > $users->role_id)
            return response()->json("vous n'avez pas les droits nécessaire");
        if ($request->first_name != null) {
            $users->first_name = $request->post('first_name');
        }


        if ($request->last_name != null) {
            $users->last_name = $request->post('last_name');
        }


        if ($request->email != null) {
            $users->email = $request->post('email');
        }


        if ($request->age != null) {
            $users->age = $request->post('age');
        }


        if ($request->sexe != null) {
            $users->sexe = $request->post('sexe');
        }


        if ($request->address != null) {
            $users->address = $request->post('address');
        }


        if ($request->password != null) {
            $users->password = $request->post('password');
        }

        if ($request->longitude != null) {
            $users->longitude = $request->post('longitude');
        }

        if ($request->latitude != null) {
            $users->latitude = $request->post('latitude');
        }
        $users->password = bcrypt($users->password);
        $users->save();
        $history = $users->toArray();
        $history['password'] = bcrypt($users->password);
        $history['users_id'] = $users->id;
        history_user::create($history);
        return response()->json("modification éffectué");
    }

    function UpdateAllergie(Request $request){
        $allergie = allergie::find($request->id);
        if ($allergie == null)
            return response()->json("nous n'avons pas trouver l'allergie demander");
        if($request->name != null)
            $allergie->name = $request->post('name');
        if ($request->détails != null)
            $allergie->détails = $request->post('détail');
        $allergie->save();
        return response()->json("modification éffectué");
    }

    function UpdateInfo(Request $request){
        $info = info::find($request->id);
        if ($info == null)
            return response()->json("nous n'avons pas trouver l'info demander");
        if ($request->title != null)
            $info->title = $request->title;
        if ($request->contenue != null)
            $info->content = $request->contenue;
        $info->save();
        return response()->json("modification éffectué");
    }

    function UpdatePersonne(Request $request){

        $personne = personne_a_contacter::find($request->id);
        if ($personne == null)
            return response()->json("nous n'avons pas trouver la personne demandé");
        if ($request->first_name != null)
            $personne->first_name = $request->first_name;
        if ($request->last_name != null)
            $personne->last_name = $request->lastname;
        if ($request->num_phone != null) {
            $validator = Validator::make($request->all(), [
                'num_phone' => ['required', 'digits:10']
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }
            $personne->num_phone = $request->num_phone;
        }
        if ($request->address != null)
            $personne->address = $request->address;
        $personne->save();
        return response()->json("modification éffectué");
    }

}
