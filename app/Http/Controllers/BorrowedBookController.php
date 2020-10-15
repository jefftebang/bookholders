<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Book;
use \App\Telegraph;
use \App\Category;
use \App\Publisher;
use \App\Language;
use \App\Condition;
use Auth;
use Session;

class BorrowedBookController extends Controller
{
    public function requestView($id){

    	$book = Book::find($id);
		
		return view('userviews.request', compact('book'));
	}

	public function requestbtn($id, Request $req){

		$book = Book::find($id);
		$books = Book::all();
		$categories = Category::all();
		$publishers = Publisher::all();
		$languages = Language::all();
    	$conditions = Condition::all();

		$needs = array(
            "book_id" => "required",
            "message" => "required"
        );
		// dd($req);
        $this->validate($req, $needs);
		
    	$newTelegrah = new Telegraph;
    	$newTelegrah->user_id = Auth::user()->id;
    	$newTelegrah->book_id = $req->book_id;
    	$newTelegrah->message = $req->message;
    	$newTelegrah->status_id = 1;
    	$newTelegrah->save();

    	Session::flash('message', "Request for $book->title has been sent");

		return view('/bookshelves', compact('book', 'categories', 'publishers', 'languages', 'conditions', 'books'));
	}
	
	public function reqList(){

		$telegraphs = Telegraph::where('user_id', Auth::user()->id)->get();

		// $telegraphs = Telegraph::all();
		$books = Book::all();


		return view('/requestslist', compact('telegraphs', 'books'));
	}
}
