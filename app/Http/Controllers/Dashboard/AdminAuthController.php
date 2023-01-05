<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('Dashboard.Admin.login');
    }

    public function confirm(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:191|min:5',
            'password' => 'required'
        ]);

        if (!auth()->guard('admin')->attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ])) {
            return redirect()->back()->with(['error' => 'خطأ المعلومات غير صحيحة رجاء التأكد من دقة المعلومات ']);
        } else {
            return redirect()->route('dashboard.Admin.index');
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect(route('Admin.Login'));
    }
}
