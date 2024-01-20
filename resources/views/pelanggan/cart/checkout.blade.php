@extends('tampilan2.main')
@section('content')

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Checkout</h1>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section">
    <div class="container">

        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="h3 mb-3 text-black">Tujuan Pengiriman</h2>
                <div class="p-3 p-lg-5 border bg-white">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_companyname" class="text-black">Nomor Faktur</label>
                            <input type="text" class="form-control" id="c_companyname" name="c_companyname">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">ID User <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Nama Kota">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Voucher<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Nama Kota">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Sub Total Produk <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Nama Kota">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Total Pembayaran<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Nama Kota">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Metode Pembayaran<span class="text-danger">*</span></label>
                            <select id="c_country" class="form-control">
                                <option value="1">Select a bank</option>
                                <option value="2">BRI</option>
                                <option value="3">BCA</option>
                                <option value="4">Mandiri</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Bukti Transfer<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="c_address" name="c_address" placeholder="Nama Kota">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6" style="margin-top: 100px">
                <div class="form-group">
                    <label for="c_country" class="text-black">Provinsi <span class="text-danger">*</span></label>
                    <select id="c_country" class="form-control">
                        <option value="1">Select a country</option>
                        <option value="2">bangladesh</option>
                        <option value="3">Algeria</option>
                        <option value="4">Afghanistan</option>
                        <option value="5">Ghana</option>
                        <option value="6">Albania</option>
                        <option value="7">Bahrain</option>
                        <option value="8">Colombia</option>
                        <option value="9">Dominican Republic</option>
                    </select>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="c_address" class="text-black">Kota <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <select id="c_country" class="form-control">
                                <option value="1">Select a country</option>
                                <option value="2">bangladesh</option>
                                <option value="3">Algeria</option>
                                <option value="4">Afghanistan</option>
                                <option value="5">Ghana</option>
                                <option value="6">Albania</option>
                                <option value="7">Bahrain</option>
                                <option value="8">Colombia</option>
                                <option value="9">Dominican Republic</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Tulis alamat lengkap..."></textarea>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="c_address" class="text-black">Ongkir<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="c_address" name="c_address" placeholder="Ongkir">
                    </div>
                </div>
                    <div class="m-3 text-end form-group">
                    <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='thankyou.html'">Kirim</button>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
    <!-- </form> -->
    </div>
</div>
@endsection
