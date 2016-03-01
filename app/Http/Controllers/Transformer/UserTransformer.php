<?php
namespace App\Http\Controllers\Transformer;
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 2/3/2016
 * Time: 10:00 AM
 */
use League\Fractal\TransformerAbstract;
use App\Models\User;

class UserTransformer extends TransformerAbstract{
    public function transform(User $user){
        return [
            'id' => (int) $user->id,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'password' => $user->password
        ];
    }
}