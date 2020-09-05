<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->sortBy('name');;
        
        return view('register', compact('users'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);
        
        $user = User::create(request(['name', 'email', 'password','role']));
        
        auth()->login($user);
        
        return redirect()->to('users');
    }

    
     
   
}
