<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();
        return view("Dashboard.OurCustomers.index", compact("customers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = new customer();

        return view("Dashboard.OurCustomers.create", compact("customer"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file("image")) {
            $image = $request->file("image");
            $ext = $image->getClientOriginalExtension();
            $name = uniqid() . time() . ".$ext";
            $image->move(public_path("uploads/Customers/"), $name);
        }

        $customer = Customer::create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $name
        ]);





        return redirect()->route("dashboard.ourCustomers.index")->with("success", "تم إضافة العميل بنجاح");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view("Dashboard.ourCustomers.edit", compact("customer"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $customer = Customer::findOrFail($id);
        $name = $customer->image;

        if ($request->hasFile("image")) {
            if ($name !== null) {
                unlink(public_path("uploads/Customers/") . $name);
            }

            $image = $request->file("image");
            $ext = $image->getClientOriginalExtension();
            $name = uniqid() . time() . ".$ext";
            $image->move(public_path("uploads/Customers/"), $name);
        }


        $customer->update([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $name
        ]);

        return redirect(route("dashboard.ourCustomers.index"))
            ->with("success", "📢 تم تعديل العميل  بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        if ($customer->image) {
            unlink(public_path("uploads/Customers/") . $customer->image);
        }

        return redirect()->route("dashboard.ourCustomers.index")
            ->with("success", "✈ تم حذف العرض بنجاح");
    }
}
