<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $offers = Offer::filter(request()->query())
            ->orderBy("offers.title")->paginate(10);
        return view("Dashboard.Offers.index", compact("offers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offer = new offer();
        // $categories = Category::get();
        return view("Dashboard.Offers.create", compact("offer"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // Validation

        $request->validate(
            Offer::rules($id = 0),
            [
                "required" => "هذا الحقل مطلوب",
                "unique" => "  عنوان العرض موجود مسبقا",
                "min" => "هذا الحقل لابد ان يكون ازيد من ثلاث حروف",
                "title.max" => "عنوان العرض لابد ان يكون اقل من مائة حرف",
                "image" => "لابد ان يكون امتداد الصورة احد الامتدادات الاتيه PNG,JPG,PNG"



            ]
        );


        if ($request->file("image")) {
            $image = $request->file("image");
            $ext = $image->getClientOriginalExtension();
            $name = uniqid() . time() . ".$ext";
            $image->move(public_path("uploads/Offers/"), $name);
        }





        $category = Offer::create([
            "title" => $request->title,
            "description" => $request->description,
            "features" => $request->features,
            "expire_date" => $request->expire_date,
            "image" => $name
        ]);





        return redirect()->route("dashboard.offers.index")->with("success", "تم إضافة العرض بنجاح");
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
        $offer = Offer::findOrFail($id);
        // $categories = Category::get();
        return view("Dashboard.Offers.edit", compact("offer"));
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
        $offer = Offer::findOrFail($id);
        $name = $offer->image;

        if ($request->hasFile("image")) {
            if ($name !== null) {
                unlink(public_path("uploads/Offers/") . $name);
            }

            $image = $request->file("image");
            $ext = $image->getClientOriginalExtension();
            $name = uniqid() . time() . ".$ext";
            $image->move(public_path("uploads/Offers/"), $name);
        }






        // $request->validate(Offer::rules($id));

        $offer->update([
            "title" => $request->title,
            "description" => $request->description,
            "features" => $request->features,
            "expire_date" => $request->expire_date,
            "image" => $name
        ]);

        return redirect(route("dashboard.products.index"))
            ->with("updated", "📢 تم تعديل العرض بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();

        if ($offer->image) {
            unlink(public_path("uploads/Offers/") . $offer->image);
        }

        return redirect()->route("dashboard.offers.index")
            ->with("deleted", "✈ تم حذف العرض بنجاح");
    }
}
