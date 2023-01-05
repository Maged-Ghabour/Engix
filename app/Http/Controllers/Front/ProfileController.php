<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function show($id)
    {
        return view('Front.profile_user.a');
    }
    public function update(Request $request, $id)
    {
        // dd($request->image);
        if ($request->name && $request->email && $request->phone && $request->address) {

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'phone' => ['required', 'digits:11', 'numeric', 'unique:users'],
                'address' => ['required'],
            ]);


            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            return redirect()->route('profile', $request->id)->with('success', 'تم التعديل بنجاح');
        } elseif ($request->image) {
            $request->validate([
                'image' => ['mimes:jpg,gif,png,jfif', 'required', 'max:10000'],
            ]);
            // dd($request->image);
            $user = User::find($id);
            $name = $user->image;
            if ($request->file("image")) {
                if ($name !== null) {
                    unlink(public_path("uploads/User/") . $name);
                }
                $image = $request->file("image");
                $ext = $image->getClientOriginalExtension();
                $name = time() . ".$ext";
                $image->move(public_path("uploads/User/"), $name);
            }
            $user->image = $name;
            $user->save();
            return redirect()->route('profile', $request->id)->with('success', 'تم التعديل بنجاح');
        } elseif ($request->password && $request->password_confirmation) {
            if ($request->password == $request->password_confirmation) {
                $request->validate([
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);
                $user = User::find($id);
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('profile', $request->id)->with('success', 'تم التعديل بنجاح');
            }
        } else{
            return redirect()->back();
        }
    }
}
