<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/css/bootstrap.min.css">

</head>

<body onload="window.print()">

    <div class="page-body">
    

    <div class="card">
        <div class="card-header text-center">
            <h4>Laporan Bulan - {{ $start_date_month}}</h4>
           
            <p>
                <h4>TOKO TANI SINAR HARAPAN</h4>
              
            </p>
            <p>
                Jln. Lintas Padang Solok Selatan. Kec. Danau Kembar, Kab. Solok
            </p>
            <hr style="border: 1px solid #000;">
           
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

        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table" style="border: 1px">
                    {{-- <caption>Data Pembayaran</caption> --}}
                    <thead>
                        <tr>
                            {{-- <th>No</th> --}}
                            <th>Invoice</th>
                            <th>Nama</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
    
                    <!-- Kemudian bagian HTML templatenya -->
                    <style>
                        .custom-td {
                            white-space: pre-wrap;
                        }
                    </style>
                  @foreach ($data as $item)
                  <tbody>
                      <td>{{ $item->invoice }}</td>
                      <td>{{ $item->users->name }}</td>
                      <td>
                          @php
                              $productNames = '';
                          @endphp
                          @foreach ($item->orders->detail as $detail)
                              @php
                                  $productNames .= $detail->products->name . ', ';
                              @endphp
                          @endforeach
                          {{ rtrim($productNames, ', ') }}
                      </td>
                      <td>
                        @php
                            $quantity = null;
                        @endphp
                          @foreach ($item->orders->detail as $detail)
                              @php
                                  $quantity .= $detail->qty .'.Kg' . ',' ;
                              @endphp
                          @endforeach
                          {{ rtrim($quantity, ', ') }}
                      </td>
                      <td>Rp.{{ number_format($item->orders->subtotal) }}</td>
                  </tbody>
              @endforeach
              
                </table>
                
                
            </div>
            <div class="text-left">
                <br>
                <h5>
                    Total Pemasukan: Rp.{{number_format( $total)}}
                </h5>
            </div>
            <br>
            
        </div>
        <table class="mt-8" style="width: 100%;">
    
            <tr>
                <td style="width: 50%;">
    
                </td>
                <td style="width: 50%;">
                    <table class="center">
                        @foreach ($bos as $item)
                        <tr>
                            <p style="text-align: center">Aka Gadang, {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
                            <br>
                            
                        <p style="text-align: center">{{ $item->nama }}</p>
                            <p style="text-align: center">
                                Ketua Kelompok Tani
                            </p>
                    </tr>
                        @endforeach
                        
                </td>
            </tr>
    
        </table>
    </div>
</div>

</body>