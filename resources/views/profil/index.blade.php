@extends('tampilan.main')
@section('content')

<!-- Contextual classes table starts -->
<div class="card">
    <div class="card-header">
        <h5>Profil Perusahaan</h5>
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
    <div class="row m-2">
        <div class="alert alert-success col-sm-3 ml-3 mb-2" role="alert">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="card m-3" >
        <div class="row g-0">
            @foreach ($datas as $data)

            <div class="col-md-11">
                <div class="card-body">
                    <div class="text-center">
                        <p>{!! $data['body'] !!}</p>
                    </div>
                </div>
              </div>

            <div class="col-md-1 mt-4">
                <a href="/profil/{{ $data->id }}/edit" class="ti-pencil btn btn-primary"></a>
            </div>
            @endforeach
        </div>
      </div>

</div>

</div>




@endsection
