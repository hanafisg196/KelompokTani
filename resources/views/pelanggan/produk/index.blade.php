@extends('tampilan2.main')
@section('content')

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Produk</h1>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="card mx-auto" style="max-width: 80%; margin-top: 30px; border:0ch">
    <div class="row ">
        @if(session()->has('success'))
        <div class="m-2 row">
            <div class="alert alert-success col-sm-3 ml-3 mb-2" role="alert">
                {{ session('success') }}
            </div>
        </div>
        @endif
        @foreach ($data as $item)
        <div class="col-3">
            <div class="animated-card">
                <img src="{{ asset('storage/' . $item->image) }}" style="margin-top: 20px"
                class="img-fluid product-thumbnail" alt="Nordic Chair">
                <div class="card-body">
                    <h3 class="product-title">{{$item->name}}</h3>
                    <strong class="product-price">{{ $item->harga }}</strong>
                    <a href="/detailproduk/{{ $item->id }}" class="animated-link"> <i class="ti-plus"></i> </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>



@endsection
