<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
<div class="flex flex-col">
    @if(Route::has('login'))
        <div class="absolute z-10 top-0 right-0 mt-4 mr-4">
            @auth
                <a href="{{ url('/bookshelves') }}" class="no-underline hover:underline text-lg font-normal text-white uppercase py-2 px-3">{{ __('Home') }}</a>
            @else
                <a href="{{ route('login') }}" class="no-underline hover:underline text-lg font-normal text-white uppercase py-2 px-5" style="background-color: rgba(50,143,143, 45%)">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="no-underline hover:underline text-lg font-normal text-white uppercase bg-teal-700 py-2 px-5" style="background-color: rgba(50,143,143, 45%)">{{ __('Register') }}</a>
                @endif
            @endauth
        </div>
    @endif
    <div class=" bg-cover bg-center">
        <img src="{{asset('/images/books-bg.gif')}}" alt="" class="w-screen h-screen absolute">
    </div>
    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col justify-around h-full">
            <div>
                <h1 class="relative z-10 text-white text-center tracking-wider mb-6 text-6xl">
                    BOOKHOLDERS
                    {{-- {{ config('app.name', 'Book Holders') }} --}}
                </h1>
                {{-- <ul class="list-reset">
                    <li class="inline pr-8">
                        <a href="https://laravel.com/docs" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Documentation">Documentation</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="https://laracasts.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Laracasts">Laracasts</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="https://laravel-news.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="News">News</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="https://nova.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Nova">Nova</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="https://forge.laravel.com" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="Forge">Forge</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="https://github.com/laravel/laravel" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase" title="GitHub">GitHub</a>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
</div>
</body>
</html>
