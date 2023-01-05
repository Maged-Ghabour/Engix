<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('Front.footer.contact_us');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'subject' => 'required',
            'email' => 'required'
        ]);

        Contact::create($data);

        return redirect()->route('contact_us.index')->with('success', 'تم الإرسال بنجاح');
    }
}
