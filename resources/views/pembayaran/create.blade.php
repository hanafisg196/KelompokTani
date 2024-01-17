@extends('tampilan.main')
@section('content')

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Pembayaran</h5>

        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="/pembayaran"><i class="ti-write"></i></a>
            </li>
           <li class="breadcrumb-item"><a href="/pembayaran">Pembayaran</a>
                    <li class="breadcrumb-item"><a href="/pembayaran/create">Tambah Pembayaran</a>
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
                    <h5>Tambahkan Pembayaran</h5>
                </div>
                <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tujuan Pengiriman</label>
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
                                <label class="col-sm-3 col-form-label">Nomor Faktur</label>
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
                                <label class="col-sm-3 col-form-label">Voucher</label>
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
                                <label class="col-sm-3 col-form-label">Sub Total Produk</label>
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
                                <label class="col-sm-3 col-form-label">Diskon</label>
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

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Total Pembayaran</label>
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
                                <label class="col-sm-3 col-form-label">Metode Pembayaran</label>
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
                                <label class="col-sm-3 col-form-label">Bukti Transfer</label>
                                <div class="col-sm-9">
                                    <input type="File" id="nagari_kunjungan" name="nagari_kunjungan" class="form-control @error('nagari_kunjungan') is-invalid @enderror"
                                     value="{{ old('nagari_kunjungan') }}" required>

                                    @error('nagari_kunjungan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="m-1">
                                <a href="/pembayaran" class="btn waves-effect waves-light btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </div>
                </form>
            <!-- Basic Form Inputs card end -->
        </div>
    </div>
</div>

@endsection
