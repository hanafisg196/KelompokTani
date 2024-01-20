

@extends('tampilan.main')
@section('content')

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Produk</h5>

        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="/produk"><i class="ti-write"></i></a>
            </li>
           <li class="breadcrumb-item"><a href="/produk">Produk</a>
                    <li class="breadcrumb-item"><a href="/produk/create">Tambah Produk</a>
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
                    <h5>Tambahkan produk</h5>
                </div>
                <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">

                            {{-- <div class="btn-group ml-2">
                                <button type="button" class="btn btn-primary">Album</button>
                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($provinsi as $kateg)
                                        <a class="dropdown-item" href="/kategoriongkir/{{$kateg->slug}}">{{ $kateg->prov_name }}</a>
                                    @endforeach
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Provinsi</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_prov" onchange="window.location.href=this.value">
                                        <option>-- Pilih Provinsi --</option>
                                        @foreach ($provinsi as $kateg)
                                            <option value="/kategoriongkir/{{$kateg->slug}}">{{$kateg->prov_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kota</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_kota">

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ongkir</label>
                                <div class="col-sm-9">
                                    <input type="text" id="nagari_kunjungan" name="nagari_kunjungan" class="form-control @error('nagari_kunjungan') is-invalid @enderror"
                                     value="{{ old('nagari_kunjungan') }}" required>

                                    @error('nagari_kunjungan')
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
