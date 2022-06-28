<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {
        $users = [
            'nomes' => ['José Lira', 
                        'Marcelo Almeida'
            ]
        ];

        dd($users);
    }

    public function show($id) 
    {
        dd('id do usuario é' . $id);
        
    }
}


// php artisan optimize (para limpar cache)
