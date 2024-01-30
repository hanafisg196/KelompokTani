@extends('tampilan.main')
@section('content')

<!-- Contextual classes table starts -->
<div class="card">
    <div class="card-header">
        <h5>Tabel Data Voucher</h5>
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
    <div class="row ml-2">
        <div class="alert alert-success col-sm-3 ml-3 mb-2" role="alert">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="text-right mr-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="ti-plus"></i>Tambah
        </button>
        {{-- <a href="/kegiatan/create" class="btn waves-effect waves-light btn-primary"><i class="ti-plus"></i>Tambah</a> --}}
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table">
                <caption>Data Voucher</caption>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Voucher</th>
                        <th>Minimal Belanja</th>
                        <th>Diskon</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Keterangan</th>
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
                    @foreach ($voucher as $datas)
                    <tr>
                        <th scope="row">{{ $no++}}</th>
                        <td>{{ $datas->code_voucher}}</td>
                        <td>{{ $datas->min }}</td>
                        <td>{{ $datas->discount }}</td>
                        <td>{{ $datas->start_date }}</td>
                        <td>{{ $datas->end_date }}</td>
                        <td>{{ $datas->ket }}</td>
                        <td>
                            <button type="button" class="btn btn-primary exampleModaledit" 
                            data-toggle="modal" data-target="#exampleModaledit{{ $datas->id }}">
                                <i class="ti-pencil"></i>
                            </button>
                            <form action="/voucher/{{ $datas->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="ti-trash btn btn-danger" 
                                onclick="return confirm('Yakin Menghapus Data?')"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
</div>

{{-- Modal Tambah Data --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Voucher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/voucher" enctype="multipart/form-data">
                @csrf
                <div class="card-block">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kode Voucher</label>
                            <div class="col-sm-9">
                                <input type="text" id="code_voucher" name="code_voucher" class="form-control @error('code_voucher') is-invalid @enderror"
                                 value="{{ old('code_voucher') }}" required>

                                @error('nagari_kunjungan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Minimal Belanja</label>
                            <div class="col-sm-9">
                                <input type="number" id="min" name="min" class="form-control @error('min') is-invalid @enderror"
                                 value="{{ old('min') }}" required>

                                @error('min')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Diskon </label>
                            <div class="col-sm-9">
                                <input type="number" id="discount" name="discount" class="form-control @error('discount') is-invalid @enderror"
                                 value="{{ old('discount') }}" required>

                                @error('percent')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tangal Mulai</label>
                            <div class="col-sm-9">
                                <input type="date" id="start_date" name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                                 value="{{ old('start_date') }}" required>

                                @error('start_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Akhir</label>
                            <div class="col-sm-9">
                                <input type="date" id="end_date" name="end_date" class="form-control @error('end_date') is-invalid @enderror"
                                 value="{{ old('end_date') }}" required>

                                @error('end_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" id="ket" name="ket" class="form-control @error('ket') is-invalid @enderror"
                                 value="{{ old('ket') }}" required>

                                @error('ket')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
      </div>
    </div>
  </div>


<!-- Modal Tambah ends -->

{{-- Modal Edit Data --}}
@foreach ($voucher as $datas)
<div class="modal fade" id="exampleModaledit{{ $datas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Voucher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/editdata/{{ $datas->id }}" enctype="multipart/form-data">
                @csrf
                <div class="card-block">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kode Voucher</label>
                            <div class="col-sm-9">
                                <input type="text" id="code_voucher" name="code_voucher" value="{{ $datas->code_voucher }}" class="form-control @error('code_voucher') is-invalid @enderror"
                                  required>

                                @error('nagari_kunjungan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Minimal Belanja</label>
                            <div class="col-sm-9">
                                <input type="number" id="min" name="min" value="{{ $datas->min }}" class="form-control @error('min') is-invalid @enderror"
                                  required>

                                @error('min')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Diskon </label>
                            <div class="col-sm-9">
                                <input type="number" id="discount" name="discount" class="form-control @error('discount') is-invalid @enderror"
                                 value="{{ $datas->discount }}" required>

                                @error('discount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tangal Mulai</label>
                            <div class="col-sm-9">
                                <input type="date" id="start_date" name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                                 value="{{ $datas->start_date }}" required>

                                @error('start_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Akhir</label>
                            <div class="col-sm-9">
                                <input type="date" id="end_date" name="end_date" class="form-control @error('end_date') is-invalid @enderror"
                                 value="{{ $datas->end_date }}" required>

                                @error('end_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" id="ket" name="ket" class="form-control @error('ket') is-invalid @enderror"
                                 value="{{ $datas->ket }}" required>

                                @error('ket')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
      </div>
    </div>
</div>
@endforeach
{{-- Modal Edit Data End--}}


  <!-- Contextual classes table ends -->

{{-- <script>
    $(document).on('click', '.exampleModaledit', function () {
        var _this = $(this).parents('tr');
        var voucherId = _this.data('id_voucher'); // Mengambil ID voucher dari tombol edit
        var formAction = '/voucher/' + voucherId; // Menggabungkan ID voucher ke dalam URL update
        $('#exampleModaledit form').attr('action', formAction);
        $('#codvoucher').val(_this.find(".codvoucher").text());
        $('#e_min').val(_this.find(".min").text());
        $('#e_percent').val(_this.find(".percent").text());
        $('#e_start_date').val(_this.find(".start_date").text());
        $('#e_end_date').val(_this.find(".end_date").text());
        $('#e_ket').val(_this.find(".ket").text());
    });
</script> --}}
<script>

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
