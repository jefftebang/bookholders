<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Auth;

class RoleController extends Controller
{

		public function adminProfileView (){

			$user = Auth::user();

			return view('adminviews.adminprofile', compact('user'));
		}

    	public function adminUpdateProfile($id, Request $req){
        
	        $user = Auth::user()->$id; 

	        $needs = array(
            "name" => "required",
            "email" => "required",
            "password" => "required"
        );

        	$this->validate($req, $needs);

			$user->name = $req->name;
	    	$user->email = $req->email;
	    	$user->password = $req->password;


	    	$user->save(); 

	    	Session::flash('message', "$user->name profile has been updated");

	        return redirect()->back();

    }
}
