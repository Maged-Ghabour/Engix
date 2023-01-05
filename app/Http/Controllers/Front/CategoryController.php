<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::withCount('children')
            ->withCount("products")
            ->where('parent_id', null)
            ->paginate(4);
        $data['products'] = Product::all();
        return view('Front.Category.index')->with($data);
    }

    public function show($id)
    {
        $data['category'] = Category::withCount('children')
            ->withCount("products")
            ->where('id', $id)
            ->where('parent_id', null)
            ->with('products')
            ->findOrFail($id);

        $data['sub_cats'] = Category::where('parent_id', "<>", null)
            ->with('children')
            ->get();
        return view('Front.Category.show')->with($data);
    }


    public function show_sub_category($id, $sub_id)
    {
        $data['sub_cat'] = Category::withCount('parent')
            ->withCount("products")
            ->where('parent_id', "<>", null)
            ->with('products')
            ->findOrFail($sub_id);
        return view('Front.Category.sub_cat')->with($data);
    }
}
