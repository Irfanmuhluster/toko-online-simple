<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'quantity',
        'id_product'
    ];

    protected $with = ['createdby', 'product'];
    
    protected $appends = ['sub_total'];

    public function createdby()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function getSubTotalAttribute()
    {
        $sub_total = $this->quantity*$this->product->price;
        return $sub_total;
    }

    // public function getTotalAttribute()
    // {
    //     $total = $this->where('id_user', Auth::id())->get();
    //     // dd($total);

    //     $get_total = 0;
    //     foreach($total as $value) {
    //         $get_total+=$value->quantity*$value->product->price;
    //     }
    //     return $get_total;
    // }
}
