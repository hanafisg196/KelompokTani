<?php


namespace App\Http\Livewire;

use App\Models\Provinsi;
use App\Models\Kota;
use Livewire\Component;

class ProvinsiKota extends Component
{
    public $provinsis;
    public $kotas;
    public $selectedProvinsi = null;
    public $selectedKota = null;



public function render()
{
    $this->getProvinsis();
    $this->getKotas();

    return view('livewire.provinsi-kota');
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


}