<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase_order extends Model
{
    use HasFactory;

    public function scopeSearch($query)
    {
        $filter = request()->query();

        return $query
            ->when(@$filter['search'], function ($query, $keyword) {
                return $query->where('name', 'like', "%{$keyword}%");
            });
    }
}
