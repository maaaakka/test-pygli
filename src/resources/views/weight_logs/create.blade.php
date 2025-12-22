<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pygli</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>

<body class="create-page">

<div class="overlay">

<div class="create-box">
    <h1 class="create-title">Weight Logを追加</h1>

    <form method="post" action="{{ route('weight_logs.store') }}">
        @csrf
    <!-- 日付 -->
    <div class="form-group">
        <label>
            日付
            <span class="required">必須</span>
        </label>
        <input type="date" name="date" value="{{ old('date') }}">
        @error('date')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <!-- 体重 -->
    <div class="form-group">
        <label>
            体重
            <span class="required">必須</span>
        </label>
        <div class="input-with-unit">
            <input type="number" step="0.1" name="weight" value="{{ old('weight') }}" placeholder="50.0">
            <span class="unit">kg</span>
        </div>
        @error('weight')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <!-- 摂取カロリー -->
    <div class="form-group">
        <label>
            摂取カロリー
            <span class="required">必須</span>
        </label>
        <div class="input-with-unit">
            <input type="number" name="calories" value="{{ old('calories') }}" placeholder="1200">
            <span class="unit">kcal</span>
        </div>
        @error('calories')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <!-- 運動時間 -->
    <div class="form-group">
        <label>
            運動時間
            <span class="required">必須</span>
        </label>
        <input type="time" name="exercise_time" value="{{ old('exercise_time') }}" placeholder="00:00">
        @error('exercise_time')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
    <label>
        運動内容
    </label>

    <input
        type="text"
        name="exercise_content"
        value="{{ old('exercise_content') }}"
        placeholder="運動内容を追加"
    >

    @error('exercise_content')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<!-- ボタン -->
        <div class="button-group">
            <a href="{{ route('weight_logs.index') }}" class="btn-back">戻る</a>
            <button type="submit" class="btn-submit">登録</button>
        </div>
        </form>
    </div>
</div>

</body>
</html>