<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\WeightTarget;
use App\Http\Requests\WeightTargetRequest;

class WeightTargetController extends Controller
{
    // 表示
    public function edit()
    {
        $user = Auth::user();
        $weightTarget = $user->weightTarget;

        return view('weight_logs.goal_setting', compact('weightTarget'));
    }

    // 更新
    public function update(WeightTargetRequest $request)
    {
        $user = Auth::user();

        WeightTarget::updateOrCreate(
            ['user_id' => $user->id],
            ['target_weight' => $request->target_weight]
        );

        return redirect()
            ->route('weight_logs.index')
            ->with('success', '目標体重を更新しました');
    }
}