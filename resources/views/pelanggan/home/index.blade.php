@extends('tampilan2.main')
@section('content')

<!-- Start Hero Section -->
<div class="container">
    <div class="card m-3" >
        <div class="card-body">
            <h1>Profil Perusahaan</h1>
            @foreach ($datas as $data)

            <div class="col-md-12">
                <div class="card-body">
                <p class="card-text">{!! $data['body'] !!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
