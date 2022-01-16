<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeSearch($query)
    {
        $filter = request()->query();
        $illegalChar = array(".", ",", "?", "!", ":", ";", "-", "+", "<", ">", "%", "~", "€", "$", "[", "]", "{", "}", "@", "&", "#", "*", "„","/","\/");
        $charString = str_replace($illegalChar, "", $filter['search']);
        return $query
            ->when(@$charString, function ($query, $keyword) {
                return $query->where('name', 'like', "%{$keyword}%");

            });
    }
}
