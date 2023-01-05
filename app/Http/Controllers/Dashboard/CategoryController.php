<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $request = request();


        Carbon::setLocale(config('locale'));
        $categories = Category::with("parent")

            ->filter($request->query())
            ->orderBy("categories.name")
            ->withCount("products")->paginate(10);



        /*leftJoin("categories as parents" , "parents.id" , "=" , "categories.parent_id")
                    ->select([
                        "categories.*",
                        "parents.name as parent_name"
                    ])->get();*/


        return view("Dashboard.Categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::get();
        $category = new Category();
        return view("Dashboard.Categories.create", compact("parents", "category"));
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
            Category::rules($id = 0),
            [
                "required" => "هذا الحقل مطلوب",
                "unique" => " اسم التصنيف موجود مسبقا",
                "name.min" => "اسم التصنيف لابد ان يكون ازيد من ثلاث حروف",
                "name.max" => "اسم التصنيف لابد ان يكون اقل من مائة حرف",
                "description.min" => "وصف التصنيف لابد ان يكون ازيد من ثلاث حروف",
                "image" => "لابد ان يكون امتداد الصورة احد الامتدادات الاتيه PNG,JPG,PNG"



            ]
        );



        // Validation

        $request->validate(
            Category::rules($id = 0),
            [
                "required" => "هذا الحقل مطلوب",
                "unique" => "اسم التصنيف هذا موجود مسبقاً ، قم بادخال اسم تصنيف لم يتم ادخاله من قبل",
                "image" => "تأكد من امتداد الصوره بان يكون احد الامتدادات التالية JPG,PNG,TIF,BMP,GIF",
                "name.min" => "لابد ان يكون اسم التصنيف اكبر من ثلاث حروف",
                "max" => "لابد ان يكون اسم التصنيف اقل من 100",
                "description.min" => "لابد ان يكون وصف التصنيف اكبر من ثلاث حروف",
            ]
        );




        if ($request->file("image")) {
            $image = $request->file("image");
            $ext = $image->getClientOriginalExtension();
            $name = uniqid() . time() . ".$ext";

            $image->move(public_path("uploads/Categories/"), $name);
        }



        $category = Category::create([
            "name" => $request->name,
            "parent_id" => $request->parent_id,
            "description" => $request->description,
            "slug" => $request->slug,
            "image" => $name
        ]);





        return redirect()->route("dashboard.categories.index")->with("success", "تم إضافة التصنيف بنجاح");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show(Category $category)
    {
        return view("Dashboard.Categories.show", [
            "category" => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::where("id", "<>", $id)
            ->whereNull("parent_id")
            ->orWhere("parent_id", "<>", $id)
            ->get();




        return view("Dashboard.Categories.edit", compact("category", "parents"));
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
        $category = Category::findOrFail($id);
        $name = $category->image;

        if ($request->hasFile("image")) {
            if ($name !== null) {
                unlink(public_path("uploads/Categories/") . $name);
            }

            $image = $request->file("image");
            $ext = $image->getClientOriginalExtension();
            $name = uniqid() . time() . ".$ext";
            $image->move(public_path("uploads/Categories/"), $name);
        }




        // Request Merge
        $request->merge([
            "slug" => Str::slug($request->name)
        ]);


        //$request->validate(Category::rules($id));

        $category->update([
            "name" => $request->name,
            "parent_id" => $request->parent_id,
            "description" => $request->description,
            "slug" => $request->slug,
            "image" => $name
        ]);

        return redirect(route("dashboard.categories.index"))
            ->with("info", "📢 تم تعديل التصنيف بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        if ($category->image) {
            unlink(public_path("uploads/Categories/") . $category->image);
        }

        return redirect()->route("dashboard.categories.index")
            ->with("warning", "✈ تم حذف التصنيف بنجاح");
    }
}
