<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function labs()
    {
        return view('pages.labs');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        // TODO: Implement search functionality
        return view('pages.search', compact('query'));
    }
}
