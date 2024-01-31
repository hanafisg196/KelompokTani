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

                                <a href="/cetak" class="btn btn-primary pull-right">Cetak</a>
                                <h5 class="text-center">TOKO TANI SINAR HARAPAN</h5>
                                <p class="text-center">Jln. Lintas Padang Solok Selatan. Kec. Danau Kembar, Kab. Solok</p>
                                <hr style="border: 1px solid #000;">
                                <p class="text-center">Laporan Penjualan</p>
                                <p class="text-center">Tahun {{ \Carbon\Carbon::now()->format('Y') }}</p>
                                <div class="table-responsive" style="margin-top: 10px">
                                    <table class="table table-hover table-bordered" style="width: 100%;">
                                        <thead class="table-info">
                                            <tr>
                                                <th rowspan="2" style="width: 50px">&nbsp;No</th>
                                                <th rowspan="2" class="text-center">Nama Produk</th>
                                                <th class="text-center" colspan="12">Bulan</th>
                                                <th class="text-center" rowspan="2">Total</th>
                                            </tr>
                                            <tr>
                                                @foreach ( $laporans as $laporan)
                                                <td>{{ $laporan['z'] }}</td>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                @foreach ( $laporans as $key => $laporan)
                                                <td>
                                                    <ul>
                                                        @foreach ($laporan['categories'] as $category)
                                                            <li>{{ $category }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                @endforeach
                                                <td colspan="12">
                                                    <table style="width: 100%;">
                                                        
                                                        <tr>
                                                            @foreach ( $laporans as $key => $laporan)
                                                                    
                                                            <td>  
                                                                <table>
                                                                    <tr>
                                                                        <th>Total</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            {{ $laporan['total'] }}
                                                                        </th>
                                                                    </tr>
                                                                </table> 
                                                                
                                                            </td>
                                                            
                                                            @endforeach
                                                        </tr>
                                                       
                                                    </table>
                                                </td>
                                                <td>300 Terjual</td>
                                            </tr>
                                           
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
