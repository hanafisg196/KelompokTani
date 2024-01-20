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
        <div class="col-3">
            <div class="animated-card">
                <img src="assets2/images/product-1.png" style="margin-top: 20px" class="img-fluid product-thumbnail" alt="Nordic Chair">
                <div class="card-body">
                    <h3 class="product-title">Nordic Chair</h3>
                    <strong class="product-price">$50.00</strong>
                    <a href="/detailproduk" class="animated-link"> <i class="ti-plus"></i> </a>
                </div>
            </div>
        </div>
        <div class="col-3">
        <div class="animated-card">
            <img src="assets2/images/product-3.png" style="margin-top: 20px" class="img-fluid product-thumbnail">
            <div class="card-body">
                <h3 class="product-title">Nordic Chair</h3>
                <strong class="product-price">$50.00</strong>
                <a href="/detailproduk" class="animated-link"> <i class="ti-plus"></i> </a>
            </div>
        </div>
        </div>
        <div class="col-3">
        <div class="animated-card">
            <img src="assets2/images/product-2.png" style="margin-top: 20px" class="img-fluid product-thumbnail">
            <div class="card-body">
                <h3 class="product-title">Kruzo Aero Chair</h3>
                <strong class="product-price">$78.00</strong>
                <a href="/detailproduk" class="animated-link"> <i class="ti-plus"></i> </a>
            </div>
        </div>
        </div>
        <div class="col-3">
            <div class="animated-card">
                <img src="assets2/images/product-2.png" style="margin-top: 20px" class="img-fluid product-thumbnail" alt="Gambar Produk">
                <div class="card-body">
                    <h3 class="product-title">Kursi Kruzo Aero</h3>
                    <strong class="product-price">$78.00</strong>
                    <a href="/detailproduk" class="animated-link"> <i class="ti-plus"></i> </a>
                </div>
            </div>
        </div>


    </div>
</div>



@endsection
