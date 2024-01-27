<?php

namespace App\Http\Livewire;

use App\Models\Pembayaran;
use Livewire\Component;

class StokCounter extends Component
{
    public function render()
    
    {

      
        return view('livewire.stok-counter');
    }


    public function accept($id)
    {
        $bayar = Pembayaran::find($id);

        if(!$bayar){
            session()->flash('success', 'Product quantity updated !!!');
        }
    }

    public function deny($id)
    {
        
    }


}
