<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pygli</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/register_step2.css') }}">
</head>


<body>
    <h1 class="register-title__heading">PiGLy</h1><br />
    <h2 class="register-title__middle">新規会員登録</h2><br />
    <h3 class="register-title__bottom">
        STEP2　体重データの入力</h3>

    <form method="post" action="/register/step2">
    @csrf
    <div class="register-form__group">
        <label class="register-form__label" for="current_weight">現在の体重</label>
        <input type="text" name="current_weight" value="{{ old('current_weight') }}">
        @error('current_weight')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div class="register-form__group">
        <label class="register-form__label" for="target_weight">目標の体重</label>
        <input type="text" name="target_weight" value="{{ old('target_weight') }}">
        @error('target_weight')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">アカウント作成</button>
</form>

<p class="register-form__login">
    <a href="/login">ログインはこちら</a>
</p>

</body>
</html>