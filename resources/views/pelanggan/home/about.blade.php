@extends('tampilan2.main')
@section('content')

<!-- Start Hero Section -->
<div class="container">
    <div class="card m-3" >
        <div class="card-body">
            <h1>Profil Perusahaan</h1>
            @foreach ($data as $datas)

            <div class="col-md-12">
                <div class="card-body">
                    <div class="text-left">

                        <p>{!! $datas['body'] !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
