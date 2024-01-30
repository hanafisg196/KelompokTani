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
                                                <th style="width: 50px">&nbsp;No</th>
                                                <th>Nama Produk</th>
                                                <th class="text-center" colspan="12">Bulan</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Baju</td>
                                                <td colspan="12">
                                                    <table style="width: 100%;">
                                                        <tr>
                                                            <td>Jan</td>
                                                            <td>Feb</td>
                                                            <td>Mar</td>
                                                            <td>Apr</td>
                                                            <td>Mei</td>
                                                            <td>Juni</td>
                                                            <td>Juli</td>
                                                            <td>Agus</td>
                                                            <td>Sep</td>
                                                            <td>Okt</td>
                                                            <td>Nov</td>
                                                            <td>Des</td>
                                                        </tr>
                                                        <tr>
                                                            <td>12 Terjual</td>
                                                            <td>34 Terjual</td>
                                                            <td>22 Terjual</td>
                                                            <td>12 Terjual</td>
                                                            <td>23 Terjual</td>
                                                            <td>23 Terjual</td>
                                                            <td>54 Terjual</td>
                                                            <td>23 Terjual</td>
                                                            <td>54 Terjual</td>
                                                            <td>65 Terjual</td>
                                                            <td>23 Terjual</td>
                                                            <td>54 Terjual</td>
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
