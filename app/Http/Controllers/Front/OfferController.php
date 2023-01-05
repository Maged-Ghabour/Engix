<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $data['offers'] = Offer::orderBy('id', 'DESC')->paginate(5);
        return view('Front.Offers.index')->with($data);
    }

    public function show($id)
    {
        $data['offer'] = Offer::findOrFail($id);
        return view('Front.Offers.show')->with($data);
    }
}
