<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $todos = $request->user()->todos()->with(['user', 'category'])->orderBy('created_at', 'desc')->get();
        return $todos;
    }

    public function store(Request $request)
    {
        // Validasi permintaan
        $validatedData = $request->validate([
            'body' => ['required', 'string'],
            'category_id' => ['required', 'integer']
        ]);

        // Buat todo untuk pengguna saat ini
        $user = $request->user(); // Mendapatkan pengguna saat ini
        $todo = $user->todos()->create([
            'body' => $validatedData['body'],
            'category_id' => $validatedData['category_id']
        ])->load('user', 'category'); // Pastikan Anda telah memuat relasi 'user'

        // Kembalikan hasilnya
        return $todo;
    }
}
