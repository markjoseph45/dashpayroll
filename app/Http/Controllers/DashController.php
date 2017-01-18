<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dash;
use Validator;
use Session;

class DashController extends Controller
{
  
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    			'company_name' => 'required|max:50',
    			'contact_person' => 'required|max:50',
    			'email' => 'required|email|max:50',
    			'username' => 'required|max:35|unique:tbl_user',
    			'password' => 'required|min:6',
    		]);

    	if ($validator->fails()) :
    		return redirect()->back()
    			 ->withInput()
    			 ->withErrors($validator);
    	else:
    		$dash = new Dash;
    		$dash->username = $request->username;
    		$dash->email = $request->email;
    		$dash->password = bcrypt($request->password);
    		$dash->save();

    		return redirect()->action('CompController@store', [$request]);

    		// Session::flash('message', 'Success hoorah!');
    		// return view('user/homepage');
    	endif;
    }
}
