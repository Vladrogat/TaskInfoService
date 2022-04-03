@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')
<div class="form">
    <x-message.error :errors='$errors'/>
    <form action="{{route('login')}}" method="post">
        @csrf
        <x-input.group for="email"  title="email:">
            <x-input.email id="email" value='' name="email" place="Введите почту"/>
        </x-group>
        <x-input.group for="password"  title="Пароль:">
            <x-input.password id="password" value='' name="password" place="Введите пароль"/>
        </x-group>
        <x-input.submit/>
    </form>    
</div>

@endsection