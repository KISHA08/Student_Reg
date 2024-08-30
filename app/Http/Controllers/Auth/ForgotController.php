<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;

class ForgotController extends Controller
{
    
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }
  
    public function reset(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
     
        $user = User::where('username', $request->input('name'))->first();

        
        if (!$user || !Auth::attempt(['name' => $request->input('name'), 'password' => $request->input('current_password')])) {
            return back()->withErrors(['name' => 'Invalid credentials.']);
        }
    
        $user->password = Hash::make($request->input('password'));
        $user->save();
        Auth::logout();
        return redirect()->route('login')->with('status', 'Password has been reset successfully.');
    }
}