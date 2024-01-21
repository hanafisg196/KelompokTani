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
                <form method="post" action="{{ route('ongkir.update',
                 ['ongkir'=>$data['id_ongkir']]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-block">

                        <div class="form-group">
                            <label for="provinsi" class="col-sm-3 col-form-label"></label>
                            <div class="col-md-3">
                                <input type="text" id="id_prov" name="id_prov"
                                 class="form-control @error('id_prov') is-invalid @enderror"
                                 value="{{$data->provinsi->prov_name}}" required readonly>
                             </div>
                            </div>

                            <div class="form-group">
                                <label for="provinsi" class="col-sm-3 col-form-label"></label>
                                <div class="col-md-3">
                                    <input type="text" id="id_prov" name="id_prov"
                                     class="form-control @error('id_prov') is-invalid @enderror"
                                     value="{{$data->kota->city_name}}" required readonly>
                                 </div>
                                </div>
                            <div class="form-group">
                                <label for="provinsi" class="col-sm-3 col-form-label"></label>
                                <div class="col-md-3">
                                    <input type="text" id="ongkir" name="ongkir"
                                     class="form-control @error('ongkir') is-invalid @enderror"
                                     value="{{ old('ongkir', $data['ongkir'])}}" required>
                                    @error('ongkir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                 </div>
                                </div>
                            <div class="m-2">
                                <a href="/onkir" class="btn waves-effect waves-light btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                </form>
            <!-- Basic Form Inputs card end -->
        </div>
    </div>
</div>
@endsection
