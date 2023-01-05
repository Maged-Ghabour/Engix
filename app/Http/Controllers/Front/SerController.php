<?php

// namespace App\Http\Controllers\Front;

// use App\Http\Controllers\Controller;
// use App\Models\Category;
// use App\Models\Product;
// use Illuminate\Http\Request;

// class SerController extends Controller
// {
//     public function index($id)
//     {
//         $data['cats'] = Category::where('parent_id', $id)->get();
//         $data['sub-cats'] = Product::all();
//         // $data['sub_cat'] = Category::withCount('parent')
//         //     ->withCount("products")
//         //     ->where('parent_id', "=", $id)
//         //     ->with('products')
//         //     ->findOrFail($sub_id);
//         return view('Front.sevises.index', ['data' => $data]);
//     }
//     public function show($id)
//     {
//         // $data['cats'] = Category::where('name', 'خدمات')->find($id);
//         // $data['sub-cats'] = Product::all();
//         // dd($data);

//         $data['category'] = Category::where('id', $id)
//             ->where('parent_id', $id)
//             ->with('products')
//             ->findOrFail($id);

//         $data['sub_cats'] = Category::where('parent_id', $id)
//             ->with('children')
//             ->get();
//         return view('Front.sevises.show', ['data' => $data]);
//     }
//     // public function showpro($id)
//     // {
//     //     $datapro = Product::where('category_id', $id)->get();
//     //     return view('Front.sevises.index', ['datapro' => $datapro]);
//     // }
// }


namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SerController extends Controller
{
    public function show($id)
    {
        $data['category'] = Category::withCount('children')
            ->withCount("products")
            ->where('id', $id)
            ->where('name', 'خدمات')
            ->with('products')
            ->findOrFail($id);
        $data['sub_cats'] = Category::where('parent_id', $id)->with('products')
            ->with('children')
            ->get();

        return view('Front.sevises.index')->with($data);
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
            ->where('name', 'خدمات')
            ->with('products')
            ->findOrFail($id);

        $data['sub_cats'] = Category::where('parent_id', $id)
            ->with('children')
            ->get();
        return view('Front.sevises.show')->with($data);
    }
}