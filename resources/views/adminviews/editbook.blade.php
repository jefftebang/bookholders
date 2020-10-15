@extends('layouts.app')
@section('content')

<h1 class="text-center py-5 text-center text-3xl font-sans font-bold">Edit Book</h1>
	
	<div class="flex justify-center  mt-10 mb-20">
		<div class="w-full max-w-md">
			<form action="/editbook/{{$book->id}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="mb-4">
					<label for="title" class="block text-gray-700 font-bold mb-2">Book Title:</label>
					<input value="{{$book->title}}" type="text" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				</div>
				<div class="mb-4">
					<label for="publisher_id" class="block text-gray-700 font-bold mb-2">Publisher:</label>
					<select type="select" name="publisher_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
						@foreach($publishers as $indiv_publisher)
							<option value="{{$indiv_publisher->id}}">{{$indiv_publisher->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="mb-4">
					<label for="category_id" class="block text-gray-700 font-bold mb-2">Category:</label>
					<select type="select" name="category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
						@foreach($categories as $indiv_category)
						<option value="{{$indiv_category->id}}">{{$indiv_category->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="mb-4">
					<label for="language_id" class="block text-gray-700 font-bold mb-2">Language:</label>
					<select type="select" name="language_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
						@foreach($languages as $indiv_language)
						<option value="{{$indiv_language->id}}">{{$indiv_language->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="mb-4">
					<label for="condition_id" class="block text-gray-700 font-bold mb-2">Condition:</label>
					<select type="select" name="condition_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
						@foreach($conditions as $indiv_condition)
						<option value="{{$indiv_condition->id}}">{{$indiv_condition->name}}</option>
					@endforeach
					</select>
				</div>
				<div class="mb-4">
					<label for="imgPath" class="block text-gray-700 font-bold mb-2">Image:</label>
					<input type="file" name="imgPath" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				</div>
				<div class="flex items-center justify-center mt-10">
					<button type="submit" class="bg-green-700 hover:bg-green-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
				</div>
			</form>
		</div>
	</div>

@endsection