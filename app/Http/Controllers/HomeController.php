<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    public function index() {
        return view('client.pages.index');
    }

    public function redirectProvider($social) {
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social) {
        $user = Socialite::driver($social)->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser);
        return redirect('/');
    }

    private function findOrCreateUser($user) {
        $authUser = User::where('social_id',$user->id)->first();
        if($authUser) {
            return $authUser;
        }else {
            return User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => '',
                'ruler' => 0,
                'status' => 0,
                'avatar' => $user->avatar
            ]);
        }
    }

    public function login() {
        return view('client.pages.login');
    }

    public function postLogin(Request $request) {
        $data = $request->only('email', 'password');

        if (Auth::attempt($data,$request->has('remember'))) {
            return redirect('/');
        }
    }

    public function register() {
        return view('client.pages.register');
    }

    public function postRegister(Request $request) {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:255',
            'repassword' => 'required|same:password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/')->with('message','Register success');
    }

    public function logout() {
        if(Auth::check()) {
            Auth::logout();
            return redirect('/');
        }
    }
}