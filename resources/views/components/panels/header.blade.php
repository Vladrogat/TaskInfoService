<header class="">
    <div class="h-100 head">
        <ul class="menu">
            @if (isset($_SESSION['authorized']))
            <li>
                login
            </li>
            <li>
                Выйти
            </li>
            @else
            <li >
                <a class="middle" href="{{route('registration')}}">
                    Регистрация
                </a>
            </li>
            <li >
                <a class="middle" href="{{route('authorization')}}">
                    Авторизация
                </a>
            </li>
            @endif
        </ul>
    </div>

    <div class="w-100 chapters">
        <ul class="menu">
            <li class="chapter">
                <a class=" middle" href="{{route('feedback')}}">
                    Форма обратной связи
                </a>
            </li>
            @if (isset($_SESSION['authorized']))
                <li class="chapter">
                    <a class=" middle" href="{{route('list')}}">
                        Список заявок
                    </a>
                </li>                
            @endif

        </ul>
    </div>

</header>