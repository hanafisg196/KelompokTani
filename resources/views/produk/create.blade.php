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
                <form method="POST" action="/produk" enctype="multipart/form-data">
                    @csrf
                    <div class="card-block">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Produk</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name"
                                     class="form-control @error('name') is-invalid @enderror"
                                     value="{{ old('name') }}" required>

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-md-3">
                                    <select class="form-control" name="category_id" >
                                        @foreach ($categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-md-3">
                                    <input type="file" id="image" name="image" 
                                    class="form-control @error('image') is-invalid @enderror"
                                        value="{{ old('image') }}" onchange="previewImage()" required>
                                    <img class="image-preview img-fluid" style="display: none;" alt="image">
                                    
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Harga</label>
                                <div class="col-sm-9">
                                    <input type="number" id="harga" name="harga" 
                                    class="form-control @error('harga') is-invalid @enderror"
                                     value="{{ old('harga') }}" required>

                                    @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Stok</label>
                                <div class="col-sm-9">
                                    <input type="number" id="stok" name="stok" 
                                    class="form-control @error('stok') is-invalid @enderror"
                                     value="{{ old('stok') }}" required>

                                    @error('stok')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <input type="textarea" id="deskripsi" name="deskripsi" 
                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                     value="{{ old('deskripsi') }}" required>

                                    @error('deskripsi')
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
