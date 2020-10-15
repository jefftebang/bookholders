<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">
        <nav class="sticky fixed top-0 bg-teal-800 shadow mb-8 py-6">
            <div class="container mx-auto px-6 md:px-0">
                <div class="flex items-center justify-center">
                    <div class="mr-6 border-r-2 pr-10">
                        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                            {{ config('app.name', 'Book Holders') }}
                        </a>
                    </div>
                    <div class="ml-3">
                        <a href="/bookshelves" class="text-sm font-semibold text-gray-100 no-underline">
                            Books
                        </a>
                        @if(Auth::user()->role_id ==1)
                        <a href="/guide" class="text-sm font-semibold text-gray-100 no-underline ml-8">
                            Add Book
                        </a>
                        @endif
                        {{-- <a href="" class="text-sm font-semibold text-gray-100 no-underline ml-8">
                            Borrowed Books
                        </a> --}}
                        @if(Auth::user()->role_id ==1)
                        <a href="/requestslist" class="text-sm font-semibold text-gray-100 no-underline ml-8">
                            Requests
                        </a>
                        @endif
                        @if(Auth::user()->role_id ==2)
                        <a href="/requestslist" class="text-sm font-semibold text-gray-100 no-underline ml-8">
                            My Requests
                        </a>
                        @endif
                        {{-- <a href="" class="text-sm font-semibold text-gray-100 no-underline ml-8">
                            Online Users
                        </a> --}}
                    </div>
                    <div class="flex-1 text-right">
                        @guest
                            <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <span class="text-gray-300 text-md pr-4"><a href="adminprofile">{{ Auth::user()->name }}</a></span>

                            <a href="{{ route('logout') }}"
                               class="no-underline hover:underline text-gray-300 text-md p-3"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
