<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/css/bootstrap.min.css">

<div class="page-body">
    <!-- Basic table card start -->

    <body>
        <center>
            <table style="border: 1px">

                <h5>TOKO TANI SINAR HARAPAN</h5>
                <p>Jln. Lintas Padang Solok Selatan. Kec. Danau Kembar, Kab. Solok</p>
                <hr style="border: 1px solid #000;">
                <p>Faktur Penjualan</p>
                <div>
                    <table style="width: 100%;">
                        <tr>
                            <td width="15%">
                            Nomor Faktur
                            </td>
                            <td>
                                :   {{ $bayar->invoice }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Alamat&nbsp;
                            </td>
                            <td>
                                :   {!! $bayar->alamat !!}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">
                               Tanggal Pembelian
                            </td>
                            <td>
                                :   {{ $orders->created_at->format('d-m-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">
                               Tanggal Pembayaran
                            </td>
                            <td>
                                :   {{ $bayar->created_at->format('d-m-Y') }}
                            </td>
                        </tr>
                    </Table>
                </div>
                <div class="table-responsive" style="margin-top: 10px">
                    <table class="table table-hover table-bordered" style="width: 100%;">
                        <thead class="table-info">
                            <tr>
                                <th style="width: 50px">&nbsp;No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        @php
                            $no=1;
                        @endphp
                        <tbody>
                            @foreach ($details->where('order_id', $orders->id) as $detail)
                                <tr>

                                    <td>{{ $no++ }}</td>
                                    <td>{{ $detail->products->name }}</td>
                                    <td>{{ $detail->qty }}</td>
                                    <td>Rp. {{ number_format($detail->products->harga) }}</td>
                                    <td>Rp. {{ number_format($detail->qty * $detail->products->harga)}}</td>

                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="4">
                                    Subtotal
                                </td>
                                <td>
                                    Rp. {{ number_format($orders->subtotal) }}
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4">
                                    Ongkir
                                </td>
                                <td>
                                    Rp. {{ number_format($orders->ongkirs->ongkir) }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    Total
                                </td>
                                <td>
                                    Rp. {{ number_format($bayar->total) }}
                                </td>
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
                                        <p style="text-align: center">Zulkifli</p>
                                        <p style="text-align: center">
                                            Ketua Kelompok Tani
                                        </p>
                                </tr>
                        </td>
                    </tr>

                </table>
            </table>
     </center>
    <body onload="window.print()">

</div>
