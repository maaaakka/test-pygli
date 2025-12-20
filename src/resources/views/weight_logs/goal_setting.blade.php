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

<body>
    <h1 class="logs-title__heading">PiGLy</h1>
    <h2>目標体重設定</h2>

    <form method="POST" action="{{ route('weight_logs.goal_setting.update') }}">
    @csrf

    <label>目標体重</label>
    <input type="text"
        name="target_weight"
        value="{{ old('target_weight', optional($weightTarget)->target_weight) }}">
    kg

    @error('target_weight')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <div style="margin-top:20px">
        <a href="{{ route('weight_logs.index') }}">戻る</a>
        <button type="submit">更新</button>
    </div>
</form>
</body>
</html>