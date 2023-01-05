<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = request();
        $products = Product::with("category")->filter($request->query())->paginate(10);

        return view("Dashboard.Products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $parents = Category::get();
        // $category = new Category();

        $product = new product();
        $categories = Category::get();
        return view("Dashboard.Products.create", compact("product", "categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Request Merge
        $request->merge([
            "slug" => Str::slug($request->name)
        ]);

        // Validation

        $request->validate(
            Product::rules($id = 0),
            [
                "required" => "هذا الحقل مطلوب",
                "unique" => "هذا الحقل موجود مسبقا",
                "numeric" => "هذاالحقل لابد ان يكون رقما",
                "min" => "هذا الحقل لابد ان يكون اكبر من الصفر",
                "max" => "ادخل قيمة اقل من 100000",
                "image" => "لابد ان يكون امتداد الصورة احد الامتدادات الاتيه PNG,JPG,PNG"

            ]
        );

        // Validation

        $request->validate(
            Product::rules($id = 0),
            [
                "required" => "هذا الحقل مطلوب",
                "name.unique" => "اسم المنتج موجود مسبقاً",
                "numeric" => "هذاالحقل لابد ان يكون رقما",
                "price.min" => "لابد ان يكون السعر اكبر من الصفر",
                "price.max" => "لابد ان لا تزيد قيمة السعر عن 100000",
                "name.min" => "لابد ان لا يقل اسم المنتج علي ثلات حروف",
                "name.max" => "لابد ان لا يزيد اسم المنتج علي ثلاث حروف",
                "image" => "تأكد من امتداد الصوره بان يكون احد الامتدادات التالية JPG,PNG,TIF,BMP,GIF",

            ]
        );



        if ($request->file("image")) {
            $image = $request->file("image");
            $ext = $image->getClientOriginalExtension();
            $name = uniqid() . time() . ".$ext";
            $image->move(public_path("uploads/Products/"), $name);
        }





        $category = Product::create([
            "name" => $request->name,
            "category_id" => $request->category_id,
            "description" => $request->description,
            "slug" => $request->slug,
            "price" => $request->price,
            "compare_price" => $request->compare_price,
            "image" => $name
        ]);





        return redirect()->route("dashboard.products.index")->with("success", "تم إضافة المنتج بنجاح");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        return view("Dashboard.Products.edit", compact("product", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $name = $product->image;

        if ($request->hasFile("image")) {
            if ($name !== null) {
                unlink(public_path("uploads/Products/") . $name);
            }

            $image = $request->file("image");
            $ext = $image->getClientOriginalExtension();
            $name = uniqid() . time() . ".$ext";
            $image->move(public_path("uploads/Products/"), $name);
        }




        // Request Merge
        $request->merge([
            "slug" => Str::slug($request->name)
        ]);


        //$request->validate(Product::rules($id));

        $product->update([
            "name" => $request->name,
            "category_id" => $request->category_id,
            "description" => $request->description,
            "slug" => $request->slug,
            "price" => $request->price,
            "compare_price" => $request->compare_price,
            "image" => $name
        ]);

        return redirect(route("dashboard.products.index"))
            ->with("success", "📢 تم تعديل المنتج بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        if ($product->image) {
            unlink(public_path("uploads/Products/") . $product->image);
        }

        return redirect()->route("dashboard.products.index")
            ->with("deleted", "✈ تم حذف المنتج بنجاح");
    }
}
