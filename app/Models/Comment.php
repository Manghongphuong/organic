<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'id_product',
        'content',
        'reply_cm'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id_user', 'id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product');
    }
}
