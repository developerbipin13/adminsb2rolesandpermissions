<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;
use Exception;

class ChangePasswordController extends Controller
{
    public function showForm()
    {
    	return view('auth.passwords.change');
    }

    public function change(ChangePasswordRequest $request)
    {
    	User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);
        return redirect()->back()->with('success','Password Changed Successfully');
    }
}
