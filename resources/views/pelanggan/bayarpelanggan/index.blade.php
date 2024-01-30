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
        <form action="/listorder" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Informasi Pembayaran</h2>
                    <div class="p-3 p-lg-5 border bg-white">



                        <div class="form-group row">
                            <div class="text-right">
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Nama User<span class="text-danger">*</span></label>
                                <input type="text" value="{{$pembayaran->users->name  }}" class="form-control" id="c_address" name="c_address" placeholder="Nama Kota">
                            </div>
                        </div>

                        @if($order && $order->alamat)
                            <div class="form-group mt-3">
                                <label for="c_companyname" class="text-black">Alamat Lengkap</label>
                                <p>Silahkan masukkan alamat lengkap sebelum melanjutkan proses pembayaran!</p>
                                <textarea name="alamat" id="c_order_notes" cols="30" rows="5" class="form-control" required placeholder="Tulis alamat lengkap...">{{ $order->alamat }}</textarea>
                            </div>
                        @else
                            <div class="form-group mt-3">
                                <label for="c_companyname" class="text-black">Alamat Lengkap</label>
                                <textarea name="alamat" id="c_order_notes" cols="30" rows="5" class="form-control" required placeholder="Tulis alamat lengkap...">{{ $order ? $order->alamat : '' }}</textarea>
                            </div>
                        @endif


                        <div class="form-group row">
                            <div class="col-md-12">
                                <label  class="text-black">Subtotal Pembayaran<span class="text-danger">*</span></label>
                                <input type="number" value="{{ $order->subtotal }}" class="form-control" id="subtotal"  name="subtotal" placeholder="Total Pembayaran" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label  class="text-black">Ongkir<span class="text-danger">*</span></label>
                                <input type="number" value="{{ $order->ongkirs->ongkir }}" class="form-control"  placeholder="Total Pembayaran" readonly>
                            </div>
                        </div>

                        <input type="hidden" value="{{ $order->id }}" name="order_id">

                    </div>
                </div>
                <div class="col-md-6" style="margin-top: 50px">
                    <div class="p-3 p-lg-5 border bg-white">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label  class="text-black">Total Pembayaran<span class="text-danger">*</span></label>
                                        <input type="number" value="{{ $order->ongkirs->ongkir + $order->subtotal}}" class="form-control" id="subtotal"  name="total" placeholder="Total Pembayaran" readonly>
                                    </div>
                                </div>
                                <label for="c_address"class="text-black">Metode Pembayaran<span class="text-danger">*</span></label>
                                <select id="rekening_id" name="rekening_id" class="form-control">
                                    <option value="1">Select a bank</option>
                                    @foreach ($rekening as $data)
                                            @if(old('id_rekening',$data->id_rekening) == $data->id_rekening)
                                                <option value="{{ $data->id_rekening }}" selected>{{ $data->bank_name }}</option>
                                            @else
                                                <option value="{{ $data->id_rekening }}">{{ $data->bank_name }}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table">
                                    <label>Silahkan transfer pada bank yang tertera dibawah ini!</label>
                                    <caption>Data Rekening</caption>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Bank</th>
                                            <th>Nomor Rekening</th>
                                        </tr>
                                    </thead>

                                    <!-- Kemudian bagian HTML templatenya -->
                                    <style>
                                        .custom-td {
                                            white-space: pre-wrap;
                                        }
                                    </style>
                                    @php $no = 1; @endphp
                                    <tbody>
                                        @foreach ($rekening as $datas)
                                        <tr>
                                            <th scope="row">{{ $no++}}</th>
                                            <td>{{ $datas['name'] }}</td>
                                            <td>{{ $datas['bank_name'] }}</td>
                                            <td>{{ $datas['rek'] }}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>


                                </table>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address"
                                class="text-black">Bukti Transfer<span class="text-danger">*</span></label>
                                <input type="file" id="bukti_transfer" name="bukti_transfer"
                                class="form-control @error('bukti_transfer') is-invalid @enderror"
                                    value="{{ old('bukti_transfer') }}" onchange="previewImage()" required>
                                <img class="image-preview img-fluid" style="display: none;" alt="bukti_transfer">
                                @error('bukti_transfer')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="m-3 text-end form-group">
                            <button class="btn btn-black btn-lg py-3 btn-block" type="submit">Bayar</button>
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
<script>

    function previewImage() {
         const image = document.querySelector('#bukti_transfer');
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
