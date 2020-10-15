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

class BookController extends Controller
{
    public function books(){
    	$books = Book::all();
        $authors = Author::find('id');
    	$categories = Category::all();
    	$languages = Language::all();
    	$conditions = Condition::all();

        return view('bookshelves', compact('books', 'categories', 'languages', 'conditions', 'authors'));
	}
    
    public function guideView(){
		
		return view('adminviews.guide');
	}

	public function addAuthorView(){
		
		return view('adminviews.addauthor');
	}

	public function addAuthor(Request $req){
		$need = array("author" => "required");

		$this->validate($req, $need);
		// dd($req);
	
		$newAuthor = new Author;
		$newAuthor->name = $req->author;
		
		$newAuthor->save();

		Session::flash("message", "$newAuthor->name has been added.");

		// redirect
    	return redirect('/addauthor');
	}

	public function addPublisherView(){
		
		return view('adminviews.addpublisher');
	}

	public function addPublisher(Request $req){

		$need = array("publisher" => "required");

		$this->validate($req, $need);
		// dd($req);
	
		$newPublisher = new Publisher;
		$newPublisher->name = $req->publisher;
		
		$newPublisher->save();

		Session::flash("message", "$newPublisher->name has been added."); 

		// redirect
        return redirect()->back();
    	// return view('adminviews.addbook', compact('publishers', 'categories', 'languages', 'conditions'));
	}

    public function produce(Request $req){
		$authors = Author::all();
		$publishers = Publisher::all();
    	$categories = Category::all();
    	$languages = Language::all();
		$conditions = Condition::all();

    	return view('adminviews.addbook', compact('authors', 'publishers', 'categories', 'languages', 'conditions'));
    }

    public function keep(Request $req){

    	// validate
    	$needs = array(
    		"title" => "required",
    		"publisher_id" => "required",
    		"category_id" => "required",
    		"language_id" => "required",
    		"condition_id" => "required",
    		"imgPath" => "required|image|mimes:jpeg, jpg, png, gif, tiff, tif, webp, bitmap|max:2048"
    	);

    	$this->validate($req, $needs);
    	// dd($req);

    	// capture
    	$newBook = new Book;
		$newBook->title = $req->title;
    	$newBook->publisher_id = $req->publisher_id;
    	$newBook->category_id = $req->category_id; 
    	$newBook->language_id = $req->language_id;
    	$newBook->condition_id = $req->condition_id;

    	// image handling
    	$image = $req->file('imgPath');
    	//rename the image
    	$image_name = time().".".$image->getClientOriginalExtension();

    	$target = "images/"; //corresponds to the public images directory

    	$image->move($target, $image_name);

    	$newBook->imgPath = $target.$image_name;

  //   	// save
    	$newBook->save();

		// redirect
    	return redirect('/setauthorbook');
    }

    public function setAuthorBookView(){
        $authors = Author::orderBy('name', 'ASC')->get();
        $books = Book::all();

        return view('adminviews.setauthorbook', compact('authors', 'books'));
    }

    public function setAuthorBook(Request $req){
        
        $authors = Author::all();
        $book = book::find($req->book_id);

        foreach($authors as $author){
            $authorId = "author_".$author->id;
            if($req->$authorId != null){
                // dd($req->$authorId);

            $book->authors()->attach($req->$authorId, ['quantity'=>$req->quantity]);
            }
        }

        Session::flash("message", "$book->title has been placed to shelf");

        // redirect
        return redirect('/bookshelves');
        
    }

    public function destroy($id){

        $deleteBook = Book::find($id);
        $deleteBook->delete();

        return redirect('/bookshelves'); 
    }

    public function editBookView($id){

        $book = Book::find($id);
        $publishers = Publisher::all();
        $categories = Category::all();
        $languages = Language::all();
        $conditions = Condition::all();

        return view('adminviews.editbook', compact('book', 'categories', 'languages', 'conditions', 'publishers'));
    }

    public function updateBook($id, Request $req){

        $editBook = Book::find($id);

        $needs = array(
            "title" => "required",
            "publisher_id" => "required",
            "category_id" => "required|numeric",
            "language_id" => "required",
            "condition_id" => "required",
            "imgPath" => "image|mimes:jpeg, jpg, png, gif, tiff, tif, webp, bitmap"
        );

        $this->validate($req, $needs);

        $editBook->title = $req->title;
        $editBook->publisher_id = $req->publisher_id;
        $editBook->category_id = $req->category_id;
        $editBook->language_id = $req->language_id;
        $editBook->condition_id = $req->condition_id;

        if($req->file('imgPath') != null){
            $image = $req->file('imgPath');
            $image_name = time(). ".".$image->getClientOriginalExtension();
            $target = "images/";
            $image->move($target, $image_name);
            $editBook->imgPath = $target.$image_name;
        }

        $editBook->save();

        Session::flash('message', "$editBook->title has been updated");

        return redirect('/bookshelves');
    }

    public function filter($id){
        $books = Book::where('category_id', $id)->get();
        $books = Book::where('language_id', $id)->get();
        $categories = Category::all();
        $languages = Language::all();

        return view('bookshelves', compact('books', 'categories', 'languages'));
    }

}
