@extends('layouts.app')

@section('title', 'Форма обратной связи')

@section('content')
    <div class="applics">
        @foreach($applications as $application)
            <div class="application">
                <ul>
                    <li>{{$application->name}}</li>
                    <li>{{$application->phone}}</li>
                    <li>{{$application->company}}</li>
                    <li>{{$application->title}}</li>
                    <li><p>{{$application->message}}</p></li>
                    <li><img src="{{asset($application->file)}}"></li>
                </ul>

            </div>
        @endforeach
    </div>

@endsection
