<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pygli</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <h1 class="logs-title__heading">PiGLy</h1><br />
    
    <p class="heading-btn">
        <a href="{{ route('weight_logs.goal_setting') }}">
        目標体重設定</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit" class="logout-btn">
        ログアウト
        </button>
        </form>
    </p>


    <div class="summary">
    <div class="summary-item">
        <p>目標体重</p>
        <p class="weight">
            {{ $targetWeight !== null ? number_format($targetWeight, 1) : '--' }}
            <span class="unit">kg</span>
        </p>
    </div>

    <div class="summary-item">
        <p>目標まで</p>
        <p class="weight">
            {{ $diffWeight !== null ? number_format($diffWeight, 1) : '--' }}
            <span class="unit">kg</span>
        </p>
    </div>

    <div class="summary-item">
        <p>最新体重</p>
        <p class="weight">
            {{ $latestWeight !== null ? number_format($latestWeight, 1) : '--' }}
            <span class="unit">kg</span>
        </p>
    </div>
</div>

<form method="GET" action="{{ route('weight_logs.index') }}" class="search-form">
    <input type="date" name="start_date" value="{{ $startDate }}">
    〜
    <input type="date" name="end_date" value="{{ $endDate }}">

    <button type="submit">検索</button>

    @if($startDate || $endDate)
        <a href="{{ route('weight_logs.index') }}">リセット</a>
    @endif
</form>
@if($startDate || $endDate)
    <p class="search-result">
        {{ $startDate ?? '---' }} 〜 {{ $endDate ?? '---' }} の検索結果
        {{ $weightLogs->total() }}件
    </p>
@endif

<p class="confirm-btn">
    <a href="{{ route('weight_logs.create') }}">＋ データを追加</a>
    </p>
    <form id="logout-form" action="/logout" method="POST" style="display:none;">
    @csrf
</form>

<table border="1">
    <tr>
        <th>日付</th>
        <th>体重</th>
        <th>摂取カロリー</th>
        <th>運動時間</th>
        <th>運動内容</th>
        <th>編集</th>
    </tr>

    @foreach ($weightLogs as $log)
        <tr>
            <td>{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>
            <td>{{ $log->weight }} kg</td>
            <td>{{ $log->calories }} cal</td>
            <td>{{ $log->exercise_time }}</td>
            <td>{{ $log->exercise_content }}</td>
            <td>
    <a href="{{ route('weight_logs.show', $log->id) }}">✏️</a>
</td>
        </tr>
    @endforeach
</table>

{{ $weightLogs->links() }}
</body>
</html