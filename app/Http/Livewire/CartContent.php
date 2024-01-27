<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
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
        if($cart->quantity >= $cart->products->stok)
        {
            session()->flash('success', "Stok yang tersedia hanya ". $cart->products->stok . " pcs");
            $cart->quantity = 1;
        }else{
            $cart->quantity += 1;
        }
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

    public function addOrder()
    {
        $carts = Cart::where(['user_id' => auth()->user()->id]);
        $cartUser = $carts->get();
        $subtotal = $this->subTotal;

        if (empty($subtotal)) {
            return redirect('/produkpelanggan')->
            with('error', 'Subtotal kosong. Silakan tambahkan item ke keranjang Anda.');
        }

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'status'=> 'unpaid',
            'subtotal' => $subtotal,
        ]);

        foreach ($cartUser as $cart) {
            $order->detail()->create([
                'product_id' => $cart->product_id,
                'qty' => $cart->quantity,
            ]);
        }

        Cart::where(['user_id' => auth()->user()->id])->delete();

        return redirect('/listorder');
    }



}
