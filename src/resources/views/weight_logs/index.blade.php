<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body class="index-page">

<header class="header">
    <h1 class="header__logo">PiGLy</h1>

    <div class="header__actions">
        <a href="{{ route('weight_logs.goal_setting') }}" class="header-btn">
            目標体重設定
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="header-btn logout">ログアウト</button>
        </form>
    </div>
</header>

<main class="container">

    <div class="summary">
        <div class="summary-item">
            <p>目標体重</p>
            <p class="weight">{{ number_format($targetWeight,1) }}<span class="unit">kg</span></p>
        </div>
        <div class="summary-item">
            <p>目標まで</p>
            <p class="weight">{{ number_format($diffWeight,1) }}<span class="unit">kg</span></p>
        </div>
        <div class="summary-item">
            <p>最新体重</p>
            <p class="weight">{{ number_format($latestWeight,1) }}<span class="unit">kg</span></p>
        </div>
    </div>

    <div class="actions">
        <form method="GET" class="search-form">
            <input type="date" name="start_date" value="{{ $startDate }}">
            <span>〜</span>
            <input type="date" name="end_date" value="{{ $endDate }}">
            <button type="submit" class="btn-search">検索</button>

            @if($startDate || $endDate)
                <a href="{{ route('weight_logs.index') }}" class="reset-btn">リセット</a>
            @endif
        </form>

        <a href="{{ route('weight_logs.create') }}" class="btn-add">
            ＋ データを追加
        </a>
    </div>
    @if($startDate || $endDate)
                <p class="search-result">
                {{ $startDate ?? '---' }} 〜 {{ $endDate ?? '---' }} の検索結果
                {{ $weightLogs->total() }}件
                </p>
            @endif

    <table class="table">
        <thead>
            <tr>
                <th>日付</th>
                <th>体重</th>
                <th>摂取カロリー</th>
                <th>運動時間</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($weightLogs as $log)
            <tr>
                <td>{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>
                <td>{{ number_format($log->weight,1) }}kg</td>
                <td>{{ $log->calories }}kcal</td>
                <td>{{ substr($log->exercise_time,0,5) }}</td>
                <td>
                    <a href="{{ route('weight_logs.show', $log->id) }}">✏️</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ===== ページネーション ===== -->
    <div class="pagination">
        {{ $weightLogs->links() }}
    </div>

</main>

</body>
</html>