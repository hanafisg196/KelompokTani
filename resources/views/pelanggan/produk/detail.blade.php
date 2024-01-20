@extends('tampilan2.main')
@section('content')

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Detail Produk</h1>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->


<div class="card mx-auto" style="max-width: 80%; margin-top: 30px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="/assets2/images/product-3.png" class="img-fluid product-thumbnail">
            {{-- @if ($data['image'])
            <img src="{{ asset('storage/' . $data['image']) }}" class="image-preview img-fluid" width="400" height="400" >
            @else
            <img class="image-preview img-fluid" style="display: none;">
            @endif
            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror"
                value="{{ old('image', $data['image']) }}" onchange="previewImage()" >
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror --}}
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <form method="POST" action="/produk" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Produk</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                     value="{{ old('name') }}" readonly required>

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                     value="{{ old('name') }}" readonly required>

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Stok</label>
                                <div class="col-sm-9">
                                    <input type="number"  id="stok" name="stok" class="form-control @error('stok') is-invalid @enderror"
                                     value="{{ old('stok') }}" readonly required>

                                    @error('stok')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Harga</label>
                                <div class="col-sm-9">
                                    <input type="number" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror"
                                     value="{{ old('harga') }}" readonly required>

                                    @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <input type="textarea" id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                     value="{{ old('deskripsi') }}" readonly required>

                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>


                            </div>
                            <div class="text-end m-2">
                                <a href="/produkpelanggan" class="btn waves-effect waves-light btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
