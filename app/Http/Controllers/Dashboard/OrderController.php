<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Details;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['orders'] = Order::all();
        return view('Dashboard.Order.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products'] = Product::all();
        return view('Dashboard.Order.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $data = $request->validate([
        //     'customer_name' => "required",
        //     'customer_mobile' => "required",
        //     'order_number' => "required",
        //     'order_date' => "required",
        // ]);
        $data['customer_name']      = $request->customer_name;
        $data['customer_mobile']    = $request->customer_mobile;
        $data['order_number']        = $request->order_number;
        $data['order_date']          = $request->order_date;
        $data['total']              = $request->total;

        // Array to store data which come from Multi Product
        $details = [];
        for ($i = 0; $i < count($request->product_name); $i++) {
            $details[$i]['product_name']    = $request->product_name[$i];
            $details[$i]['quantity']        = $request->quantity[$i];
            $details[$i]['unit_price']      = $request->unit_price[$i];
            $details[$i]['product_total']   = $request->product_total[$i];
        }

        $order = Order::create($data);
        // (createMany) Is a function to add data comes from array
        $order->details()->createMany($details);

        return redirect()->route('dashboard.orders.index')->with('success', 'تم إضافة الطلب بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['order'] = Order::findOrFail($id);
        return view('Dashboard.Order.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['order'] = Order::findOrFail($id);
        return view('Dashboard.Order.edit')->with($data);
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
        //instead of using id here send an id in a hidden input in view
        $order = Order::findOrFail($id);

        $data['customer_name']      = $request->customer_name;
        $data['customer_mobile']    = $request->customer_mobile;
        $data['order_number']        = $request->order_number;
        $data['order_date']          = $request->order_date;
        $data['total']              = $request->total;

        $order->details()->delete();
        // Array to store data which come from Multi Product
        $details = [];
        for ($i = 0; $i < count($request->product_name); $i++) {
            $details[$i]['product_name']    = $request->product_name[$i];
            $details[$i]['quantity']        = $request->quantity[$i];
            $details[$i]['unit_price']      = $request->unit_price[$i];
            $details[$i]['product_total']   = $request->product_total[$i];
        }
        $order->update($data);
        $order->details()->createMany($details);
        return redirect()->route('dashboard.orders.index')->with('updated', 'تم تعديل الطلب بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::withTrashed()->findOrFail($id);

        if ($order->trashed()) {
            $order->forceDelete();
            return redirect()->route('dashboard.orders.index')->with('success', 'تم حذف الطلب نهائياً بنجاح');
        } else {
            $order->delete();
            return redirect()->route('dashboard.orders.index')->with('success', 'تم أرشفة الطلب بنجاح');
        }
    }

    public function trashedOrders()
    {
        $data['trashedOrders'] = Order::onlyTrashed()->orderBy('id', 'DESC')->paginate(10);
        return view('Dashboard.Order.trashed')->with($data);
    }

    public function restoreOrder($id)
    {
        Order::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('dashboard.orders.index')->with('success', 'تم استرجاع الطلب بنجاح');
    }
    public function print($id)
    {
        $data['order'] = Order::findOrFail($id);
        return view('Dashboard.Order.print')->with($data);
    }

    // Order Tracking

    public function delivering($id)
    {
        Order::findOrFail($id)->update([
            'status' => 'delivering'
        ]);
        return redirect()->route('dashboard.orders.index')->with('success', 'الطلب الآن قيد التوصيل');
    }

    public function completed($id)
    {
        Order::findOrFail($id)->update([
            'status' => 'completed'
        ]);
        return redirect()->route('dashboard.orders.index')->with('success', 'تم توصيل الطلب بنجاح');
    }

    public function cancelled($id)
    {
        Order::findOrFail($id)->update([
            'status' => 'cancelled'
        ]);
        return redirect()->route('dashboard.orders.index')->with('success', 'تم رفض الطلب بنجاح');
    }

    public function refunded($id)
    {
        Order::findOrFail($id)->update([
            'status' => 'refunded'
        ]);
        return redirect()->route('dashboard.orders.index')->with('success', 'مش عارف ايه ده بصراحه');
    }
}
