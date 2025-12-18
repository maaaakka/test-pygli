<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStep1Request;
use Illuminate\Http\Request;

class RegisterStep1Controller extends Controller
{
    public function create(){
        return view('auth.register_step1');
    }

    public function store(RegisterStep1Request $request){
        session([
        'register_step1' => $request->only('name', 'email', 'password')
        ]);
        return redirect('register/step2');
    }
}
