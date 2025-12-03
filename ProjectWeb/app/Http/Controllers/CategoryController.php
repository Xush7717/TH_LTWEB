<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function hg()
    {
        return view('pages.categories.hg');
    }

    public function rg()
    {
        return view('pages.categories.rg');
    }

    public function mg()
    {
        return view('pages.categories.mg');
    }
}
