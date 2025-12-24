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

        // Fetch 8 latest products for main product list (skip the featured ones)
        $newArrivals = Product::latest()->skip(4)->take(8)->get();

        return view('pages.home', compact('featuredProducts', 'newArrivals'));
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
