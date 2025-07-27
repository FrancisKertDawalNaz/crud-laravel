<?php

namespace App\Http\Controllers;
use App\Models\UserTb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        UserTb::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    public function show()
    {
        $users = UserTb::orderByDesc('id')->get();
        return view('welcome', compact('users'));
    }
}
