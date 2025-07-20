<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $buku = Buku::when($keyword, function ($query, $keyword) {
            return $query->where('judul', 'like', "%{$keyword}%");
        })->get();

        return view('welcome', compact('buku'));
    }
}
