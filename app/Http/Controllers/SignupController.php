<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SignupModel;
use App\CompanyInfoModel;
use Validator;
use Session;
use DB;

class SignupController extends Controller
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
    		$sign_up = new SignupModel;
    		$sign_up->username = $request->username;
    		$sign_up->email = $request->email;
    		$sign_up->password = bcrypt($request->password);
    		$sign_up->save();

			if ($sign_up->save()) {
				$comp = DB::table('tbl_user')->where('username', $request->username)->first();
				$user_id = $comp->id;

				$comp_info = new CompanyInfoModel;
				$comp_info->user_id = $user_id;
				$comp_info->company_name = $request->company_name;
				$comp_info->contact_person = $request->contact_person;
				$comp_info->email_address = $request->email;
				$comp_info->save();

				Session::flash('message', 'Registration Succesfull');
				return redirect('/');
			}else{
				return redirect()->back()->with('error', 'Registration Failed');
			}

    		//return redirect()->action('CompanyInfoController@store', [$request]);

    		// Session::flash('message', 'Success hoorah!');
    		// return view('user/homepage');
    	endif;
    }
}
