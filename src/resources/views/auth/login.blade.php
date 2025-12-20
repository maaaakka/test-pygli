<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pygli</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <h1 class="register-title__heading">PiGLy</h1><br />
    <h2 class="register-title__middle">ログイン</h2>

    <form method="post" action="/login">
    @csrf
    <div class="register-form__group">
        <label class="register-form__label" for="email">メールアドレス</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <div class="register-form__group">
        <label class="register-form__label" for="password">パスワード</label>
        <input type="password" name="password">
        @error('password')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">ログイン</button>
</form>

<p class="register-form__register">
    <a href="/register_step1">アカウント作成はこちら</a>
</p>

</body>
</html>