<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Details;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class CheckoutController extends Controller
{
    public function create(CartRepository $cart)
    {

        if ($cart->get()->count() == 0) {
            return redirect()->route("Home");
        }
        $items = $cart->get();
        $items = $items->all();
        return view("Front.Checkout.index", [
            "cart" => $cart
        ]);
    }

    public function store(Request $request, CartRepository $cart)
    {

        $request->validate([
            'addr.billing.first_name' => ['required', 'string', 'max:255'],
            'addr.billing.last_name' => ['required', 'string', 'max:255'],
            'addr.billing.email' => ['required', 'string', 'max:255'],
            'addr.billing.phone_number' => ['required', 'string', 'max:255'],
            'addr.billing.city' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();
        try {
            $order = Order::create([
                "user_id" => Auth::id(),
                "payment_method" => "cod",

            ]);

            foreach ($cart->get() as $item) {


                Order_Details::create([


                    "order_id" => $order->id,
                    "product_id" => $item->product_id,
                    "product_name" => $item->product->name,
                    "price" => $item->product->price,
                    "quantity" => $item->quantity
                ]);
            }

            foreach ($request->post("addr") as $type => $address) {
                $address["type"] = $type;
                $order->addresses()->create($address);
            }

            $cart->empty();
            DB::commit();

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        return redirect()->route("Home")->with("success", "تم الطلب بنجاح");
    }
}
