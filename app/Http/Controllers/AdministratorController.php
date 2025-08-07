<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\AdministratorLogin;
use Illuminate\Http\Request;
use Redirect;
use Hash;

class AdministratorController extends Controller
{
    public function registerForm()
    {
        return view("administrator.register");
    }

    public function register(Request $request)
    {
        $administrator = Administrator::where("username", $request->input("administrator_username"))->orWhere("email_address", $request->input("administrator_email_address"))->orWhere("phone_number", $request->input("administrator_phone_number"))->first();
        if($administrator != NULL){
            return Redirect::back()->with('uniqueConstraintErr', 'The username, email address, and phone number must be unique.');
        }

        $validated = $request->validate([
          'administrator_username' => 'required|unique:administrators',
          'administrator_first_name' => 'required',
          'administrator_last_name' => 'required',
          'administrator_email_address' => 'required|unique:administrators',
          'administrator_phone_number' => 'required|unique:administrators',
          'administrator_street_address' => 'required',
          'administrator_password' => 'required',
          'administrator_confirm_password' => 'required'
        ]);

        $password = $request->input('administrator_password');
        $confirmPassword = $request->input('administrator_confirm_password');

        if($password != $confirmPassword){
          return Redirect::back()->with('passwordErr', 'The entered passwords do not match.');
          die();
        }

        $hashedPassword = Hash::make($request->input("administrator_password"));

        $newAdministrator = new Administrator;
        $newAdministrator->username = $request->input('administrator_username');
        $newAdministrator->first_name = $request->input('administrator_first_name');
        $newAdministrator->middle_name = $request->input('administrator_middle_name');
        $newAdministrator->last_name = $request->input('administrator_last_name');
        $newAdministrator->email_address = $request->input('administrator_email_address');
        $newAdministrator->phone_number = $request->input('administrator_phone_number');
        $newAdministrator->street_address = $request->input('administrator_street_address');
        $newAdministrator->password = $hashedPassword;
        $newAdministrator->save();

        session()->flash('message', 'You have successfully registered at: '. $newAdministrator->created_at .'.');
        return redirect()->route('administrator_login_form');
    }

    public function loginForm()
    {
        return view("administrator.login");
    }

    public function login(Request $request)
    {
        $username =  $request->input("administrator_username");
        $password =  $request->input("administrator_password");

        $administrator = Administrator::where("username", $username)->first();
        //dd($administrator);
        //dd(Hash::check($password, $administrator->password));
        if(($administrator != NULL) && (Hash::check($password, $administrator->password))){
            session(["logged_in_administrator_id" => $administrator->id]);
            session(["logged_in_administrator_username" => $administrator->username]);
        } else {
            return Redirect::back()->withErrors(['msg' => "Invalid Credentials."]);
        }

        $administratorLogin = new AdministratorLogin;
        $administratorLogin->administrator_id = $administrator->id;
        $administratorLogin->logged_in = true;
        $administratorLogin->logged_in_at = time();
        $administratorLogin->save();

        session()->flash('message', 'You have successfully logged-in at: '. date('Y-m-d H:i:s', $administratorLogin->logged_in_at) .'.');
        return redirect()->route('user_index');
    }

    public function logout()
    {
        $administrator = Administrator::where("id", session("logged_in_administrator_id"))->first();
        if($administrator != NULL){
        $administratorLogin = AdministratorLogin::where("id", session("logged_in_administrator_id"))->first();
        if($administratorLogin != NULL){
            $administratorLogin->logged_in = false;
            $administratorLogin->logged_out_at = time();
            $administratorLogin->save();
        }
        
        session(["logged_in_administrator_id" => NULL]);
        session(["logged_in_administrator_username" => NULL]);
        
        session()->flash('message', 'You have successfully logged-out.');

        return redirect()->route('user_index');
        } else {
            return Redirect::back()->withErrors(['msg' => "Invalid Credentials."]);
        }
    }
    
}
