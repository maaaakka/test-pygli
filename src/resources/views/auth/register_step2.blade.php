@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="register">
    <h1 class="register__heading">PiGLy</h1>
    <h2 class="register__title">新規会員登録</h2>
    <h3 class="register__content">STEP2 体重データの入力</h3>

    <form method="post" action="/register/step2">
    @csrf
    <div class="form-group">
        <label>現在の体重</label>
            <div class="input-with-unit">
                <input type="text" name="current_weight" step="0.1" value="{{ old('current_weight') }}" placeholder="現在の体重を入力">
                <span class="unit">kg</span>
            </div>
            @error('current_weight')
            <p class="error">{{ $message }}</p>
            @enderror
    </div>

    <div class="form-group">
        <label>目標の体重</label>
            <div class="input-with-unit">
                <input type="text" name="target_weight" step="0.1" value="{{ old('target_weight') }}" placeholder="目標の体重を入力">
                <span class="unit">kg</span>

            @error('target_weight')
            <p class="error">{{ $message }}</p>
            @enderror
    </div>

    <button class="register__btn" type="submit">アカウント作成</button>
</form>
@endsection