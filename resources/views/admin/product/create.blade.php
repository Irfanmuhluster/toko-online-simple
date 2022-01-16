@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-center h-100">
            <h1>Create Product</h1>
        </div> 
        @if (session()->has('success'))
            <h2>Sukses</h2>
        @endif
        
        <div class="col-xl-12 col-md-12 col-sm-12">
            <form action="{{ route('admin.product.store') }}" id="user-form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group ">
                    <label for="title"><strong>SKU</strong> <span class="text-danger">*</span></label>
                    <input type="text" name="sku" id="title" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku') }}" placeholder="SKU" /> 
                    @error('sku')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group ">
                    <label for="name"><strong>Name Product</strong> <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Name Product" /> 
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group ">
                    <label for="price"><strong>Price</strong> <span class="text-danger">*</span></label>
                    <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Price" /> 
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group" >
                    <label for="message"><strong>Product Image</strong> <span class="text-danger">*</span></label>
                    <div class="card-body">
                        <br>
                        <input type="file" name="image" id="image" class="form-control  @error('image') is-invalid @enderror" value="">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-end py-4">
                    <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    {{-- <a href="#" type="button" class="btn btn-danger">Batal</a> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
