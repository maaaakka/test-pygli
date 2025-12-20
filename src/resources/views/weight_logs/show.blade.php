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

<body>
    <h2>WeightLog</h2>

<form method="POST" action="{{ route('weight_logs.update', $weightLog) }}">
    @csrf

    <label>日付</label>
    <input type="date" name="date" value="{{ old('date', $weightLog->date) }}">
    @error('date')
    <div style="color:red">{{ $message }}
    </div>
    @enderror

    <label>体重</label>
    <input type="text" name="weight" value="{{ old('weight', $weightLog->weight) }}"> kg
    @error('weight')
    <div style="color:red">{{ $message }}</div>
    @enderror

    <label>摂取カロリー</label>
    <input type="number" name="calories" value="{{ old('calories', $weightLog->calories) }}">
    @error('calories')
    <div style="color:red">{{ $message }}
    </div>
    @enderror

    <label>運動時間</label>
    <input type="time" name="exercise_time"
        value="{{ old('exercise_time', $weightLog->exercise_time) }}">
    @error('exercise_time')
    <div style="color:red">{{ $message }}
    </div>
    @enderror

    <label>運動内容</label>
    <textarea name="exercise_content">{{ old('exercise_content', $weightLog->exercise_content) }}
    </textarea>
    @error('exercise_content')
    <div style="color:red">{{ $message }}
    </div>
    @enderror

    <div style="margin-top:20px">
        <a href="{{ route('weight_logs.index') }}">戻る</a>
        <button type="submit">更新</button>
    </div>
</form>

{{-- 削除ボタン（小さく） --}}
<form method="POST" action="{{ route('weight_logs.delete', $weightLog) }}">
    @csrf
    <button type="submit" style="font-size:12px;color:red">🗑
    </button>
</form>
</body>
</html>