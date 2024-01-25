<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Http\Request;

class CartContent extends Component
{
    public $cartItems;
    public $subTotal;

    public $totalQuantity;


    public function render()
    {

        $this->cartItems = Cart::with('products')
                ->where(['user_id' => auth()->user()->id])
                ->get();

                $this->getPrice();
                $this->getTotalQty();


        return view('livewire.cart-content');
    }




    public function decrementQty($id)
    {
        $cart = Cart::where('id',$id)->first();
        if($cart->quantity > 1){
            $cart->quantity -= 1;
            $cart->save();
            $this->getPrice();

            session()->flash('success', 'Product quantity updated !!!');
        }else{
            session()->flash('info','You cannot have less than 1 quantity');
        }

    }



      public function incrementQty($id)
    {
      $cart = Cart::where('id',$id)->first();
        $cart->quantity += 1;
        $cart->save();
        $this->getPrice();
        $this->emit('refresh-me');


    }

    public function removeItem($id){
        $cart = Cart::whereId($id)->first();

        if($cart){
            $cart->delete();
            $this->emit('updateCart');
        }
        session()->flash('success', 'Product removed from cart !!!');
    }

    public function getPrice()
    {
        $this->subTotal = 0;
        foreach ($this->cartItems as $item) {
        $this->subTotal += $item->products->harga * $item->quantity;
       }

    }

    public function getTotalQty()
    {
        $this->totalQuantity = 0;
        foreach ($this->cartItems as $item) {
        $this->totalQuantity += $item->quantity;
       }

    }

    public function addOrder(Request $request)
    {
        $carts = Cart::where(['user_id' => auth()->user()->id]);
        $cartUser = $carts->get();
        $subtotal = $this->subTotal;

        if (empty($subtotal)) {
            return redirect()->back()->with('error', 'Subtotal kosong. Silakan tambahkan item ke keranjang Anda.');
        }

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'subtotal' => $subtotal,
        ]);

        foreach ($cartUser as $cart) {
            $order->detail()->create([
                'product_id' => $cart->product_id,
                'qty' => $cart->quantity,
            ]);
        }

        Cart::where(['user_id' => auth()->user()->id])->delete();

        return redirect()->route('checkout');
    }


//     public function addOrder()
// {
//     $cartItems = Cart::where(['user_id' => auth()->user()->id])->get();

//     $order = new Order();
//     $order->user_id = auth()->user()->id;

//     $firstCartItem = $cartItems->first();
//     $order->cart_id = $firstCartItem ? $firstCartItem->id : null;
//     $order->total_bayar = $this->subTotal ;
//     $order->total_produk = $this->totalQuantity;
//     $order->save();



//     return redirect('/checkout');

// }







}
