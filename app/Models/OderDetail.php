<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';

    public function product(){
        return $this->belongsTo(Product::class, "id_product", "id");
    }
}
