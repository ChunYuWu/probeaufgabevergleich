<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegisterController extends Controller
{
	/**
	 * Speichert ein User in der Datenbank
	 *
	 * return User
	 */
    public function register(Request $request){
		
		$user = new User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->passwort = bcrypt($request->password);
		$user->save();
		
		return $user;
	}
}
