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

<form method="POST" action="{{ route('weight_logs.store') }}">
    @csrf

    <div>
        <label>日付</label><br>
        <input type="date" name="date" value="{{ date('Y-m-d') }}">
    </div>

    <div>
        <label>体重</label><br>
        <input type="text" name="weight" value="{{ old('weight') }}">
        @error('weight')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>摂取カロリー</label><br>
        <input type="text" name="calories" value="{{ old('calories') }}">
        @error('calories')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>運動時間</label><br>
        <input type="time" name="exercise_time" value="{{ old('exercise_time') }}">
        @error('exercise_time')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>運動内容</label><br>
        <textarea name="exercise_content" value="{{ old('exercise_content') }}"></textarea>
        @error('exercise_content')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">登録</button>
</form>

<p>
    <a href="{{ route('weight_logs.index') }}">戻る</a>
</p>
</body>
</html>