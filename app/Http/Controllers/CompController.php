<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comp_info;
use App\Dash;
use DB;

class CompController extends Controller
{
	public function index()
	{
		dd('s');
	}

	public function store(Request $request)
	{
		$comp = DB::table('tbl_user')->where('username', $request->username)->first();
		$user_id = $comp->id;

		$comp_info = new Comp_info;
		$comp_info->user_id = $user_id;
		$comp_info->company_name = $request->company_name;
		$comp_info->contact_person = $request->contact_person;
		$comp_info->email_address = $request->email;
		$comp_info->save();

		return redirect('/');

	}
}
