@extends('layouts.app')
@section('content')

    <div class="w-2/12 ml-10 static fixed">
        <div class="flex">
            <form class="" action="/search" method="POST">
                 @csrf
                <div class="input-group text-center mb-10">
                    <input type="" name="" class="py-1 border border-gray-500 text-xs" placeholder="Search here e.g. title">
                    <div class="py-3 mb-4 input-group-append">
                        <button class="text-white text-sm px-3 py-1 bg-teal-700 hover:bg-orange-500" type="submit">Search</button>
                    </div>
                </div>
            </form>
            <div class="border-r-2 border-gray-600 h-full absolute ml-56"></div>
        </div>

        <h4 class="mb-2">Filter by Category</h4>

        <ul>
            @foreach($categories as $category)
                <li class="mt-1 ml-5">
                    <a href="/bookshelves/{{$category->id}}" class="text-xs hover:text-orange-500">{{$category->name}}</a>
                </li>
            @endforeach
        </ul>

        <h4 class="mb-2 mt-10">Filter by Language</h4>

        <ul>
            @foreach($languages as $language)
                <li class="mt-1 ml-5">
                    <a href="/bookshelves/{{$language->id}}" class="text-xs hover:text-orange-500">{{$language->name}}</a>
                </li>
            @endforeach
        </ul>

        <ul>
            <li class="mt-5">
                <a href="/bookshelves" class="hover:text-orange-500">Reset filter</a>
            </li>
        </ul>
    </div>
    <div class="flex justify-end">
        <div class="h-screen" style="width: 80%">
            <h1 class="text-center text-3xl font-sans font-bold py-5">BOOKS</h1>
            
            @if(Session::has("message"))
                <h5 class="text-center my-5 py-2 ml-10" style="color: yellowgreen; background-color: rgba(255,255,255, 50%);">{{Session::get('message')}}</h5>
            @endif
            <div class="flex flex-wrap mt-16">
                @foreach($books as $indiv_book)
                    <div class="w-2/12 shadow bg-gray-100 border py-2 px-2 text-center ml-10 mb-10" style="height: 27rem">
                        <div class="flex justify-center mt-3">
                            <img src="{{asset($indiv_book->imgPath)}}" alt="" class="h-48 w-auto">
                        </div>
                        
                        <div class="items-baseline">
                            <h1 class="text-lg mt-3">{{$indiv_book->title}}</h1>
                            <br>
                            {{-- <h3 class="text-sm">
                                    Author:
                            @foreach($authors as $indiv_author)
                                {{$indiv_author->id}}
                            @endforeach
                            </h3>
                            <br> --}}
                            <h3 class="text-sm">Publisher: {{$indiv_book->publisher->name}}</h3>
                            <br>
                            <span class="text-sm bg-gray-400 px-1 rounded-lg">
                                #{{$indiv_book->category->name}}
                            </span>
                            <br><br>
                            <span class="ml-2 text-sm bg-gray-400 px-1 rounded-lg">
                                #{{$indiv_book->language->name}}
                            </span>
                            <span class="ml-2 text-sm bg-gray-400 px-1 rounded-lg">
                                #{{$indiv_book->condition->name}}
                            </span>
                        </div>
                        @if(Auth::user()->role_id ==1)
                        <div class="flex justify-center mt-5">
                            <form action="" method="POST">
                                @csrf
                                @method('PATCH')
                                <a href="editbook/{{$indiv_book->id}}" class="bg-orange-600 py-3 px-5  text-lg font-bold text-white hover:bg-yellow-400 hover:text-blue-900" type="submit">EDIT</a>
                            </form>
                            <form action="/deletebook/{{$indiv_book->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/deletebook/{{$indiv_book->id}}" class="bg-teal-700 py-3 px-4 text-lg font-bold text-white hover:bg-red-500 hover:text-blue-900" type="submit">DELETE</a>
                            </form>
                        </div>
                        @endif
                        @if(Auth::user()->role_id ==2)
                        <a href="/request/{{$indiv_book->id}}" class="bg-blue-700 py-3 px-4 text-lg font-bold text-white hover:bg-orange-500 hover:text-green-700 mt-3" type="submit">BORROW</a>   
                        @endif 
                    </div>
                @endforeach    
            </div>
        </div>
    </div>

@endsection