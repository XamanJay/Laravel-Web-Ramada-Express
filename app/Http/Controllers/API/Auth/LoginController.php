<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;

class LoginController extends ApiController
{
    public function login(Request $request)
    {
        $user = User::where('email',$request->email)->get();
        if(!$user->isEmpty())
        {
            if(Hash::check($request->password,$user[0]->password)){
                //crear TOKEN para autenticacion de la SPA
                if($user[0]->rol->tag_rol == "admin")
                {
                    $token = $user[0]->createToken('login',['can:all']);
                }else if($user[0]->rol->tag_rol == "gerente")
                {
                    $token = $user[0]->createToken('login',['can:all-gerente']);
                }else if($user[0]->rol->tag_rol == "ventas")
                {
                    $token = $user[0]->createToken('login',['can:all-gerente-slave']);
                }
                else if($user[0]->rol->tag_rol == "recepcion")
                {
                    $token = $user[0]->createToken('login',['can:slave']);
                }
                return $this->loginResponse('Inicio de sesion exitoso',$user[0],$token->plainTextToken,200);

            }else{
                return $this->errorResponse('Password/Email incorrectos',500);
            }
        }else{
            return $this->errorResponse('Password/Email incorrectos',500);
        }
    }

    public function logout()
    {
        // Revoke the token that was used to authenticate the current request...
        //Auth::user()->currentAccessToken()->delete();
        Auth::user()->tokens()->delete();
        return $this->successResponse('Cierre de sesion exitoso',null,200);
    }
}
