<div>

   <div class="form-group">
        <label for="provinsi" class="col-sm-3 col-form-label"></label>
        <div class="col-md-3">
            <select wire:model="selectedProvinsi" id="id_prov"  name="id_prov" class="form-control">
                <option value="" selected>Pilih Provinsi</option>
                @foreach($provinsis as $item)
                    <option value="{{ $item->id_prov }}">{{ $item->prov_name }}</option>
                @endforeach
               
            </select>
        </div>
    </div>

    {{-- @if($selectedProvinsi) --}}
    <div class="form-group" class="col-sm-3 col-form-label">
        <label for="kota" ></label>
        <div class="col-md-3">
            <select wire:model="selectedKota" id="id_city"  name="id_city"  class="form-control">
                <option value="" selected>Pilih Kota</option>
                @foreach($kotas as $item)
                    <option value="{{ $item->id_city }}">{{ $item->city_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- @endif --}}

</div>
        



        
           
              
            
       