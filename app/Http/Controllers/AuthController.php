<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        // default method
    }

	public function register(Request $request)
		{
    if ($request->isMethod('get')) {
        return view('auth.auth-register', ['title_meta' => 'Register']);
    }

    // Validasi input
    $validator = Validator::make($request->all(), [
        'user_email' => 'required|min:8|max:50|email|unique:users,user_email',
        'user_name' => 'required|min:3|max:50',
        'user_password' => 'required|min:4|max:50|confirmed',
    ], [
        'user_password.required' => 'Password is required.',
        'user_password.confirmed' => 'Password and confirmation must match.'
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Simpan user baru
    $user = new User();
    $user->user_id = (string) Str::uuid(); // ✅ Buat ID unik
    $user->user_email = $request->input('user_email');
    $user->user_name = $request->input('user_name');
    $user->user_password = Hash::make($request->input('user_password'));
    $user->save();

    // **Coba login user setelah register**
    if (Auth::attempt(['user_email' => $request->input('user_email'), 'password' => $request->input('user_password')])) {
        return redirect('/home')->with('success', 'Registration successful! Welcome 🎉');
    }

    return redirect('/login')->with('success', 'Registration successful! Please login.');
}

    public function login(Request $request)
    {
		
        if ($request->isMethod('get')) {
            return view('auth.auth-login', ['title_meta' => 'Login']);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|min:4|max:50',
            'user_password' => 'required|min:4|max:50',
        ], [
            'user_password.required' => 'Password is required.'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Cari user berdasarkan username
        $user = User::where('user_name', $request->input('user_name'))->first();

        if ($user && Hash::check($request->input('user_password'), $user->user_password)) {
            Auth::login($user);
            return redirect()->to('/');
        }

        return back()->withErrors(['login' => 'Username or Password don\'t match.']);
    }

    private function setUserSession($user)
    {
        $data = [
            'user_id' => $user->user_id,
            'user_email' => $user->user_email,
            'user_name' => $user->user_name,
            'isLoggedIn' => true,
        ];
        session($data); // ✅ Perbaikan session

        return true;
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/login');
    }
}
