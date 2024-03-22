@extends('tampilan.main')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Laporan Bulanan</h5>
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

   
   
    <div class="m-2 col-md-6">
        <form action="/laporanbulanan" method="post">
            @csrf
            <div class="input-group">

                <label for="start_date" style="width:16%">Dari Tanggal</label>
                <input  type="date" id="start_date" name="start_date" required>
                <label for="" style="width:5%"></label>
                 <label for="end_date" style="width: 20%">Sampai Tanggal</label>
                <input type="date" id="end_date" name="end_date" required>
                <label for="" style="width:5%"></label>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Print</button>
                </div>
            </div>
        </form>
    </div>

    

   
</div>
@endsection