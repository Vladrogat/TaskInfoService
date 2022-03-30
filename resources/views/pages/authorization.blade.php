@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')
<div class="form">
    <form action="{{route('home')}}" method="post">
        @csrf
        <x-input.group for="login"  title="Логин/email:">
            <x-input.text id="login" value='' name="login" place="Введите логин или почту"/>
        </x-group>
        <x-input.group for="password"  title="Пароль:">
            <x-input.text id="password" value='' name="password" place="Введите пароль"/>
        </x-group>
        <x-input.submit/>
    </form>    
</div>

@endsection