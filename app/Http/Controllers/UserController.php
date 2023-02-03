<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::latest()->paginate(10);
        return [
            "status" => 1,
            "data" => $users
        ];
    }
    
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
 
        $users = User::create($request->all());
        return [
            "status" => 1,
            "data" => $users
        ];
    }
    public function show(User $user)
    {
        return [
            "status" => 1,
            "data" =>$user
        ];
    }

    
    public function edit(User $user)
    {
        return [
            "status" => 1,
            "data" =>$user
        ];
    }

    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
 
        $user->update($request->all());
 
        return [
            "status" => 1,
            "data" => $user,
            "msg" => "User updated successfully"
        ];
    }

    
    public function destroy(User $user)
    {
        $user->delete();
        return [
            "status" => 1,
            "data" => $user,
            "msg" => "User deleted successfully"
        ];
    }
}
