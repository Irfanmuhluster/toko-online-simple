<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\det_purchase_order;
use App\Models\Product;
use App\Models\purchase_order;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.purchase.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('admin.purchase.create');
    }

    public function searchByParam(Request $request, $param = 'product')
    {
        $query = request()->query();
        if ($param == 'product') {
            //search
            
            $result2 = Product::select('id', 'name')->search()->orderBy('name', 'ASC')->get()->toArray();
            $result = Product::select('id', 'name')->search()->orderBy('name', 'ASC')->get();
            // dd($result);
            $data = $result->map(function($item, $k) {
                $item['value'] = ucfirst($item['name']);
                return $item;
            });

            
            return response([
                'status' => 200,
                'search' => $param,
                'query' => $query['search'],
                'suggestions' => $data
            ]);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoice' => 'required|unique:App\Models\purchase_order,invoice',
        ]);
        // dd($rows);
        try {
            // insert ke table purchase 
            $purchase = new purchase_order();
            $purchase->invoice = $request->invoice;
            $purchase->id_admin = auth()->user()->id;
            $purchase->save();
            
            // insert ke table detail purchase order
            $rows = $request->input('detail');

            foreach ($rows as $row)
            {
                $items[] = [
                    'quantity' => $row['quantity'],
                    'id_product' => $row['id_product'],
                    'id_purchase_order' => $purchase->id,
                    'price' => $row['price'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            
            det_purchase_order::insert($items);

            session()->flash('success', 'Berhasil simpan data');
            return redirect()->route('admin.purchase.index');
        } catch (QueryException $e) {
            return response()->json([
                'error' => "Failed " . $e->errorInfo
            ]);
            session()->flash('error', 'Gagal simpan data');
            return redirect()->route('admin.purchase.index');
        }

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
