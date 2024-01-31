<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Voucher;
use Livewire\Component;
use Illuminate\Http\Request;

class CartContent extends Component
{
    public $cartItems;
    public $subTotal;

    public $totalQuantity;

    public $discount;
    public $codeVoucher;
    public $vouchers;


    public function render()
    {

        $this->cartItems = Cart::with('products')
                ->where(['user_id' => auth()->user()->id])
                ->get();


                $this->infoVoucher();
                $this->expiredVoucher();
                $this->getPrice();
                $this->getTotalQty();


        return view('livewire.cart-content');
    }




    public function decrementQty($id)
    {
        $cart = Cart::where('id',$id)->first();

        if ($cart)
        {
            if ($cart->quantity > 1) {
                $cart->quantity -= 1;
                $cart->save();
                $this->getPrice();
                $this->emit('refresh-me');
            } else{
                
                $this->emit('refresh-me');
            }
        }

        else {
            
            $this->emit('refresh-me');
            $cart->quantity = 1;
        }
        
    }



      public function incrementQty($id)
    {

       
        $cart = Cart::where('id',$id)->first();
        if($cart->quantity >= $cart->products->stok)
        {
            session()->flash('success', "Stok yang tersedia hanya ". $cart->products->stok . " pcs");
            
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
        $this->subTotal -= $this->discount;
       }

    }

    public function getTotalQty()
    {
        $this->totalQuantity = 0;
        foreach ($this->cartItems as $item) {
        $this->totalQuantity += $item->quantity;
       }

    }

    public function applyVoucher()
    {
        $this->discount = 0;
    
        $voucher = Voucher::where('code_voucher', $this->codeVoucher)->first();
    
        if ($voucher && $this->subTotal >= $voucher->min) {
            
            $this->discount = min($voucher->discount, $this->subTotal);
         
        } else {
            $this->discount = 0;
            session()->flash('voucherErr', 'Kode voucher atau minimal belanja tidak valid');

        }
    }

    public function infoVoucher()
    {
        $this->vouchers = Voucher::latest()->get();
        
    }

    public function expiredVoucher()
    {
        $currentDate = now();

        $vouchers = Voucher::where('start_date', '<=', $currentDate)
        ->where('end_date', '>=', $currentDate)
        ->get();

        foreach ($vouchers as $voucher) {
           
            if ($currentDate > $voucher->end_date) {
                $voucher->expired = true;
                $voucher->delete();
            } else {
                $voucher->expired = false;
            }
        }
    
        return $vouchers;
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
