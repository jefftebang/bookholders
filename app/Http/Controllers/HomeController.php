<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use \App\Language;
use \App\Condition;
use \App\Book;
use \App\Author;
use \App\Publisher;
use Session;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $authors = Author::find('id');
    	$categories = Category::all();
    	$languages = Language::all();
    	$conditions = Condition::all();

        return view('bookshelves', compact('books', 'categories', 'languages', 'conditions', 'authors'));
    }
}
