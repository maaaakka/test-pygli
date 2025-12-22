<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pygli</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/goal_setting.css') }}">
</head>

<body class="goal-page">
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

<main class="goal-container">
    <div class="goal-box">
    <h2 class="goal-title">目標体重設定</h2>

    <form method="POST" action="{{ route('weight_logs.goal_setting.update') }}">
    @csrf

    <div class="form-group">
        <div class="input-with-unit">
            <input type="text"
            name="target_weight"
            step="0.1"
            value="{{ old('target_weight', optional($weightTarget)->target_weight) }}">
            <span class="unit">kg</span>
        </div>
    @error('target_weight')
        <p class="error">{{ $message }}</p>
    @enderror

    <div class="button-group">
                <a href="{{ route('weight_logs.index') }}" class="btn-back">
                    戻る
                </a>
                <button type="submit" class="btn-update">
                    更新
                </button>
            </div>
        </form>
    </div>

</main>

</body>
</html>