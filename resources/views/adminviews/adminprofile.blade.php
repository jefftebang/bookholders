@extends('layouts.app')
@section('content')

<h1 class="text-center py-5 text-center text-3xl font-sans font-bold">Account Settings</h1>

	@if(Session::has("message"))
        <h5 class="text-center my-5 py-2 ml-10" style="color: yellowgreen; background-color: rgba(255,255,255, 50%);">{{Session::get('message')}}</h5>
    @endif
	
	<div class="flex justify-center  mt-10 mb-20">
		<div class="w-full max-w-md">
			<form action="/adminprofile/{{$user->id}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
				@csrf
                @method('PATCH')
				<div class="mb-4">
					<label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
					<input value="{{$user->name}}" type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				</div>
                <div class="mb-4">
					<label for="email" class="block text-gray-700 font-bold mb-2" value="">Email:</label>
					<input value="{{$user->email}}" type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				</div>
                <div class="mb-4">
					<label for="password" class="block text-gray-700 font-bold mb-2" value="">New Password:</label>
					<input type="password" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none 	focus:shadow-outline">
				</div>
				{{-- <div class="mb-4">
					<label for="imgPath" class="block text-gray-700 font-bold mb-2">Image:</label>
					<input type="file" name="imgPath" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				</div> --}}
				<div class="flex items-center justify-center mt-10">
					<button type="submit" class="bg-teal-700 hover:bg-green-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
				</div>
			</form>
		</div>
	</div>

@endsection