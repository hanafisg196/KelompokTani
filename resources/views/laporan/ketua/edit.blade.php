

@extends('tampilan.main')
@section('content')

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Ketua</h5>

        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="/ketua"><i class="ti-write"></i></a>
            </li>
           <li class="breadcrumb-item"><a href="/ketua">Ketua</a>
           <li class="breadcrumb-item"><a href="/ketua/create">Tambah</a>
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
                    <h5>Tambahkan Ketua</h5>
                </div>
                <form method="POST" action="{{ route('ketua.update', ['ketua' => $data['id']]) }}"
                     enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-sm-12" style="width:30%">Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="nama" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    style="width:50%"   value="{{ old('nama', $data['nama'])}}" required>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12" style="width:30%">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" id="alamat" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    style="width:50%" value="{{ old('alamat', $data['alamat'])}}"required>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12" style="width:30%">Email</label>
                            <div class="col-sm-9">
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    style="width:50%" value="{{ old('email', $data['email'])}}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12" style="width:30%">Telepon</label>
                            <div class="col-sm-9">
                                <input type="number" id="nohp" name="nohp" 
                                    class="form-control @error('nohp') is-invalid @enderror"
                                    style="width:50%" value="{{ old('nohp', $data['nohp'])}}" required>
                                @error('nohp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                            <div class="m-2">
                                <a href="/ketua" class="btn waves-effect waves-light btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        
                </form>
            <!-- Basic Form Inputs card end -->
      
        </div>
    </div>
</div>


</div>
<script>


    </script>
@endsection
