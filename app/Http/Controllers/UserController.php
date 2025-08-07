<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Redirect;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        
        return view("user.index", ["users" => $users]);
    }

    public function create()
    {
      if(session("logged_in_administrator_id") != NULL){
        return view("user.create");
      } else {
        return Redirect::back()->with('message', 'You must be logged in to add a user.');
      }
    }

    public function store(Request $request)
    {
        if(session("logged_in_administrator_id") == NULL){
          return Redirect::back()->with('message', 'You are not authorized to perform this action.');
        } 

        $user = User::where("username", $request->input("user_username"))->orWhere("email_address", $request->input("user_email_address"))->orWhere("phone_number", $request->input("user_phone_number"))->first();
        if($user != NULL){
            return Redirect::back()->with('uniqueConstraintErr', 'The username, email address, and phone number must be unique.');
        }

        $validated = $request->validate([
          'user_username' => 'required|unique:users',
          'user_first_name' => 'required',
          'user_last_name' => 'required',
          'user_email_address' => 'required|unique:users',
          'user_phone_number' => 'required|unique:users',
          'user_street_address' => 'required'
        ]);

        $newUser = new User;
        $newUser->username = $request->input('user_username');
        $newUser->first_name = $request->input('user_first_name');
        $newUser->middle_name = $request->input('user_middle_name');
        $newUser->last_name = $request->input('user_last_name');
        $newUser->email_address = $request->input('user_email_address');
        $newUser->phone_number = $request->input('user_phone_number');
        $newUser->street_address = $request->input('user_street_address');
        $newUser->save();

        return redirect()->route('user_show', ['user' => $newUser]);
    }

    public function show(User $user)
    {
        return view("user.show", ["user" => $user]);
    }

    public function updateForm(User $user)
    {
      if(session("logged_in_administrator_id") != NULL){
        return view("user.update-form", ["user" => $user]);
      } else {
        return Redirect::back()->with('message', 'You must be logged in to add a user.');
      }
    }

    public function update(User $user, Request $request)
    {
      if(session("logged_in_administrator_id") == NULL){
          return Redirect::back()->with('message', 'You are not authorized to perform this action.');
      } 

        $user = User::where("username", $request->input("user_username"))->orWhere("email_address", $request->input("user_email_address"))->orWhere("phone_number", $request->input("user_phone_number"))->first();
        
        if(($user != NULL) && ($user->id != $request->input("user_id"))){
            return Redirect::back()->with('uniqueConstraintErr', 'The username, email address, and phone number must be unique.');
        }

        $validated = $request->validate([
          'user_id' => 'required',
          'user_username' => 'required',
          'user_first_name' => 'required',
          'user_middle_name' => 'required',
          'user_last_name' => 'required',
          'user_email_address' => 'required',
          'user_phone_number' => 'required',
          'user_street_address' => 'required'
        ]);

        $updatedUser = User::where('id', $request->input('user_id'))->first();
        if($updatedUser != NULL){
          $updatedUser->username = $request->input('user_username');
          $updatedUser->first_name = $request->input('user_first_name');
          $updatedUser->middle_name = $request->input('user_middle_name');
          $updatedUser->last_name = $request->input('user_last_name');
          $updatedUser->email_address = $request->input('user_email_address');
          $updatedUser->phone_number = $request->input('user_phone_number');
          $updatedUser->street_address = $request->input('user_street_address');
          $updatedUser->save();
        }

        return redirect()->route('user_show', ['user' => $updatedUser]);
    }

    public function delete(User $user, Request $request)
    {
        if(session("logged_in_administrator_id") == NULL){
            return Redirect::back()->with('message', 'You are not authorized to perform this action.');
        } 

        $validated = $request->validate([
          'user_id' => 'required'
        ]);

        $deletedUser = User::where('id', $request->input('user_id'))->first();
        if($deletedUser != NULL){
          $user->delete();
        }

        return redirect()->route('user_index', ['user' => $user]);
    }
}
