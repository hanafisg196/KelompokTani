@extends('tampilan.main')
@section('content')

<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Konfirmasi Pembayaran</h5>

        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="/Konfirmasi pembayaran"><i class="ti-write"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="/Konfirmasi pembayaran">Konfirmasi Pembayaran</a></li>
        </ul>
    </div>
</div>

<div class="page-body">

    <div class="row">
        <!-- Multiple Open Accordion start -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Informasi Pesanan</h5>
                </div>
                <div class="card-block accordion-block">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_companyname" class="text-black">Nomor Faktur</label>
                            <input type="text" class="form-control" id="c_companyname" name="c_companyname">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Nama User<span class="text-danger">*</span></label>
                            <input type="text" value="{{$pembayaran->users->name  }}" class="form-control" id="c_address" name="c_address" placeholder="Nama Kota">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label  class="text-black">Total Pembayaran<span class="text-danger">*</span></label>
                            <input type="number" value="{{ $bayar->total }}" class="form-control" id="subtotal"  name="subtotal" placeholder="Total Pembayaran" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Nama Bank<span class="text-danger">*</span></label>
                            <input type="text" value="{{$pembayaran->rekenings->bank_name }}" class="form-control" id="c_address" name="c_address" placeholder="Nama Kota">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <a href="/pembayaran" class="pull-right mb-3 btn btn-primary">Kembali</a>
                </div>
                <div class="card-block accordion-block">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <h3 style="margin-bottom:10px">Bukti Transfer</h3>
                            <img id="c_address" src="{{ asset('storage/' . $bayar->bukti_transfer) }}" style="max-width:100%; max-height:500px; height:auto;" alt="{{ $bayar->bukti_transfer }}">
                        </div>
                    </div>

                    <div class="pull-right row">

                        <div class="mr-3">
                            <form action="/accept{{ $bayar->id }}" method="post">
                                @csrf
                                <button class="btn btn-info" type="submit">Konfirmasi</button>
                            </form>

                        </div>
                        <div class="mr-2">
                            <form action="/deny{{ $bayar->id }}" method="post">
                                @csrf
                                <button class="btn btn-danger" type="submit">Tolak</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


    {{-- <script>
        // Menghitung total pembayaran ketika halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            var kuanValue = parseFloat(document.getElementById('ongkir').value) || 0;
            var bayarValue = parseFloat(document.getElementById('bayar').value) || 0;

            var total = kuanValue + bayarValue;

            if (!isNaN(total)) {
                document.getElementById('hasil').value = total;
            } else {
                document.getElementById('hasil').value = 'Invalid Input';
            }
        });
    </script> --}}

</div>

@endsection
