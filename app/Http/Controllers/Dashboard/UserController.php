<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(2);
        return view("Dashboard.Users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new user();
        // $users = User::get();
        return view("Dashboard.Users.create", compact("user"));
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



        // $request->validate(User::rules($id =0) ,
        //     [
        //         "required" => "هذا الحقل مطلوب" ,
        //         "unique" => "هذا الحقل موجود مسبقا" ,
        //         "email" => 'ادخل ايميل صالح'
        //     ]);



        if ($request->file("image")) {
            $image = $request->file("image");
            $ext = $image->getClientOriginalExtension();
            $name = uniqid() . time() . ".$ext";
            $image->move(public_path("uploads/Users/"), $name);
        }




        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,




        ]);



        return redirect()->route("dashboard.users.index")->with("success", "تم إضافة مستخدم بنجاح");
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
        $user = User::findOrFail($id);
        $users = User::get();
        return view("Dashboard.Users.edit", compact("users"));
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
        $user = User::findOrFail($id);
        // Request Merge
        $request->merge([
            "slug" => Str::slug($request->name)
        ]);


        // $request->validate(User::rules($id));

        $user->update([

            "name" => $request->name,
            "email" => $request->email


        ]);

        toastr('success', 'تم تعديل المستخدم بنجاح');
        return redirect(route("dashboard.Users.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route("dashboard.users.index")
            ->with("deleted", "✈ تم حذف المستخدم بنجاح");
    }
}
