<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InvalidStateException;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class RegisterGoogleController extends Controller
{
    public function loginGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callBackUser()
    {
        try{
            $user = Socialite::driver('google')->user();
            //dd($user);
            $userExists = User::where('id', $user->id)->first();
            if ($userExists) {
                Auth::login($user);
                return view('/homePrincipal');
                //retorne a la vista 
            } else {
                $userNew = new User();
                $userNew->id = $user->id;
                $userNew->tipoId = 'CC';
                $userNew->numIdentificacion = 0;
                $userNew->name = $user['given_name'];
                $userNew->lastname= $user['family_name'];
                $userNew->email= $user->email;
                $userNew->password = 'v';
    
                return view('auth.registerGoogle',compact('userNew'));
            } 
        }catch (InvalidStateException $e) {
            dd($e);
        }
        
    }
}

