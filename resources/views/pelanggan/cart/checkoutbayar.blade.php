@extends('tampilan2.main')
@section('content')

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Checkout</h1>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section">
    <div class="container">
        <form action="/checkout/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Order</h2>
                    <div class="p-3 p-lg-5 border bg-white">

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">ID User <span class="text-danger">*</span></label>
                                <input type="text" value="{{$pembayaran->users->id  }}" class="form-control" id="c_address" name="c_address" placeholder="Nama Kota">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Nama<span class="text-danger">*</span></label>
                                <input type="text" value="{{$pembayaran->users->name  }}" class="form-control" id="c_address" name="c_address" placeholder="Nama Kota">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label  class="text-black">Subtotal Pembayaran<span class="text-danger">*</span></label>
                                <input type="number" value="{{ $pembayaran->oders->subtotal }}" class="form-control" id="subtotal"  name="subtotal" placeholder="Total Pembayaran" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_companyname" class="text-black">Ongkir</label>
                                <input type="text" value="{{$pembayaran->ongkirs->ongkir  }}" class="form-control" id="ongkir_id" name="c_address" placeholder="Nama Kota" readonly>
                            </div>
                        </div>

                        <input type="hidden" value="{{ $pembayaran->oders->id }}" name="order_id">

                    </div>
                </div>
                <div class="col-md-6" style="margin-top: 50px">
                    <div class="p-3 p-lg-5 border bg-white">

                        {{-- <div class="form-group mt-3">
                            <textarea name="alamat" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Tulis alamat lengkap..."></textarea>
                        </div> --}}
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_companyname" class="text-black">Total Pembayaran</label>
                                <p>Subtotal Pembayaran + Ongkir</p>
                                <input type="text" value="{{$pembayaran->ongkirs->ongkir + $pembayaran->oders->subtotal  }}" class="form-control" id="c_address" name="c_address" placeholder="Nama Kota" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address"
                                class="text-black">Metode Pembayaran<span class="text-danger">*</span></label>
                                <select id="id_rekening" name="id_rekening" class="form-control">
                                    <option value="1">Select a bank</option>
                                    @foreach ($rekening as $data)
                                            @if(old('id_rekening') == $data->id_rekening)
                                                <option value="{{ $data->id_rekening }}" selected>{{ $data->bank_name }}</option>
                                            @else
                                                <option value="{{ $data->id_rekening }}">{{ $data->bank_name }}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address"
                                class="text-black">Bukti Transfer<span class="text-danger">*</span></label>
                                <input type="file"
                                class="form-control" id="c_address" name="c_address" placeholder="Nama Kota">
                            </div>
                        </div>
                            <div class="m-3 text-end form-group">
                            <button class="btn btn-black btn-lg py-3 btn-block" type="submit">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
    <!-- </form> -->
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
