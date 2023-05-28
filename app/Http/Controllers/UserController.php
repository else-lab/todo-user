<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/todo');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function login() {
        return view('user.login');
    }
    public function authenticate(Request $request) {
        
        
        $credentials =  $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //dd($credentials);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/profile');
        } return back()->withErrors([
            'email' => "The provided credentials do not match our records"
        ])->onlyInput('email');

    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');

    }

/*     public function profile() {
        
        if(Auth::check()) {
            return view('user.profile');
        }
        return redirect('/login')->withErrors([
            'email' => 'Please login to access this page'
        ])->onlyInput('email');
    } */

    public function profile() {
        $todos = Todo::all()->where('user_id', Auth::user()->id);
        //dd($todos);
        return view('user.profile', ['todos' => $todos]);
    }
}
