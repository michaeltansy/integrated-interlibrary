<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Transformer\UserTransformer;
use App\Models\User;
use Dingo\Api\Exception\ValidationHttpException;
use Dingo\Api\Facade\API;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Dingo\Api\Auth\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller
{
    public function login(Request $request){
        $email = $request->get('email');
        $password = $request->get('password');
        $remember_me = $request->get('remember_me');
        try{
            if(\Auth::attempt(['email' => $email, 'password' => $password]/*,$remember_me*/)){
                $credentials = $email . ':' . $password;
                $token = base64_encode($credentials);

                return \Response::json('Basic '.$token, 200)->header('Authorization', 'Basic ' .$token);
            }
        }catch (\Exception $e){
            return $this->response->errorInternal(['failed to login']);
        }
        return \Response::json('invalid email or password', 500);
    }

    public function logout(){
        \Auth::logout();
        header_remove('Authorization');
        return \Response::json('user logout',200);
    }

    public function register(Request $request){
        try{
            User::create([
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
            ]);

            return \Response::json(['message' => 'user successfully created'], 201);
        }catch (\Exception $e){
            return $this->response->errorInternal('Something went wrong');
        }
    }
}
