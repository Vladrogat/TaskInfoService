@extends('layouts.app')

@section('title', 'Обратная связь')

@section('content')
    <div class="form">
        <x-message.error :errors='$errors'/>
        @if (session('success'))
        <x-message.success :message="session('success')"/>
        @endif

        <form method="post" action="{{route('feedback')}}">

            @csrf

            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">
                    <x-input.group name="name" for='name' title="Имя" :errors="$errors">
                        <x-input.text id="name" name="name" value="{{ old('name') }}" :errors="$errors" place='Введите имя'/>
                    </x-input.group>
                    <x-input.group name="phone" for='phone' title="Телефон" :errors="$errors">
                        <x-input.tel id="phone" name="phone" value="{{ old('phone') }}" :errors="$errors"/>
                    </x-input.group>
                    <x-input.group name="company" for='company' title="Компания" :errors="$errors">
                        <x-input.text id="company" name="company" value="{{ old('company') }}" :errors="$errors" place='Введите название компании'/>
                    </x-input.group>
                    <x-input.group name="title" for='title' title="Заголовок" :errors="$errors">
                        <x-input.text id="title" name="title" value="{{ old('title') }}" place='Введите название заявки'/>
                    </x-input.group>
                    <x-input.group name="message" for='message' title="Сообщение" :errors="$errors">
                        <x-input.textarea id="message" name="message" value="{{ old('message') }}" place='Введите описание'/>
                    </x-input.group>
                    <div class="file">
                       <p>Прикрепить файл</p>
                        <x-input.file id="body_field" name="file"/>
                    </div>
                    <div class="block">
                        <x-input.submit/>                       
                    </div>
                </div>

            </div>

        </form>

    </div>
@endsection