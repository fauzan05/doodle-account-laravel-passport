<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $todos = $request->user()->todos()->with(['user', 'category'])->get(); // hasilnya json
        return $todos;
    }

    
}
