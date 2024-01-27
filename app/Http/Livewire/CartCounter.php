<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCounter extends Component
{
   public $total = 0;

   protected $listeners = [
    'updateCart' => 'getCartItemCount'
   ];
    public function render()
    {

        $this->getCartItemCount();

        return view('livewire.cart-counter');
    }

    public function getCartItemCount()
    {
        if(auth()->user()){
            $this->total = \App\Models\Cart::where('user_id', auth()->user()->id)->count();
        }
        return $this->total;


    }
}
