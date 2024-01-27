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
                        <th>Invoice</th>
                        <th>Nama Pemesan</th>
                        <th>Total Pembayaran</th>
                        <th>Rekening</th>
                        <th>Bukti Transfer</th>
                        <th>Alamat Pengiriman</th>
                        <th>Status</th>
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
                <tbody>
                    @foreach ($pembayarans as $key => $datas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $datas->invoice }}</td>
                        <td>{{ $datas->users->name }}</td>
                        <td>{{  $datas['total']  }}</td>
                        <td>{{ $datas->rekenings->bank_name }}</td>
                        <td><img src="{{ asset('storage/' . $datas['bukti_transfer']) }}" style="max-width:100%; max-height:250px; height:auto;" alt="{{ $datas['bukti_transfer'] }}"></td>
                        <td class="custom-td">{{  $datas['alamat']  }}</td>
                        <td>{{ $datas->orders->status }}</td>
                        <td>
                            <a href="/pembayaran/{{ $datas->id }}/edit" class="btn btn-primary">Konfirmasi Pesanan</a>
                            <form action="/pembayaran/{{ $datas->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="ti-trash btn btn-danger" onclick="return confirm('Yakin Menghapus Data?')"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>


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
