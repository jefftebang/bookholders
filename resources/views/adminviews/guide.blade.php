@extends('layouts.app')
@section('content')

<h1 class="text-center py-5 text-center text-3xl font-sans font-bold mt-24">Guide</h1>
	
	<div class="flex justify-center mt-10 mb-20">
		<div class="w-full max-w-md">
            <div class="mt-5 mb-10">
                <p class="font-bold text-center">Before you add a book, you must add first the following:</p>
                <ul class="text-center py-5">
                    <li class="py-2">1. Author(s).</li>
                    <li>2. Publisher.</li>
                </ul>
            </div>
            <div class="text-center">
                <a href="addauthor" class="bg-green-700 hover:bg-green-500 text-white font-bold py-2 px-4">Proceed</a>
            </div>
        </div>
    </div>    

@endsection