<?php

namespace App\Http\Controllers;

use App\Model\alerte;
use App\Model\allergie;
use App\Model\history_user;
use App\Model\hopital;
use App\Model\info;
use App\Model\personne_a_contacter;
use App\Model\user_has_allergie;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Http\JsonResponse;

class ReadController extends Controller
{

    ////////////////////////////////////////////////USER///////////////////////////////////////////////////////
    function ListUsers(){
        $users = new User();
        $all_users = $users::all();
        return $all_users;
    }

    function ListUsersJsonAll(){
        return response()->json($this->ListUsers(), 200);
    }

    function ListUsersJsonEnable(){
        return response()->json($this->ListUsers()->where("enable" , "=", true), 200);
    }

    function ListUsersById(Request $request)
    {
        $my_user = $this->ListUsers()->where("id", "=", $request->id);
        return $my_user;
    }

    function ListUsersByIdAll(Request $request)
    {
        $my_user = response()->json($this->ListUsersById($request));
        if($my_user->isEmpty())
            return response()->json("id inexistant");
        return response()->json($my_user, 200);
    }

    function ListUserByIdEnable(Request $request){
        $my_user = $this->ListUsersById($request)->where("enable", "=", true);
        if($my_user->isEmpty())
            return response()->json("id inexistant");
        return response()->json($my_user, 200);
    }


    function ListUsersByFirstName(Request $request){
        $my_user = $this->ListUsers()->where("first_name", "=", $request->first_name);
        if($my_user->isEmpty())
            return "aucun utilisateur à ce prénom";
        return $my_user;
    }

    function ListUsersByFirstNameAll(Request $request){
        return response()->json($this->ListUsersByFirstName($request));
    }

    function ListUsersByFirstNameEnable(Request $request){
        $my_user = $this->ListUsersByFirstName($request)->where("enable", "=", true);
        if($my_user->isEmpty())
            return response()->json("aucun utilisateur à ce prénom");
        return response()->json($my_user, 200);
    }

    function ListUsersByLastName(Request $request){
        $my_user = $this->ListUsers()->where("last_name", "=", $request->last_name);
        if($my_user->isEmpty())
            return "aucun utilisateur à ce nom";
        return $my_user;
    }


    function ListUsersByLastNameAll(Request $request){
        return response()->json($this->ListUsersByLastName($request));
    }

    function ListUsersByLastNameEnable(Request $request){
        $my_user = $this->ListUsersByLastName($request)->where("enable", "=", true);
        if($my_user->isEmpty())
            return response()->json("aucun utilisateur à ce nom");
        return response()->json($my_user, 200 );
    }

    function ListUsersByHopital(Request $request){
        $my_user = $this->ListUsers()->where("hopital_id", "=", $request->hopital_id);
        if($my_user->isEmpty())
            return "aucun utilisateur à cette id";
        return $my_user;
    }


    function ListUsersByHopitalAll(Request $request){
        return response()->json($this->ListUsersById($request), 200);
    }

    function ListUsersByHopitalEnable(Request $request){
        $my_user = $this->ListUsersByHopital($request)->where("enable", "=", true);
        if($my_user->isEmpty())
            return response()->json("il n'y a personne dans cette hopital");
        return response()->json($my_user, 200 );
    }

    function ListAllergieByUsers(Request $request){
        $users = new user_has_allergie();
        $my_allergies = $users::all()->where("users_id", "=" , $request->users_id)->pluck("allergie_id");

        if($my_allergies->isEmpty())
            return response()->json("is empty");
        foreach ($my_allergies as $my_allergie)
            $arr[] = array($this->ListAllergie()->where("id" , "=" , $my_allergie)->pluck("name"));
        return response()->json($arr, 200 );
    }



    ////////////////////////////////////////////////HOPITAL///////////////////////////////////////////////////////

    function ListHopital(){
        $hopital = new hopital();
        $all_hopital = $hopital::all();

        return $all_hopital;
    }

    function ListHopitalJson(){
        return response()->json($this->ListHopital(), 200);
    }

    function ListHopitalById(Request $request){
        $my_hopital = $this->ListHopital()->where("id" , "=" , $request->id);
        return response()->json($my_hopital, 200);
    }

    function ListHopitalByName(Request $request){
        $my_hopital = $this->ListHopital()->where("name" , "=" , $request->name);
        return response()->json($my_hopital, 200);
    }

////////////////////////////////////////////////ALLERGIE///////////////////////////////////////////////////////


