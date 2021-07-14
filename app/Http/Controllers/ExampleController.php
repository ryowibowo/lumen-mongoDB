<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkLogin() {
        return response()->json(['isSuccess' => true, 'message' => 'Sukses', 'data' => Auth::user()], 200);
        // return response()->json(['user' => Auth::user()], 200);
    }
}
