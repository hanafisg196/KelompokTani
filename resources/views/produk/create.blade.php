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

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Produk</label>
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

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kategori</label>
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

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <input type="file" id="nagari_kunjungan" name="nagari_kunjungan" class="form-control @error('nagari_kunjungan') is-invalid @enderror"
                                     value="{{ old('nagari_kunjungan') }}" required>

                                    @error('nagari_kunjungan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Harga</label>
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

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Stok</label>
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

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Deskripsi</label>
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


                            </div>
                            <div class="m-2">
                                <a href="/produk" class="btn waves-effect waves-light btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </div>
                </form>
            <!-- Basic Form Inputs card end -->
        </div>
    </div>
</div>

@endsection
