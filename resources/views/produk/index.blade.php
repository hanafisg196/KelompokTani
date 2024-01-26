@extends('tampilan.main')
@section('content')




<!-- Contextual classes table starts -->
<div class="card">
    <div class="card-header">
        <h5>Tabel Data Produk</h5>
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

        <a href="/produk/create" class="btn waves-effect waves-light btn-primary"><i class="ti-plus"></i>Tambah</a>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table">
                <caption>Data Produk</caption>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
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
                    @foreach ($data as $key => $datas)
                    <tr>
                        <th scope="row">{{ $data->firstitem() + $key }}</th>
                        <td>{{ $datas['name'] }}</td>
                        <td class="custom-td">{{ $datas->categories->name }}</td>
                        <td class="custom-td">
                            @if($datas['image'] && file_exists(public_path("storage/{$datas['image']}")))
                            <img src="{{ asset('storage/' . $datas['image']) }}" style="max-width:100%; max-height:250px; height:auto;" alt="{{ $datas['image'] }}">
                        @else
                            <img src="{{ asset('assets/images/noimage.jpg') }}"
                            width="100" height="100" alt="Default Image">
                        @endif
                        </td>
                        <td class="custom-td">{!! $datas['harga'] !!}</td>
                        <td class="custom-td">{!! $datas['stok'] !!}</td>
                        <td class="custom-td">{!! $datas['deskripsi'] !!}</td>
                        <td>
                            <a href="/produk/{{ $datas->id }}/edit" class="ti-pencil btn btn-primary"></a>

                            <form action="/produk/{{ $datas->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="ti-trash btn btn-danger" onclick="return
                                confirm('Yakin Menghapus Data?')"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
</div>

{{-- Modal Tambah Data
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="#" enctype="multipart/form-data">
                @csrf
                <div class="card-block">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" id="nagari_kunjungan" name="nagari_kunjungan" class="form-control @error('nagari_kunjungan') is-invalid @enderror"
                                 value="{{ old('nagari_kunjungan') }}" required>

                                @error('nagari_kunjungan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Bank</label>
                            <div class="col-sm-9">
                                <input type="text" id="nagari_kunjungan" name="nagari_kunjungan" class="form-control @error('nagari_kunjungan') is-invalid @enderror"
                                 value="{{ old('nagari_kunjungan') }}" required>

                                @error('nagari_kunjungan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Produk</label>
                            <div class="col-sm-9">
                                <input type="text" id="nagari_kunjungan" name="nagari_kunjungan" class="form-control @error('nagari_kunjungan') is-invalid @enderror"
                                 value="{{ old('nagari_kunjungan') }}" required>

                                @error('nagari_kunjungan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>
                    </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Tambahkan</button>
        </div>
      </div>
    </div>
  </div>




<!-- Contextual classes table ends --> --}}

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
