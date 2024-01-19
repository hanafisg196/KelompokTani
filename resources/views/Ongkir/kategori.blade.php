

@extends('tampilan.main')
@section('content')

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Ongkir</h5>

        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="/ongkir"><i class="ti-write"></i></a>
            </li>
           <li class="breadcrumb-item"><a href="/ongkir">Ongkir</a>
                    <li class="breadcrumb-item"><a href="/ongkir/create">Tambah Ongkir</a>
                    </li>
        </ul>
    </div>
</div>

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">

            <!-- Basic Form Inputs card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Tambahkan Ongkir</h5>
                </div>
                <form method="post" action="/ongkir/store" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Provinsi</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_prov" onchange="window.location.href=this.value">
                                        @php
                                            $selectedIds = [];
                                        @endphp

                                            @foreach ($kota as $kategori)
                                            {{-- Periksa apakah id_prov tidak ada dalam array selectedIds --}}
                                            @if (!in_array($kategori->id_prov, $selectedIds))
                                                {{-- Tampilkan opsi --}}
                                                <option value="{{ $kategori->id_prov }}" {{ old('id_prov') == $kategori->id_prov ? 'selected' : '' }}>
                                                    {{ $kategori->provinsi->prov_name }} *
                                                </option>

                                                {{-- Tambahkan id_prov ke dalam array selectedIds untuk menghindari duplikasi --}}
                                                @php
                                                    $selectedIds[] = $kategori->id_prov;
                                                @endphp
                                            @endif
                                            @endforeach


                                        @foreach ($provinsi as $kateg)
                                            <option value="/kategoriongkir/{{$kateg->slug}}">{{$kateg->prov_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kota</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_city">
                                        @foreach ($kota as $kategori)
                                            @if(old('id_city') == $kategori->id_city)
                                                <option value="{{ $kategori->id_city }}" selected>{{ $kategori->city_name }}</option>
                                            @else
                                                <option value="{{ $kategori->id_city }}">{{ $kategori->city_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ongkir</label>
                                <div class="col-sm-9">
                                    <input type="number" id="ongkir" name="ongkir" class="form-control @error('ongkir') is-invalid @enderror"
                                     value="{{ old('ongkir') }}" required>

                                    @error('ongkir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="m-2">
                                <a href="/ongkir" class="btn waves-effect waves-light btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                    </div>
                </form>
            <!-- Basic Form Inputs card end -->

        </div>
    </div>
</div>

<script>

    function previewImage() {
         const image = document.querySelector('#image');
         const imagePreview = document.querySelector('.image-preview');

         // Display the image preview container
         imagePreview.style.display = 'block';
        const oFReader = new FileReader();

            oFReader.readAsDataURL(image.files[0]);
oFReader.onload = function(oFREvent) {
imagePreview.src = oFREvent.target.result;
};
}

    </script>
@endsection
