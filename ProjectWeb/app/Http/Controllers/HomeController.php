<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch 4 latest products for featured section
        $featuredProducts = Product::latest()->take(4)->get();

        return view('pages.home', compact('featuredProducts'));
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
