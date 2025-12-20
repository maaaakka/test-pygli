<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Http\Requests\WeightLogRequest;

class WeightLogController extends Controller
{

    public function index(Request $request)
    {
    $user = auth()->user();

    // 検索条件
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // 一覧クエリ
    $query = $user->weightLogs()->orderBy('date', 'desc');

    if ($startDate) {
        $query->whereDate('date', '>=', $startDate);
    }

    if ($endDate) {
        $query->whereDate('date', '<=', $endDate);
    }

    $weightLogs = $query->paginate(8)->withQueryString();

    // ===== サマリー =====
    $targetWeight = optional($user->weightTarget)->target_weight;

    $latestLog = $user->weightLogs()
        ->orderBy('date', 'desc')
        ->first();

    $latestWeight = optional($latestLog)->weight;

    $diffWeight = null;
    if ($latestWeight !== null && $targetWeight !== null) {
        $diffWeight = $latestWeight - $targetWeight;
    }

    return view('weight_logs.index', compact(
        'weightLogs',
        'startDate',
        'endDate',
        'targetWeight',
        'latestWeight',
        'diffWeight'
    ));
    }

    public function edit(WeightLog $weightLog)
    {
    // 他人のデータ防止
        if ($weightLog->user_id !== Auth::id()) {
        abort(403);
    }

        return view('weight_logs.edit', compact('weightLog'));
        }

    public function show(WeightLog $weightLog)
    {
    return view('weight_logs.show', compact('weightLog'));
    }

    public function update(WeightLogRequest $request, WeightLog $weightLog)
    {
    $weightLog->update([
        'date' => $request->date,
        'weight' => $request->weight,
        'calories' => $request->calories,
        'exercise_time' => $request->exercise_time,
        'exercise_content' => $request->exercise_content,
        ]);

        $weightLog->update($request->validated());

        return redirect()->route('weight_logs.index');
    }

    public function destroy(WeightLog $weightLog)
    {
        $weightLog->delete();

        return redirect()->route('weight_logs.index');
    }

    public function create()
    {
        return view('weight_logs.create');
    }

    public function store(WeightLogRequest $request)
    {
        WeightLog::create([
        'user_id' => Auth::id(),
        'date' => $request->date,
        'weight' => $request->weight,
        'calories' => $request->calories,
        'exercise_time' => $request->exercise_time,
        'exercise_content' => $request->exercise_content,
    ]);

        return redirect()->route('weight_logs.index');
    }

}
