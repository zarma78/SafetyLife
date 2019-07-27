<?php
namespace App\Http\Controllers\API;

use App\Model\history_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $token = $success['token'];
            return redirect()->route('dashboard',[ 'token' => $token]);
        }
        else{
            return response()->json("email ou mot de passe incorrect", 401);
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $users = DB::table("users")->get("email");
        foreach ($users as $user){
            if ($user->email == $request->email){
                return response()->json("l'adresse email est déjà utilisé");
            }
        }
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'age' => 'required',
            'num_phone' => ['required', 'digits:10'],
            'sexe' =>'required',
            'address' => 'required',
            'password' => 'required',
            'pays' => 'required',
            'ville' => 'required',
            'code_postal' => 'required',
            'c_password' => 'required|same:password',
            'role_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        //dd($input);
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $history_users = $input;
        $history_users['users_id'] = $user['id'];
        history_user::create($history_users);
        $success['remember_token'] =  $user->createToken('safety')->accessToken;
        $user->remember_token = $success;
        return redirect()->route('login');
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
}