<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStep2Request;
use App\Models\User;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Hash;

class RegisterStep2Controller extends Controller
{
    public function create()
    {
        // Step1を通っていない場合は戻す
        if (!session()->has('register_step1')) {
            return redirect('/register/step1');
        }

        return view('auth.register_step2');
    }

    public function store(RegisterStep2Request $request)
    {
        $step1 = session('register_step1');

        // ユーザー作成
        $user = User::create([
            'name' => $step1['name'],
            'email' => $step1['email'],
            'password' => Hash::make($step1['password']),
        ]);

        // 目標体重登録
        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);

        // セッションクリア
        session()->forget('register_step1');

        return redirect('/login');
    }
}
