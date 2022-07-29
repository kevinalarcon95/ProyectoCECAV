<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InvalidStateException;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\userGoogle;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Hash;

class RegisterGoogleController extends Controller 
{
    public function loginGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callBackUser()
    {
        
        $user = Socialite::driver('google')->user();
        //dd($user);
        $userExists = user::where('idgoogle', $user->id)->first();
        if ($userExists) {
            auth()->login($userExists,true);
            return redirect('/misOfertas');
        } else {
            $userExists = user::create([
                'tipoId'=> "GG",
                'numIdentificacion' =>"0",
                'idgoogle' => $user->id,
                'name' => $user['given_name'],
                'lastname' => $user['family_name'],
                'email' => $user->email,
                'password' =>bcrypt('0'),
                
            ])->assignRole('user');
            auth()->login($userExists,true);
            return redirect()->route('registre.Google',$userExists->idgoogle);
            
        } 
              
        
    }
    
    public function index($id){
        $userExists = DB::table('users')
        ->where('idgoogle', $id)
        ->first();
        return view('registerGoogle1',compact('userExists'));
    }
    public function update(Request $request, $id)
    {
        
        DB::table('users')->where('idgoogle', $id)->update(['name' => $request->name, 'lastname' => $request->lastname,
                                                            'tipoId' => $request->tipoId,'numIdentificacion' => $request->numId,
                                                            'password' => Hash::make($request->password)]);
        
        return redirect('/');
    
    }
    
}

