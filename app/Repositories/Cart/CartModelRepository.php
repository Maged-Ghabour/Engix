<?php

namespace App\Repositories\Cart;

use Illuminate\Support\Str;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartModelRepository implements CartRepository
{


    protected $items;



    public function __construct(){



        $this->items = collect([]); // To Convet Array To collection.

    }

    public function get(): Collection
    {

        if (!$this->items->count()) {
            $this->items =  Cart::with("product")
                // ->where("cookie_id" , "=" , $this->getCookieId())
                ->get();
        }
        return $this->items;
    }

    public function add(Product $product, $quantity = 1)
    {



        $item = Cart::where('product_id', '=', $product->id)
            // ->where('cookie_id' , '=' , $this->getCookieId())
            ->first();




            if(!$item){
                $cart =  Cart::create([

                    "product_id" => $product ->id ,
                    "user_id" => Auth::id(),
                    // "cookie_id" => $this-> getCookieId(),
                    "quantity" => $quantity,
                ]);

            $this->get()->push($cart);
            return $cart;


            }
        return $item->increment("quantity" , $quantity);





    }

    public function update($id, $quantity)
    {
        Cart::where("id", "=", $id)
            // -> where("cookie_id" , "=" , $this->getCookieId())
            ->update([
                "quantity" => $quantity
            ]);
    }

    public function delete($id)
    {
        Cart::where("id", "=", $id)
            // ->where("cookie_id" , "=" , $this->getCookieId())
            ->delete();
    }

    public function empty()
    {
        // Cart::where("cookie_id" , "=" , $this->getCookieId())->destroy();
        Cart::query()->delete();
    }

    public function total(): float
    {
        /* return Cart::where("cookie_id" , "=" , $this->getCookieId())
        ->join("products" , "product.id" , "=" , "cats.products_id")
        ->selectRaw("SUM(products.price * carts.quantity) as total")
        -> value("total"); */

        return  $this->get()->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
    }
}
