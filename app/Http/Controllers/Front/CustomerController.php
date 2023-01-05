<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
     public function index()
    {
        $data['customers'] = Customer::paginate(15);
        return view('Front.Customer.index')->with($data);
    }

     public function show($id)
    {
        $data['customer'] = Customer::findOrFail($id);
        return view('Front.Customer.show')->with($data);
    }


}
