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

    public function destroy($id)
    {
        $user = \App\Models\UserTb::findOrFail($id);
        $user->delete();

        return redirect()->route('home')->with('success', 'User deleted successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        $user = \App\Models\UserTb::findOrFail($id);
        $user->name = $request->name;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('home')->with('success', 'User updated successfully!');
    }
}
