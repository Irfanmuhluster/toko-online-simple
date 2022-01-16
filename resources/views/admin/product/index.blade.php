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
        
        <div class="col-xl-12 col-md-12 col-sm-12">
            <a href="{{ route('admin.product.create') }}" class="btn mt-1 mb-4 min-w-auto btn-success">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
            <table class="table shadow thspan-6" id="tableList">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" width="7%">Id</th>
                        <th scope="col"><span class="d-none d-md-block">SKU</span></th>
                        <th scope="col"><span class="d-none d-md-block">Name</span></th>
                        <th scope="col"><span class="d-none d-md-block">Image</span></th>
                        <th scope="col"><span class="d-none d-md-block">Price</span></th>
                        <th scope="col"><span class="d-none d-md-block">Total Stok</span></th>
                        <th scope="col"><span class="d-none d-md-block">Aksi</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $produk)
                    <tr>
                        <td scope="row">
                            {{ $rank++ }}
                        </td>
                        <td>
                            
                            {{ $produk->sku }}
                        </td>
                        <td>
                            
                            {{ $produk->name }}
                        </td>
                        <td>
                            <img src="{{ asset('uploads/'.$produk->image) }}" alt="img" width="50%" class="img-thumbnail">
                        </td>
                        <td>
                            {{ $produk->price }}
                        </td>
                        
                        <td>
                            
                            {{-- {{ $produk->stok }} --}}
                        </td>
                        <td>
                        <a href="{{ route('admin.product.edit', $produk->id) }}" title="Ubah" class="btn btn-sm btn-primary pull-right edit">
                            Edit
                        </a>
                        <div class="btn btn-sm btn-danger pull-right delete" title="Hapus" data-toggle="modal" data-target="#deleteMenu-{{ $index }}" data-id="2">
                            Hapus
                        </div>
    
                        <div class="modal fade scale" id="deleteMenu-{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="deleteMenuTitle" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">Hapus Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-body">    
                                        <form id="role-menu-form-delete" action="{{ route('admin.product.destroy', $produk->id) }}" spellcheck="false"  method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="mb-4 pb-2">Apa Anda yakin ingin menghapus produk ini ?</div>
                                            <div id="role-menu-form-delete-errors"></div>
                                            <button type="submit" class="btn btn-danger mb-2">Hapus</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
        </div>
    </div>
</div>

@endsection