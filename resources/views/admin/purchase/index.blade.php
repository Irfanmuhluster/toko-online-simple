@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-center h-100">
            <h1>List Product</h1>
        </div> 
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible">
                {!! session('success') !!}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-success alert-dismissible">
                {!! session('error') !!}
            </div>
        @endif
        
        <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="text-center">Comming Soon</div>
        </div>
    </div>
</div>

@endsection