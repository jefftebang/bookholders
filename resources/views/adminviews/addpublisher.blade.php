@extends('layouts.app')
@section('content')

<h1 class="text-center py-5 text-center text-3xl font-sans font-bold mt-24">Add Publisher</h1>
	
	@if(Session::has("message"))
        <h5 class="text-center my-5 py-2" style="color: yellowgreen; background-color: rgba(255,255,255, 50%);">{{Session::get('message')}}</h5>
    @endif	
	<div class="flex justify-center  mt-10 mb-20">
		<div class="w-full max-w-md">
			<form action="/addpublisher" method="POST" class="bg-white shadow-md px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
				@csrf
				<div class="mb-4">
					<input type="text" name="publisher" class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				</div>
				<div class="flex flex-col justify-center mt-10">
                    <button class="bg-green-700 hover:bg-green-500 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type="submit">Add</button>
                    <a href="/addbook" class="bg-green-700 hover:bg-green-500 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline text-center mt-5">Proceed</a>
				</div>
			</form>
		</div>
	</div>

@endsection