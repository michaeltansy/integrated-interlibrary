<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Transformer\UserTransformer;
use Dingo\Api\Facade\API;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $user = \Auth::user();
        /*return $this->response->item($user, 'UserTransformer');*/
        return API::response()->item($user,new UserTransformer());
    }

    public function create(){

    }
}
