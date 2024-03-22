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

                

            <div class="row">
              <div class="alert alert-info col-sm-3 ml-3 mb-2" role="alert">
                  <h5>INFO</h5>
                  @forelse ($vouchers as $voucher)
                      <p>{{ $voucher->ket }}</p>
                      <p>Kode : {{ $voucher->code_voucher }}</p>
                      <p>Expired : {{ $voucher->end_date }}</p>
                  @empty
                      <p>Tidak Ada Voucher Tersedia</p>
                  @endforelse
              </div>
          </div>
          


            <div class="site-blocks-table">
              <table class="table">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Gambar</th>
                    <th class="product-name">Nama Produk</th>
                    <th class="product-price">Harga</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $cartItems as $item )


                  <tr>
                    <td class="product-thumbnail">
                      <img src="{{ asset('storage/' . $item->products['image']) }}" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">{{ $item->products->name }}</h2>
                    </td>
                    <td>{{ $item->products->harga }}</td>
                    <td>
                      <div class="input-group mb-3 d-flex align-items-center quantity-container"
                       style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-black decrease"
                           wire:click.prevent="decrementQty({{ $item->id }})">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center quantity-amount"
                         value="{{ $item->quantity }}" readonly
                         placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-black increase"
                          wire:click.prevent="incrementQty({{ $item->id }})">&plus;</button>
                        </div>
                      </div>
                    </td>
                    <td>{{ $item->products->harga * $item->quantity }}</td>
                    

                    <td><a href="#" class="btn btn-black btn-sm" type="submit"
                       wire:click="removeItem({{ $item->id}})">X</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              @if(session()->has('voucherErr'))
              <div class="col-md-12">
                <label class="text-black h6" for="coupon"> {{ session('voucherErr') }}</label>
              </div>
              @endif

              <div class="col-md-8 mb-3 mb-md-0">
                <input  wire:model="codeVoucher" type="text" class="form-control py-3"
                 id="codeVoucher" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button wire:click="applyVoucher" class="btn btn-black">Apply Coupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Discount</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">{{ $discount}}-</strong>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">{{$subTotal}}</strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$230.00</strong>
                  </div>
                </div>
<<<<<<< HEAD



=======
  
>>>>>>> parent of 337e907 (kontol)
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-black btn-lg py-3 btn-block" 
                    onclick="window.location='/checkout'">Proceed To Checkout</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



</div>
