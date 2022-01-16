@extends('layouts.user')

@section('content')

<div class="col-xl-10 col-lg-10 col-md-10 mx-auto">
    
<h2 class="py-4">Keranjang Belanja Anda : </h2>
<form action="{{ route('user.cart.update') }}" method="post">
    @csrf
<div class="row">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Hapus</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($carts as $index => $item)
                    <tr>
                        <td>{{ $item['product']['name'] }}</td>
                        <td>Rp. {{ number_format($item['product']['price'], 0, ',', '.') }}</td>
                        <td width="7%">
                            <input  type="hidden" name="id_cart[]" id="id_product" value="{{ $item['id'] }}">
                            {{-- <input  type="hidden" name="id_product[]" id="id_product" value="{{ $item->id_product }}"> --}}
                            <input  type="number" name="quantity[]" id="title" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $item['quantity']) }}">
                        </td>
                        <td>
                            Rp. {{ number_format($item['sub_total'], 0, ',', '.') }}
                        </td>
                        <td><div class="btn btn-sm btn-danger pull-right delete" title="Hapus" data-toggle="modal" data-target="#deleteMenu-{{ $index }}" data-id="2">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </div></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <button class="btn btn-primary" type="submit">Update</button>
    <a href="{{ route('user.cart.checkout') }}" class="btn btn-primary" type="submit">checkout</a>
</form>
</div>

@endsection
