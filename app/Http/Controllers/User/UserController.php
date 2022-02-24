<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view("users.index")->with("users", $users);
    }

    public function create()
    {
        return view("users.create");
    }

    public function store(Request $request) {
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get("email"),
            'password' => $request->get("password"),
        ]);
        return redirect()->route("users.index")->with("usersmessage", "User was added");
    }
}
