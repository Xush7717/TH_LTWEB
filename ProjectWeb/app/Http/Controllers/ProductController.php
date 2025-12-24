<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Sample product data - in production, this would come from database
    // private function getProducts()
    // {
    //     return [
    //         1 => [
    //             'id' => 1,
    //             'name' => 'RG RX-78-2 2.0',
    //             'price' => '1,100,000',
    //             'image' => 'images/products/rg_rx-78-2.jpg',
    //             'description' => 'Real Grade RX-78-2 Gundam 2.0 - The iconic mobile suit from the original Gundam series with incredible detail and articulation.',
    //             'grade' => 'Real Grade (RG)',
    //             'scale' => '1/144',
    //             'series' => 'Mobile Suit Gundam'
    //         ],
    //         2 => [
    //             'id' => 2,
    //             'name' => 'MG Vidar',
    //             'price' => '1,500,000',
    //             'image' => 'images/products/mg_vidar.jpg',
    //             'description' => 'Master Grade Vidar - A mysterious mobile suit from Gundam Iron-Blooded Orphans with exceptional detail.',
    //             'grade' => 'Master Grade (MG)',
    //             'scale' => '1/100',
    //             'series' => 'Mobile Suit Gundam: Iron-Blooded Orphans'
    //         ],
    //         3 => [
    //             'id' => 3,
    //             'name' => 'HG Gquuuuuux',
    //             'price' => '600,000',
    //             'image' => 'images/products/hg_gquuuuuux.jpg',
    //             'description' => 'High Grade Gquuuuuux - A unique mobile suit from The Witch from Mercury series.',
    //             'grade' => 'High Grade (HG)',
    //             'scale' => '1/144',
    //             'series' => 'Mobile Suit Gundam: The Witch from Mercury'
    //         ],
    //         4 => [
    //             'id' => 4,
    //             'name' => 'HG Mighty Strike Freedom',
    //             'price' => '650,000',
    //             'image' => 'images/products/hg_mighty-strike-freedom.jpg',
    //             'description' => 'High Grade Mighty Strike Freedom - An evolved version of the legendary Strike Freedom Gundam.',
    //             'grade' => 'High Grade (HG)',
    //             'scale' => '1/144',
    //             'series' => 'Mobile Suit Gundam SEED Freedom'
    //         ]
    //     ];
    // }

    public function index()
    {
        // Paginate all products - 12 per page
        $products = Product::latest()->paginate(12);
        $title = 'Tất cả sản phẩm';

        return view('pages.products.index', compact('products', 'title'));
    }

    public function filterByCategory($id)
    {
        // Find the category by ID or fail with 404
        $category = Category::findOrFail($id);

        // Get products that belong to this category, paginated
        $products = Product::where('category_id', $id)
                          ->latest()
                          ->paginate(12);

        // Set the title to the category name
        $title = $category->name;

        // Reuse the existing products.index view
        return view('pages.products.index', compact('products', 'title'));
    }

    public function detail($id)
    {
        // $products = $this->getProducts();

        // if (!isset($products[$id])) {
        //     abort(404);
        // }

        // $product = $products[$id];

        // return view('pages.products.detail', compact('product'));
        $product = Product::findOrFail($id);
        return view('pages.products.detail', compact('product'));
    }
}
