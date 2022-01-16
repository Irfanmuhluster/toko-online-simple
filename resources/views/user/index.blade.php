@extends('layouts.user')

@section('content')

<div class="col-xl-10 col-lg-10 col-md-10 mx-auto">
    @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible m-4">
              {!! session('success') !!}
          </div>
      @endif
    <div class="row">
      
      @foreach ($product as $item)
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card border-0  mt-3 px-2 pb-3 pt-0">
            <div class="card-body">
              <img class="img img-fluid rounded-3 shadow-sm" src="{{ asset('uploads/'.$item->image) }}" alt="gambar" srcset="">
              <a class="text-decoration-none" href="#">
                <h5 class="my-4 text-primary text-decoration-none">{{ $item->name }}</h5>
              </a>
              <form action="{{ route('user.store.home') }}" method="post">
                @csrf
                @method('POST')
              <input type="hidden" name="id_product" value="{{ $item->id }}">
              <input type="hidden" name="quantity" value="1">
              <h4 class="my-3">
                Rp. {{ number_format($item->price, 0, ',', '.'); }}
              </h4>
              <button type="submit" class="btn p-2 btn-primary btn-primary rounded-2 position-absolute my-3 mx-3 bottom-0 end-0 text-white"> Beli </button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
        
  </div>
</div>

@endsection
