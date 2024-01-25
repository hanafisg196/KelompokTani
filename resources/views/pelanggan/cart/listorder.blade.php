@extends('tampilan2.main')
@section('content')

<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="untree_co-section before-footer-section">
        <div class="container">
          <div class="row mb-5">
            @if(session()->has('success'))
                  <div class="row">
                      <div class="alert alert-success col-sm-3 ml-3 mb-2" role="alert">
                          {{ session('success') }}
                      </div>
                  </div>
              @elseif(session()->has('error'))
                  <div class="row">
                      <div class="alert alert-danger col-sm-3 ml-3 mb-2" role="alert">
                          {{ session('error') }}
                      </div>
                  </div>
              @endif
              <div class="site-blocks-table">
                <table class="table">
                  <thead>
                    <tr>
                        <th>Nomor</th>
                        <th class="product-price">Subtotal</th>
                        <th>Detail Produk</th>
                        <th class="product-name">Status</th>
                        @foreach ($orders as $order)
                            @if($order->status == 'unpaid')
                                <th>Aksi</th>
                            @endif
                        @endforeach

                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->subtotal }}</td>
                            <td>
                                <!-- Tabel untuk menampilkan detail produk -->
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Nama Produk</th>
                                            <th>Quantity</th>
                                            <th>Harga</th>
                                            <th>total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($details as $detail)
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <img src="{{ asset('storage/' . $detail->products['image']) }}" alt="Image" class="img-fluid">
                                                  </td>
                                                <td>{{ $detail->products->name }}</td>
                                                <td>{{ $detail->qty }}</td>
                                                <td>{{ $detail->products->harga }}</td>
                                                <td>{{ $detail->qty * $detail->products->harga }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>

                            <td> <button class="@if($order->status == 'unpaid') btn-warning @elseif($order->status == 'paid') btn-success @else btn-sec @endif" >{{ $order->status }}</button> </td>
                            <td>

                                @if($order->status == 'unpaid')
                                    <a href="/listorder/{{ $order->id }}/edit" class="custom-button">Lanjutkan Pembayaran</a>
                                @endif
                                {{-- <a href="/ongkir//edit" class="ti-pencil btn btn-primary"></a> --}}
                                {{-- <form action="/listorder/{{ $order->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="ti-trash delete-button"
                                    onclick="return confirm('Yakin Menghapus Data?')"></button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                </table>
              </div>
          </div>

          <div class="row">
            <div class="col-md-6">

            </div>
          </div>
        </div>
      </div>



  </div>


@endsection
