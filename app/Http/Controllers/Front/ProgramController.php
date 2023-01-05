<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function show($id)
    {
        $data['category'] = Category::withCount('children')
            ->withCount("products")
            ->where('id', $id)
            ->where('name', 'البرامج')
            ->with('products')
            ->findOrFail($id);

        $data['sub_cats'] = Category::where('parent_id', $id)->with('products')
            ->with('children')
            ->get();
        return view('Front.program.index')->with($data);
    }


    public function show_sub_category($id, $sub_id)
    {
        $data['sub_cat'] = Category::withCount('parent')
            ->withCount("products")
            ->where('parent_id', $id)
            ->with('products')
            ->findOrFail($sub_id);

        $data['category'] = Category::withCount('children')
            ->withCount("products")
            ->where('id', $id)
            ->where('name', 'البرامج')
            ->with('products')
            ->findOrFail($id);

        $data['sub_cats'] = Category::where('parent_id', $id)
            ->with('children')
            ->get();
        return view('Front.program.show')->with($data);
    }
}