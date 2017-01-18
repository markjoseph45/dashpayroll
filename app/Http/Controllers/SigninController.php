<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\SigninModel;
use App\CompanyInfoModel;
use Validator;
use Session;
use Auth;
use DB;


class SigninController extends Controller
{
    public function login(Request $request)
    {
        $rules = array(
                'username' => 'required',
                'password' => 'required'
            );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()) {
            Session::flash('error','error');
            return redirect()->back()
                    ->withInput()
                    ->withErrors($validator);
        }else{
            $userdata = array(
                    'username' => Input::get('username'),   
                    'password' => Input::get('password')  
                );

            if(Auth::attempt($userdata)) {   // or if(Auth::attempt(['username' => $username, 'password' => $password])) {

                /*for selecting data in tbl_company_info*/

                //$users = DB::select('select * from tbl_company_info where company_name = ?',[$register->company_name]);
                $users = DB::table('tbl_company_info')->where('company_name', Input::get('company_name'))->first();
                $contact_personel = DB::table('tbl_company_info')->select('contact_person')->where('user_id', Auth::user()->id)->first();

                if(empty($users) || count($users) <= 0) {
                	$comp_info = new CompanyInfoModel;
                	$comp_info->user_id = Auth::user()->id;
                	$comp_info->company_name = Input::get('company_name');
                	$comp_info->email_address = Auth::user()->email;
                	$comp_info->contact_person = $contact_personel->contact_person;
                	$comp_info->save();

                    Session::flash('message','Welcome User');
                }
                //$request->session()->put('id', Auth::user()->id, 'username', Auth::user()->username, 'email', Auth::user()->email);
                session(['id' => Auth::user()->id, 'username' => Auth::user()->username, 'email' => Auth::user()->email]);
                return view('user.homepage');
            }else{
                Session::flash('error','Could not login, wrong credentials passed!');
                return redirect()->back();
            }

        }
    }
}
