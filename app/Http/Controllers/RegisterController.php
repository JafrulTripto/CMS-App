<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
    }

    public function store(Request $request)
    {
        $todo = new User();
        $todo->name = $request->input('name');
        $todo->company = $request->input('company');
        $todo->email = $request->input('email');
        $todo->password = Hash::make($request->input('password'));

        $todo->save();
    }
}
