<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\det_order;
use App\Models\order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::orderBy('created_at', 'DESC')->get();
        return view('user.index', compact('product'));
    }


    /**
     * Display a cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        //
        $cart = new Cart();
        $carts = $cart->where('id_user', Auth::id())->orderBy('created_at', 'DESC')->get()->toArray();
        // dd($carts->toArray());
        return view('user.cart', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store ke table Cart
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $cart = new Cart();
        $cart->id_user = auth()->user()->id;
        $cart->quantity = $request->quantity;
        $cart->id_product = $request->id_product;

        $cart->save();
        session()->flash('success', 'Barang Anda telah berhasil masuk ke keranjang belanja');
        return redirect()->route('user.home');
    }


    /**
     * Store ke table order dengan status pendeing order
     */

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
    public function cartupdate(Request $request)
    {
        //
        // $product = $request->toArray();
        // dd($request->id_cart);
        for ($i=0; $i < count($request->id_cart); $i++) { 
             $cart = Cart::find($request->id_cart[$i]);
             $cart->quantity = $request->quantity[$i];
             $cart->update();
        }
        
    }

    public function checkout()
    {
        # code...
        // insert to order
        $carts = cart::where('id_user', Auth::id())->get();
        // dd($carts);
        $order = new order();
        $order->id_user = Auth::id();
        $order->invoice = Carbon::now()->format('Ymd').'-'.str_pad(($order->max('id') ?? 0)+1,3,0, STR_PAD_LEFT);
        $order->status = "pending";
        if($order->save()) {
            foreach($carts as $cart){
                $orderdetail = new det_order();
                $orderdetail->quantity = $cart->quantity;
                $orderdetail->id_product = $cart->id_product;
                $orderdetail->id_order = $order->id;
                $orderdetail->save();
            }
        }
        

        // yg dimaskukan ke detail adalah
        // id_checkout, $id_produk, qty, status pending


        // delete keranjang
        
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
