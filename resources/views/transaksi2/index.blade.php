@extends('template.template')
@section('content')

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a id="data-laundry" class="nav-link active" data-toggle="collapse" href="#nav-data" role="button" aria-expanded="false" aria-controls="nav-data">
                  Data Laundry
                </a>
            </li>
            <li class="nav-item">
                <a id="form-laundry" class="nav-link active" data-toggle="collapse" href="#nav-form" role="button" aria-expanded="false" aria-controls="nav-form">
                  Form Laundry
                </a>
            </li>
        </ul>
        <div class="card" style="border-top: 0px">
            <form action="" method="post">
                @csrf
                @include('transaksi2.form')
                @include('transaksi2.data')

        </div>
        @include('transaksi2.member')
        @include('transaksi2.paket')
        @include('transaksi2.mini')
</form>
   @include('transaksi2.script')
  @endsection


