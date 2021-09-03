<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $user->update([
           'password' => Hash::make($request->password),
        ]);
        return Redirect(route('users.index'))->with('message', 'Password Updated Successfully!!');
    }
}
