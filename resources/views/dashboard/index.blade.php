@extends('tampilan.main')
@section('content')

<div class="page-header card ">
    <div class="card-block ">
        <h5 class="m-b-10">Dashboard</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"><i class="ti-user"></i></a>
            </li>
           <li class="breadcrumb-item"><a href="#">Selamat Datang, {{ auth()->user()->name }} </a>

        </ul>
    </div>
</div>

<div class="row">

    <!-- order-card start -->
    <div class="col-md-6 col-xl-4">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total User</h6>
                <h2 class="text-right"><i class="ti-user f-left"></i><span>{{ number_format($totaluser) }}</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Orderan</h6>
                <h2 class="text-right"><i class="ti-shopping-cart-full f-left"></i><span>{{ number_format($total_orderan) }}</span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Total Pemasukan</h6>
                <h2 class="text-right"><i class="ti-wallet f-left"></i><span>Rp.&nbsp; {{ number_format($totalpemasukan) }}</span></h2>
            </div>
        </div>
    </div>
</div>
@endsection
