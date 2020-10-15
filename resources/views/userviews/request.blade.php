@extends('layouts.app')
@section('content')

<h1 class="text-center py-5 text-center text-3xl font-sans font-bold">Request this Book</h1>
	
	<div class="flex justify-center  mt-10 mb-20">
		<div class="w-full max-w-md">
			<form action="/request/{{$book->id}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
				@csrf
				<div class="flex justify-center">
					<img src="{{asset($book->imgPath)}}" alt="">
				</div>
				<div class="mb-4">
					<label for="book_id" class="block text-gray-700 font-bold mb-2 mt-10">Book Title:</label>
					<h1 class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="book_id" value="{{$book->id}}">{{$book->title}}</h1>
					<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="book_id" value="{{$book->id}}" type="hidden">
				</div>
				<div class="mb-4">
					<label for="message" class="block text-gray-700 font-bold mb-2">Message:</label>
					<textarea name="message" cols="30" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline overflow-scroll" placeholder="Type your message here" maxlength="1000"></textarea>
				</div>
				<div class="flex items-center justify-center mt-10">
					<button type="submit" class="bg-green-700 hover:bg-green-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Send</button>
				</div>
			</form>
		</div>
	</div>

@endsection