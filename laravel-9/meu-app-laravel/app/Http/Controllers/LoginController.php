<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    // public function index(Request $request)
    // {
    //     $erro = '';
        
    //     if($request->get('erro') == 1 ){
    //         $erro = 'usuário ou senha não existe';
    //     }

    //     return view('login.index', ['erro' => $erro]);
    // }

    public function auth(Request $request)
    {
        $rules = [
            'email' => 'email',
            'password' => 'required'

        ];

        $feedback = [
            'email.email' => 'O email é indispensável.',
            'password.required' => 'A senha é indispensável.'
        ];

        $request->validate($rules, $feedback);

        $email = $request->get('email');
        $password = $request->get('password');

        // echo "usuário: $email senha: $password";

        $users = new User();

        $exist = $users->where('email', $email)->where('password', $password)->get()->first();

        if(isset($exist->email))
        {
            echo 'usuário existe';
        }
        else {
                return redirect()->route('login.index', ['erro' => 1]);
        }

        

        // print_r($exist);
    }

    public function index(Request $request)
    {
        $erro = '';
        
        if($request->get('erro') == 1 ){
            $erro = 'usuário ou senha não existe';
        }

        echo $erro;

        return view('login.index', ['erro' => $erro]);
    }
}
