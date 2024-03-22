@extends('tampilan.main')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Laporan Harian</h5>
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

    <div class="m-2 col-md-3">
        <form action="/laporanharian" method="post">
            @csrf
            <div class="input-group">

               <input type="date" id="date" name="date">
                <!-- Example split danger button -->
                <label for="" style="width: 10%"></label>
                <div class="input-group-append text-center">
                    <button class="btn btn-primary" type="submit">Print</button>
                </div>
            </div>
        </form>
    </div>

   
</div>
@endsection