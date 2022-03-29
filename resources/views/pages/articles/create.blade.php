@extends('layouts.app')

@section('title', 'Создание новости')

@section('content')
<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Веб-форма</h1>
        <x-message.error :errors='$errors'/>
        @if (session('success'))
        <x-message.success :message="session('success')"/>            
        @endif

        <form method="post" action="{{route('create')}}">

            @csrf

            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">
                    <x-input.group name="title" for='title_field' title="Заголок" :errors="$errors">
                        <x-input.text id="title_field" name="title" value="{{ old('title') }}" :errors="$errors" place='Введите заголовок новости'/>
                    </x-input.group>
                    <x-input.group name="description" for='description_field' title="Краткое описание" :errors="$errors">
                        <x-input.text id="description_field" name="description" value="{{ old('description') }}" place='Введите краткое описание'/>
                    </x-input.group>
                    <x-input.group name="body" for='body_field' title="Детальное описание" :errors="$errors">
                        <x-input.textarea id="body_field" name="body" value="{{ old('body') }}" place='Введите описание'/>
                    </x-input.group>

                    <div class="block">
                        <div class="mt-2">
                            <x-input.checkbox name="published" text="Опубликован"/>
                        </div>
                    </div>

                    <div class="block">
                        <x-input.buttonRedhead/>
                        <x-input.buttonGrey/>                        
                    </div>
                </div>

            </div>

        </form>

    </div>
</main>
@endsection