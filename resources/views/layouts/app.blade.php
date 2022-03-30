<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <x-panels.style/>
    <title>@yield('title')</title>
    <link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
</head>
<body>

    <script src="https://unpkg.com/vue@3"></script>
    
    <div class="container h-100">
        <x-panels.header/>

        <main class="middle w-100 d-flex justify-center mt-5 b-r-5">
            @yield('content')
        </main>

        <x-panels.footer/>
    </div> 
    
    <x-panels.scripts/>
</body>
</html>
