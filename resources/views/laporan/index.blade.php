@extends('tampilan.main')
@section('content')

<div class="page-body">
    <!-- Basic table card start -->

    <div class="card">
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <div class="text-center">
                            <table style="border: 1px">

                                <a href="/cetak" class="btn btn-primary pull-right" target="_blank">Cetak</a>
                                <h5 class="text-center">TOKO TANI SINAR HARAPAN</h5>
                                <p class="text-center">Jln. Lintas Padang Solok Selatan. Kec. Danau Kembar, Kab. Solok</p>
                                <hr style="border: 1px solid #000;">
                                <h4 class="text-center">Laporan Penjualan</h4>
                                <div class="table-responsive" style="margin-top: 10px">
                                    <table class="table table-hover table-bordered" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center table-info" colspan="12"><h4>Tahun {{ \Carbon\Carbon::now()->format('Y') }}</h4></th>
                                            </tr>
                                            <tr class="text-center" >
                                                @foreach ( $laporans as $laporan)
                                                <td><h5>{{ $laporan['z'] }}</h5></td>
                                                @endforeach
                                            </tr>

                                            <tr>
                                                @foreach ( $laporans as $laporan)
                                                <td><p style="font-weight: bold;">Total Pemasukan</p>  Rp. {{ number_format($laporan['total']) }}</td>
                                                @endforeach
                                            </tr>
                                        </thead>
                                    
                                        <tbody>
                                            <tr>
                                                @foreach ($laporans as $laporan)
                                                    <td>
                                                        <ul>
                                                            @foreach ($laporan['products']
                                                            as $productName => $productData)
                                                            <li>
                                                                {{ $productName }} - Terjual {{ $productData['qty']}} Produk
                                                              
                                                            </li>
                                                        @endforeach
                                                        </ul>
                                                    </td>
                                                @endforeach
                                            </tr>
                                           
                                        </tbody>
                                        </tbody>
                                        
                                    </table>
                                </div>

                                <table class="mt-5" style="width: 100%;">

                                    <tr>
                                        <td style="width: 50%;">

                                        </td>
                                        <td style="width: 50%;">
                                            <table class="center">
                                                <tr>
                                                        <p style="text-align: center">Aka Gadang, {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
                                                        <br>
                                                        <br>
                                                        <p style="text-align: center">Zulkifli</p>
                                                        <p style="text-align: center">
                                                            Ketua Kelompok Tani
                                                        </p>
                                                </tr>
                                        </td>
                                    </tr>

                                </table>
                            </table>
                    </div>
                </table>
            </div>
        </div>
    </div>



</div>


@endsection