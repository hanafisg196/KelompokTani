<?php

namespace App\Http\Livewire;

use App\Models\Kota;
use App\Models\Ongkir;
use App\Models\Provinsi;
use Livewire\Component;

class OngkirDropdown extends Component
{

    public $provinsis;
    public $kotas;
    
    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedOngkir= null;
    public $ongkir;

    public function render()
    {
        $this->getProvinsis();
        $this->getKotas();
        $this->getOngkir();
        return view('livewire.ongkir-dropdown');
    }



      private function getProvinsis()
   {
        $this->provinsis = Provinsi::all();
   }

  
    private function getKotas()
    {
        $this->kotas = $this->selectedProvinsi
            ? Kota::where('id_prov', $this->selectedProvinsi)->get()
            : collect();
    }


    public function getOngkir()
    {
        $this->ongkir = $this->selectedKota
        ? Ongkir::where('id_city', $this->selectedKota)->value('ongkir')
        : null;
    }
}
