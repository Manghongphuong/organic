<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateBlog extends Model
{
    use HasFactory;
    protected $table = 'cateblog';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];

    public function blog(){
        return $this->hasMany(Blog::class, 'id_cate', 'id'); 
    }
}
