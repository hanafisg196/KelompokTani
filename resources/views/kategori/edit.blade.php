@extends('tampilan.main')
@section('content')

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Category</h5>

        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="/kategori"><i class="ti-write"></i></a>
            </li>
           <li class="breadcrumb-item"><a href="/kategori">Produk</a>
                    <li class="breadcrumb-item"><a href="/kategori/create">Tambah Produk</a>
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
                    <h5>Edit Category</h5>
                </div>
                <form method="post" action="{{ route('kategori.update', ['kategori' => $data['id']]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-block">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                     value="{{ old('name', $data['name'])}}" required>

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>


                            </div>
                            <div class="m-2">
                                <a href="/kategori" class="btn waves-effect waves-light btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                </form>
            <!-- Basic Form Inputs card end -->
        </div>
    </div>
</div>

@endsection
