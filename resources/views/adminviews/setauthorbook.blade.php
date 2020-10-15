@extends('layouts.app')
@section('content')

<h1 class="text-center py-5 text-center text-3xl font-sans font-bold">Set Author, Book and Quantity</h1>
	
	@if(Session::has("message"))
        <h5 class="text-center my-5 py-2" style="color: yellowgreen; background-color: rgba(255,255,255, 50%);">{{Session::get('message')}}</h5>
    @endif
	<div class="flex justify-center  mt-10 mb-20">
		<div class="w-full max-w-md">
			<form action="/setauthorbook" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
				@csrf
				<div class="mb-4 mt-5">
					<label for="author_id" class="block text-gray-700 font-bold">Author:</label>
					@foreach ($authors as $indiv_author)
						<input type="checkbox" class="mt-3" name="author_{{ $indiv_author->id }}" value="{{$indiv_author->id}}">
						<label for="author_id" class="text-gray-800">{{$indiv_author->name}}</label><br>
					@endforeach
				</div>
				<div class="mb-4">
					<label for="book_id" class="block text-gray-700 font-bold mb-2">Book Title:</label>
					<select type="select" name="book_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
						@foreach($books as $indiv_book)
							<option value="{{$indiv_book->id}}">{{$indiv_book->title}}</option>
						@endforeach
					</select>
				</div>
				<div class="mb-4">
					<label for="quantity" class="block text-gray-700 font-bold mb-2">Quantity:</label>
					<input type="number" name="quantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				</div>
				<div class="flex justify-center mt-10">
					<button type="submit" class="bg-green-700 hover:bg-green-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
				</div>
			</form>
		</div>
	</div>

@endsection