    function ListAllergie(){
        $allergie = new allergie();
        $all_allergie = $allergie::all();
        return $all_allergie;
    }


    function ListAllergieJson(){
        return response()->json($this->ListAllergie(), 200);
    }

    function ListAllergieById(Request $request){
        $my_allergie = $this->ListAllergie()->where("id" , "=" , $request->id);
        return response()->json($my_allergie, 200);
    }

    function ListAllergieByName(Request $request){
        $my_allergie = $this->ListAllergie()->where("name" , "=" , $request->name);
        return response()->json($my_allergie, 200);
    }

    function ListUserByAllergie(Request $request){
        $users = new user_has_allergie();
        $my_users = $users::all()->where("allergie_id", "=" , $request->allergie_id)->pluck("users_id");
        if($my_users->isEmpty())
            return response()->json("is empty");
        foreach ($my_users as $my_user)
            $arr[] = array($this->ListUsers()->where("id" , "=" , $my_user)->pluck("first_name"));
        return response()->json($arr, 200 );
    }

    ////////////////////////////////////////////////HISTORY///////////////////////////////////////////////////////


    function ListHistory(){
        $history = new history_user();
        $all_history = $history::all();
        return $all_history;
    }

    function ListHistoryJson(){
        $reponse =  response()->json($this->ListHistory(), 200);
        if ($reponse->isEmpty())
            return "il n'y pas d'historique";
        return $reponse;
    }

    function ListHistoryById(Request $request){
        $reponse = $this->ListHistory()->where("id" , "=" , $request->id);
        if ($reponse->isEmpty())
            return response()->json("il n'y a pas d'historique pour cette identifiant");
        return response()->json($reponse);
    }

    function ListHistoryByUser(Request $request){
        $reponse = $this->ListHistory()->where("users_id", "=" , $request->users_id);
        if ($reponse->isEmpty())
            return response()->json("il n'y a pas d'historique pour cette utilisateur");
        return response()->json($reponse);
    }


    ////////////////////////////////////////////////INFO///////////////////////////////////////////////////////



    function ListInfo(){
        $info = new info();
        $all_info = $info::all();
        if($all_info->isEmpty())
            return "il ny'a pas d'info";
        return $all_info;
    }

    function  ListInfoJson(){
        return response()->json($this->ListInfo(), 200);
    }

    function ListInfoById(Request $request){
        $my_info = $this->ListInfo()->where("id", "=", $request->id);
        if ($my_info->isEmpty())
            return response()->json('il n\'y a pas d\'info');
        return response()->json($my_info, 200);
    }

    function ListInfoByUser(Request $request){
        $my_info = $this->ListInfo()->where("users_id", "=", $request->users_id);
        if ($my_info->isEmpty())
            return response()->json('il n\'y a pas d\'info pour cette utilisateur');
        return response()->json($my_info);
    }



    ////////////////////////////////////////////////PERSONNE///////////////////////////////////////////////////////

    function ListPersonne(){
        $personne = new personne_a_contacter();
        $all_personnne = $personne::all();
        if($all_personnne->isEmpty())
            return "il n'y a personne";
        return $all_personnne;
    }

    function ListPersonneJson(){
        return response()->json($this->ListPersonne());
    }

    function ListPersonneById(Request $request){
        $personne = $this->ListPersonne()->where("id", "=", $request->id);
        if($personne->isEmpty())
            return response()->json("personne non trouvé");
        return $personne;
    }

    function ListPersonneByFirstName(Request $request){
        $personne = $this->ListPersonne()->where("first_name", "=", $request->first_name);
        if($personne->isEmpty())
            return response()->json("personne non trouvé");
        return $personne;
    }

    function ListPersonneByLastName(Request $request){
        $personne = $this->ListPersonne()->where("last_name", "=", $request->last_name);
        if($personne->isEmpty())
            return response()->json("personne non trouvé");
        return $personne;
    }

    function ListPersonneByUsers(Request $request){
        $personne = $this->ListPersonne()->where("users_id", "=", $request->users_id);
        if($personne->isEmpty())
            return response()->json("personne non trouvé");
        return $personne;
    }

    function ListAlert(){
        $alert = new alerte();
        $all_alert = $alert::all();
        if($all_alert->isEmpty())
            return "il n'y a pas d'alerte !";
        return $all_alert;
    }

    function ListAlerteJson(){
        return response()->json($this->ListAlert(), 200);
    }

}



