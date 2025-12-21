@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register">
    <h1 class="register__heading">PiGLy</h1>
    <h2 class="register__title">新規会員登録</h2>
    <h3 class="register__content">STEP1 アカウント情報の登録</h3>

    <form method="POST" action="{{ route('register.step1') }}">
        @csrf

        {{-- お名前 --}}
        <div class="form-group">
            <label>お名前</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="お名前を入力"
            >
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- メールアドレス --}}
        <div class="form-group">
            <label>メールアドレス</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="メールアドレスを入力"
            >
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        {{-- パスワード --}}
        <div class="form-group">
            <label>パスワード</label>
            <input
                type="password"
                name="password"
                placeholder="パスワードを入力"
            >
            @error('password')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button class="register__btn">次へ進む</button>
    </form>

    <p class="register__login">
        <a href="{{ route('login') }}">ログインはこちら</a>
    </p>
</div>
@endsection