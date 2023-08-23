<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function viewPasswordPage()
    {
        return view('change-password.index');
    }


    public function updatePassword(Request $request)
    {

        request()->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'verify_password' => 'required'
        ]);

        $pass = auth()->user()->password;

        $current_password = request('current_password');
        $new_password = request('new_password');
        $confirm_password = request('verify_password');
        $hash = (\Illuminate\Support\Facades\Hash::check($current_password, $pass));
        $new = (\Illuminate\Support\Facades\Hash::check($new_password, $pass));
        $confirm = (\Illuminate\Support\Facades\Hash::check($confirm_password, $pass));


        if ($hash && $hash != $new && $hash != $confirm && $new == $confirm) {


            auth()->user()->update([
                'password' => Hash::make($new_password)
            ]);
            session()->flash('password_success', 'Password updated successfully');
            return back();
        } else if (\Illuminate\Support\Facades\Hash::check($current_password, $pass) && \Illuminate\Support\Facades\Hash::check($new_password, $pass) && \Illuminate\Support\Facades\Hash::check($confirm_password, $pass)) {
            session()->flash('password_failed', 'Old password provided');
            return back();
        } else {
            session()->flash('password_failed', 'Password Change failed');
            return back();
        }
    }
}
