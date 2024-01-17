@extends('tampilan.main')
@section('content')




<!-- Contextual classes table starts -->
<div class="card">
    <div class="card-header">
        <h5>Tabel Data Pembayaran</h5>
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li><i class="fa fa-chevron-left"></i></li>
                <li><i class="fa fa-window-maximize full-card"></i></li>
                <li><i class="fa fa-minus minimize-card"></i></li>
                <li><i class="fa fa-refresh reload-card"></i></li>
                <li><i class="fa fa-times close-card"></i></li>
            </ul>
        </div>
    </div>

    @if(session()->has('success'))
    <div class="row">
        <div class="alert alert-success col-sm-3 ml-3 mb-2" role="alert">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="text-right mr-4">
        <a href="/pembayaran/create" class="btn waves-effect waves-light btn-primary"><i class="ti-plus"></i>Tambah</a>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table">
                <caption>Data Pembayaran</caption>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tujuan Pengiriman</th>
                        <th>Nomor Faktur</th>
                        <th>Voucher</th>
                        <th>Sub Total Produk</th>
                        <th>Diskon</th>
                        <th>Ongkir</th>
                        <th>Total Pembayaran</th>
                        <th>Metode Pembayaran</th>
                        <th>Bukti Transfer</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <!-- Kemudian bagian HTML templatenya -->
                <style>
                    .custom-td {
                        white-space: pre-wrap;
                    }
                </style>
                @php $no = 1; @endphp
                {{-- <tbody>
                    @foreach ($data as $key => $datas)
                    <tr>
                        <th scope="row">{{ $data->firstitem() + $key }}</th>
                        <td>{{ $datas['nagari_kunjungan'] }}</td>
                        <td class="custom-td">{!! $datas['kegiatan'] !!}</td>
                        <td class="custom-td">{!! $datas['hasil'] !!}</td>
                        <td class="custom-td">{!! $datas['langkah'] !!}</td>
                        <td class="custom-td">{!! $datas['rekomendasi'] !!}</td>
                        <td>
                            <a href="/kegiatan/{{ $datas->id }}/edit" class="ti-pencil btn btn-primary"></a>
                            <form action="/kegiatan/{{ $datas->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="ti-trash btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody> --}}


            </table>
        </div>
    </div>
</div>


<!-- Contextual classes table ends -->

  <script>
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    });

    $(document).ready(function() {
        $('.custom-td').each(function() {
            var text = $(this).text();
            var words = text.split(' ');
            var result = '';
            var count = 0;

            for (var i = 0; i < words.length; i++) {
                result += words[i] + ' ';
                count++;

                if (count >= 5) {
                    result += '\n';
                    count = 0;
                }
            }

            $(this).text(result.trim());
        });
    });
</script>

@endsection
