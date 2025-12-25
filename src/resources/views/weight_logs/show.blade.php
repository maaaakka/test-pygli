<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pygli</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>

<body class="page-bg">

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

    <div class="box">
        <h2 class="box__title">Weight Log</h2>

        <form method="POST" action="{{ route('weight_logs.update', $weightLog->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>日付</label>
                <input type="date" name="date" value="{{ $weightLog->date }}">
                @error('date')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>体重</label>
                <div class="input-unit">
                    <input type="number" step="0.1" name="weight" value="{{ $weightLog->weight }}">
                    <span>kg</span>
                </div>
                @error('weight')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>摂取カロリー</label>
                <div class="input-unit">
                    <input type="number" name="calories" value="{{ $weightLog->calories }}">
                    <span>cal</span>
                </div>
                @error('calories')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>運動時間</label>
                <input type="time" name="exercise_time" value="{{ $weightLog->exercise_time }}">
                @error('exercise_time')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>運動内容</label>
                <textarea name="exercise_content" rows="4">{{ $weightLog->exercise_content }}</textarea>
                @error('exercise_content')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="btn-area">
                <a href="{{ route('weight_logs.index') }}" class="btn-back">戻る</a>
                <button type="submit" class="btn-update">更新</button>
            </div>
        </form>

        <form method="POST"
                action="{{ route('weight_logs.delete', $weightLog->id) }}"
                class="delete-form">
                @csrf
            <button type="submit" class="delete-btn">🗑</button>
        </form>
    </div>

</main>

</body>
</html>