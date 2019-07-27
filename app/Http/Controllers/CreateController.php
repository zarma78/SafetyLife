<?php

namespace App\Http\Controllers;

use App\Model\alerte;
use App\Model\hopital;
use App\Model\info;
use App\Model\personne_a_contacter;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Model\allergie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    function CreateAllergie(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'détails' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $allergies = DB::table("allergie")->get("name");
        foreach ($allergies as $allergie){
            if ($allergie->name == $request->name){
                return response()->json("il y'a deja une allergie portant ce nom");
            }
        }

        $input = $request->all();
        allergie::create($input);
        return response()->json("allergie bien crée");
    }



    function CreateInfo(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'users_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        info::create($input);
        return response()->json("info crée");
    }

    function CreateHopital(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'phone_number' => ['required', 'digits:10']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $hopitals = DB::table("hopital")->get("name");
        foreach ($hopitals as $hopital){
            if ($hopital->name == $request->name){
                return response()->json("il y'a deja un hopital portant ce nom");
            }
        }

        $input = $request->all();
        hopital::create($input);
        return response()->json("hopital crée");
    }

    function CreatePersonne(Request $request){
        $validator = Validator::make($request->all(), [
            'email'  => 'required',
            'first_name'  => 'required',
            'last_name'  => 'required',
            'num_phone'  => ['required', 'digits:10'],
            'address'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        personne_a_contacter::create($input);
        return response()->json("personne à contacter crée");
    }

    function CreateAlerte(Request $request){
        $validator = Validator::make($request->all(), [
         'users_id' => 'required',
         'active' => 'required',
         'alert' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        alerte::create($input);
        return response()->json("ça marche");
    }
}
