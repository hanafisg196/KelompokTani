<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartContent extends Component
{
    public $cartItems;
    public $subTotal;

    public function render()
    {

        $this->cartItems = Cart::with('products')
                ->where(['user_id' => auth()->user()->id])
                ->get();
                
                $this->getPrice();
               
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

    
    
}
