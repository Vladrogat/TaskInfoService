@if ($errors->count())
    <div class="errors">
        @foreach ( $errors->all() as $error)

            <div class="error" role="alert">
                <p>{{$error}}</p>
            </div>

        @endforeach
    </div>
@endif