@extends('layouts.app')
@section('content')

{{-- For User --}}
@if(Auth::user()->role_id ==2)
    <h1 class="text-center py-5 text-center text-3xl font-sans font-bold">My Requests</h1>

<div class="flex justify-center my-10">
  <table class="table-fixed border">
    <thead>
      <tr>
        <th class="px-4 py-2 border-2">Book Title</th>
        <th class="px-4 py-2 border-2">Message</th>
        <th class="px-4 py-2 border-2">Status</th>
        <th class="px-4 py-2 border-2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($telegraphs as $indiv_tele)
      <tr>
        <td class="border px-4 py-2">{{$indiv_tele->book->title}}</td>
        <td class="border px-4 py-2">{{$indiv_tele->message}}</td>
        <td class="border px-4 py-2">{{$indiv_tele->status->name}}</td>
        <td class="border px-4 py-2 text-center">
          <a href="" class="py-1 px-5 text-xs bg-green-400">EDIT</a>
          <a href="" class="py-1 px-3 text-xs bg-red-600 ml-5">DELETE</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endif

@if(Auth::user()->role_id ==1)
    <h1 class="text-center py-5 text-center text-3xl font-sans font-bold">Requests List</h1>

<div class="flex justify-center my-10">
  <table class="table-auto border">
    <thead>
      <tr>
        <th class="px-4 py-2 border-2">User</th>
        <th class="px-4 py-2 border-2">Book Title</th>
        <th class="px-4 py-2 border-2">Message</th>
        <th class="px-4 py-2 border-2">Status</th>
        <th class="px-4 py-2 border-2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($telegraphs as $indiv_tele)
      <tr>
        <td class="border px-4 py-2">{{$indiv_tele->user->name}}</td>
        <td class="border px-4 py-2">{{$indiv_tele->book->title}}</td>
        <td class="border px-4 py-2">{{$indiv_tele->message}}</td>
        <td class="border px-4 py-2">{{$indiv_tele->status->name}}</td>
        <td class="border px-4 py-2 text-center">
          <a href="" class="py-1 px-5 text-xs bg-green-400">EDIT</a>
          <a href="" class="py-1 px-3 text-xs bg-red-600 ml-5">DELETE</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>  

@endif

@endsection