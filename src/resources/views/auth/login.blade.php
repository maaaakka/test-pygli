@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="register">
        <h1 class="register__heading">PiGLy</h1><br />
        <h2 class="register__title">ログイン</h2>

    <form method="post" action="/login">
    @csrf
    <div class="form-group">
        <label>メールアドレス</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレスを入力">
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label>パスワード</label>
        <input type="password" name="password" placeholder="パスワードを入力">
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="register__btn">ログイン</button>
</form>

    <p class="register__login">
        <a href="{{ route('register.step1') }}">アカウント作成はこちら</a>
    </p>

</body>
</html>