@extends('layouts.app')

@section('title', 'Форма обратной связи')

@section('content')
<div class="form">
    <x-message.error :errors='$errors'/>
    <form action="{{route('save')}}" method="post">
        @csrf
        <x-input.group for="login"  title="login:" >
            <x-input.text id="login" value='' name="login" place="Введите логин"/>
        </x-group>
        <x-input.group for="email"  title="email:" >
            <x-input.email id="email" value='' name="email" place="Введите почту" />
        </x-group>
        <x-input.group for="password"  title="Пароль:">
            <x-input.password id="password" value='' name="password" place="Введите пароль"/>
        </x-group>
        <x-input.group for="confirm"  title="Подтвержение:" >
            <x-input.password id="confirm" value='' name="confirm" place="Введите подтвержение пароля"/>
        </x-group>
        <x-input.submit/>
    </form>    
</div>
@endsection