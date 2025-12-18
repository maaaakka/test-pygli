<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pygli</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/register_step1.css') }}">
    @yield('css')
</head>

<body>
    <h1 class="register__heading">会員登録</h1>

    <form method="post" action="/register/step1">
    @csrf
    <div class="register-form__group">
        <label class="register-form__label" for="name">お名前</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
        <div style="color:red">{{ $message }}</div>
        @enderror
    </div>

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

    <button type="submit">次に進む</button>
</form>

<p class="register-form__login">
    <a href="/login">ログインはこちら</a>
</p>

</body>
</html>