<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pygli</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>

<body>

<h1 class="logs-title__heading">PiGLy</h1><br />

<form method="POST" action="{{ route('weight_logs.update', $weightLog->id) }}">
    @csrf

    <div>
        <label>日付</label><br>
        <input type="date" name="date"
        value="{{ old('date', $weightLog->date) }}">
        @error('date')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>体重</label><br>
        <input type="text" name="weight" value="{{ old('weight', $weightLog->weight) }}">
        @error('weight')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>摂取カロリー</label><br>
        <input type="text" name="calories" value="{{ old('calories', $weightLog->calories) }}">
        @error('calories')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>運動時間</label><br>
        <input type="time" name="exercise_time" value="{{ old('exercise_time', $weightLog->exercise_time) }}">
        @error('exercise_time')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>運動内容</label><br>
        <textarea name="exercise_content">{{ old('exercise_content', $weightLog->exercise_content) }}</textarea>
    </div>

    <button type="submit">更新</button>
</form>

<form method="POST" action="{{ route('weight_logs.delete', $weightLog->id) }}">
    @csrf
    <button type="submit">削除</button>
</form>

<p>
    <a href="{{ route('weight_logs.index') }}">戻る</a>
</p>
</body>
</html>