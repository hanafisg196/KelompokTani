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
                            <label  class="text-black">Subtotal Pembayaran<span class="text-danger">*</span></label>
                            <input type="number" value="{{ $bayar->total }}" class="form-control" id="subtotal"  name="subtotal" placeholder="Total Pembayaran" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Nama Bank<span class="text-danger">*</span></label>
                            <input type="text" value="{{$pembayaran->rekenings->bank_name }}" class="form-control" id="c_address" name="c_address" placeholder="Nama Kota">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <p style="margin-bottom:10px">Bukti Transfer</p>
                            <img id="c_address" src="{{ asset('storage/' . $bayar->bukti_transfer) }}" style="max-width:100%; max-height:500px; height:auto;" alt="{{ $bayar->bukti_transfer }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Detail Pesanan</h5>
                </div>
                <div class="card-block accordion-block">
                    <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
                        <thead style="border: 1px solid black;">
                            <tr>
                                <th style="border: 1px solid black;">No</th>
                                <th style="border: 1px solid black;">Gambar</th>
                                <th style="border: 1px solid black;">Nama Produk</th>
                                <th style="border: 1px solid black;">Quantity</th>
                                <th style="border: 1px solid black;">Harga</th>
                                <th style="border: 1px solid black;">Total</th>
                            </tr>
                        </thead>
                        <tbody style="border: 1px solid black;">
                            @foreach ($details->where('order_id', $pembayaran->order_id) as $detail)
                                <tr style="border: 1px solid black;">
                                    <td style="border: 1px solid black;">{{ $loop->iteration }}</td>
                                    <td style="border: 1px solid black;" class="product-thumbnail">
                                        <img src="{{ asset('storage/' . $detail->products['image']) }}" style="max-width:100%; max-height:150px; height:auto;" alt="Image" class="img-fluid">
                                    </td>
                                    <td style="border: 1px solid black;">{{ $detail->products->name }}</td>
                                    <td style="border: 1px solid black;">{{ $detail->qty }}</td>
                                    <td style="border: 1px solid black;">{{ $detail->products->harga }}</td>
                                    <td style="border: 1px solid black;">{{ $detail->qty * $detail->products->harga }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <table style="margin-top: 10px">
                            <tr>
                                <td style="border: 1px solid black;">Subtotal</td>
                                <td style="border: 1px solid black;">: {{ $details->sum(function ($item) { return $item->qty * $item->products->harga; }) }}</td>
                            </tr>
                            <tr>
                                <td>Ongkir</td>
                            </tr>
                        </table>
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
