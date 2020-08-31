<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DB;

class LoginController extends BaseController
{
    public function login(Request $req)
    {
        $login = $req->input('login');
        $mdp = $req->input('mdp');

        $user = DB::table('users')->where(['name'=>$login,'password'=>$mdp])->get();
        echo $user;
        
        if (count($user) > 0)
        {
            return redirect('/dashboard')->with('user',$user);
        }
        else 
        {
            return redirect('/');
        }
    }
}
