@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-left h-100">
            <h2>Purchase Order</h2>
        </div> 
        @if (session()->has('success'))
            <h2>Sukses</h2>
        @endif
        
        <div class="col-xl-12 col-md-12 col-sm-12 py-4">
            <form action="{{ route('admin.purchase.store') }}" id="user-form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                      <th><strong>Invoice Number</strong> <span class="text-danger">*</span></th>
                                      <td><input type="text" name="invoice" id="invoice" class="form-control @error('invoice') is-invalid @enderror" value="{{ old('invoice') }}" placeholder="invoice" /> 
                                        @error('invoice')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror</td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>

                <div class="row border">
                    <h2 class="p-4 col-md-12">Add Products</h2>
                    <div class="px-4 col-md-10">
                        <button type="button" id="plus" class="btn btn-success mb-4"><i class="fa fa-plus" aria-hidden="true"></i> Add Product</button>
                        <div class="border mb-4">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                      <td><strong>Search Product</strong> <span class="text-danger">*</span></td>
                                      <td><input type="text" name="" id="id_product" class="form-control @error('id_product') is-invalid @enderror" value="{{ old('id_product') }}" placeholder="Search Product" /> 
                                        <input type="hidden" name="detail[0][id_product]" id="id_product_val" class="form-control @error('id_product') is-invalid @enderror" value="{{ old('id_product') }}" placeholder="Search Product" /> 
                                        @error('id_product')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Quantity</strong> <span class="text-danger">*</span></td>
                                        <td><input type="text" name="detail[0][quantity]" id="quantity" class="form-control @error('quntity') is-invalid @enderror" value="{{ old('quantity') }}" placeholder="Quantity" /> 
                                          @error('quntity')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Price</strong> <span class="text-danger">*</span></td>
                                        <td><input type="text" name="detail[0][price]" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Price" /> 
                                          @error('price')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="element">

                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-end py-4">
                    <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="#" type="button" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('js')

<script src="{{ asset('default') }}/js/jquery.autocomplate.js"></script>
<script type="text/javascript" src="{{ asset('default') }}/vendor/datetimepicker/moment.min.js"></script>
    <script type="text/javascript">    
    // jquery
	$(document).ready(function () {
        var getUrl = window.location
        var baseUrl = getUrl.protocol + '//' + getUrl.host + '/'
            $(function () {
                $('#id_product').autocomplete({
                    serviceUrl: baseUrl + 'admin/purchase/get/product?search=',
                    onSelect: function (suggestion) {
                        $('#id_product_val').val(suggestion.id)
                    }
                })
        })
    });

    // javascript
    let plus =  document.getElementById("plus");
    let count = 0;
    
    plus.addEventListener('click', (event) => {
        console.log('woyy');
        count++;
        let element = event.target;

        if(document.getElementById("element")){
            // create element

            x = document.createElement("div");
            x.setAttribute("class", "border mb-4");
            x.setAttribute("id", `border_${count}`);
            document.getElementById("element").appendChild(x);

            // create table
            let table = document.createElement("table");
            
            table.setAttribute("class", "table table-borderless")
            table.setAttribute("id", `table_${count}`)
            
            document.getElementById(`border_${count}`).appendChild(table);

            let tbody = document.createElement("tbody");
            document.getElementById(`table_${count}`).appendChild(tbody);
            let row = tbody.insertRow(0);
            
            let cell1 = row.insertCell(0);
            let cell2 = row.insertCell(1);
            cell1.innerHTML = `<strong>Search Product</strong> <span class="text-danger">*</span>`;
            cell2.innerHTML = `<input type="text" name="" id="id_product_${count}" class="form-control @error('id_product') is-invalid @enderror" value="" placeholder="Search Product" />
            <input type="hidden" name="detail[${count}][id_product]" id="id_product_val_${count}" class="form-control @error('id_product') is-invalid @enderror" value="{{ old('id_product') }}" placeholder="Search Product" /> 
            `;


            let row2 = tbody.insertRow(1);

            let cell3 = row2.insertCell(0);
            let cell4 = row2.insertCell(1);
            cell3.innerHTML = `<strong>Quantity</strong> <span class="text-danger">*</span>`;
            cell4.innerHTML = `<input type="text" name="detail[${count}][quantity]" id="quntity" class="form-control @error('quntity') is-invalid @enderror" value="{{ old('quntity') }}" placeholder="Quantity" />`;


            let row3 = tbody.insertRow(2);

            let cell5 = row3.insertCell(0);
            let cell6 = row3.insertCell(1);
            cell5.innerHTML = `<strong>Price</strong> <span class="text-danger">*</span>`;
            cell6.innerHTML = `<input type="text" name="detail[${count}][price]" id="quntity" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Price" />`;


            var getUrl = window.location
            var baseUrl = getUrl.protocol + '//' + getUrl.host + '/'
            $(function () {
                $(`#id_product_${count}`).autocomplete({
                    serviceUrl: baseUrl + 'admin/purchase/get/product?search=',
                    onSelect: function (suggestion) {
                        $(`#id_product_val_${count}`).val(suggestion.id)
                    }
                })
            })


        }
    });

    </script>
@endpush

@endsection