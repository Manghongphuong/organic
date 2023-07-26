<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_cate',
        'title',
        'summary',
        'content',
        'views',
        'img'
    ];

    public function cateblog(){
        return $this->belongsTo(CateBlog::class,'id_cate','id');
    }

    public function scopeSearch($query){
        if($key = request()->key){
            $query = $query->where('title', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
