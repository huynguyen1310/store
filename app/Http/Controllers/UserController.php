<?php

namespace App\Http\Controllers;

use App\Category;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\User;


class UserController extends Controller
{
    public function __construct() {
        $categories = Category::whereStatus(1)->get();
        $productTypes = ProductType::whereStatus(1)->get();
        view()->share(['categories'=> $categories,'productTypes' => $productTypes] );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

    public function profile() {
        $user = Auth::user();
        return view('client.pages.profile',compact('user'));
    }

    public function adminLogin() {
        return view('admin.pages.login');
    }

    public function postAdminLogin(Request $request) {
        $data = $request->only('email','password');
        if(Auth::attempt($data,$request->has('remember'))){
            if(Auth::user()->role == 1)
                return redirect('admin/')
                        ->with('message','Login success');
            else if(Auth::user()->role == 2)
                return redirect()
                    ->route('category.index')
                    ->with('message','Login success');
            else if(Auth::user()->role == 3)
                return redirect()
                        ->route('product.index')
                        ->with('message','Login success');
            else if(Auth::user()->role == 4)
                return redirect()
                        ->route('order.index')
                        ->with('message','Login success');
        }
        else{
        return redirect()
                ->route('login.admin')
                ->with('error','Login faild');
        }
    }

    public function adminRegister() {
        return view('admin.pages.register');
    }
}
