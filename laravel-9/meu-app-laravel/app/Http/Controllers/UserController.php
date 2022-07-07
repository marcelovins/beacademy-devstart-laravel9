<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    
    // public function index() 
    // {
    //     $users = [
    //         'nomes' => ['José Lira', 
    //                     'Marcelo Almeida'
    //         ]
    //     ];

    //     dd($users);
    // }

    public function index() 
    {
        $users = User::all();

        // dd($users);
        return view('users.index', compact('users'));

    }

    public function show($id) 
    {
        // $user = User::find($id);

        // return $user;

        if(!$user = User::find($id))
            return redirect()->route('users.index');
        
        $title = $user->name;

        return view('users.show', compact('user', 'title'));
        
    }

    

    public function create() 
    {
        
        return view('users.create');

    }

    public function store(Request $request) 
    {
        // dd($request->all());
    //    $user = new User;
    //    $user->name = $request->name;
    //    $user->email = $request->email;
    //    $user->password = bcrypt($request->password);
    //    $user->save(); //maneira 1 de fazer chamada de dados para o banco;

    $data = $request->all();
    $data['password'] = bcrypt($request->password);

    $this->model->create($data);

       return redirect()->route('users.index');

    }
}


// php artisan optimize (para limpar cache)
