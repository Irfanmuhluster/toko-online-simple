<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Product::orderBy('created_at', 'DESC')->paginate('5');
        
        $rank = $data->firstItem();
        return view('admin.product.index', compact('data', 'rank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->validate([
            'sku' => 'required|unique:App\Models\Product,sku',
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,png',
        ]);

        $produk = new Product();
        if ($request->hasFile('image')) {
            // create unique name
            $image_name = Str::replace(' ', '-', $request->name) .'.'. $request->image->extension();

            $request->image->move('uploads', $image_name);
            
            $produk->image = $image_name;
        }

        $produk->sku = $request->sku;
        $produk->name = $request->name;
        $produk->price = $request->price;

        $produk->save();

        session()->flash('success', 'Berhasil simpan data');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
