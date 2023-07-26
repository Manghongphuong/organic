<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_cate',
        'name_pr',
        'img',
        'thumbnail',
        'number',
        'price',
        'promotional_price',
        'description',
        'status',
        'rate',
        'view',
        'slug'
    ];

    public function getThumbnailAttribute($value){
        return json_decode($value) ?? [];
    }
    public function category(){
        return $this->hasOne(Category::class, 'id_cate','id');
    }
    public function comment(){
        return $this->hasMany(Comment::class,'id_product','id');
    }
    public function cart_detail(){
        return $this->hasMany(CartDetail::class,'id_product','id');
    }
    public function wishlist(): HasMany {
        return $this->hasMany(Wishlist::class);
    }

    public function scopeSearch($query){
        if(request()->search !== null){
            $search = request()->search;
            $query = $query->where('name_pr', 'like', '%' .$search . '%');
        }
        return  $query ;
    }
    public function scopeSort($query){
        if (request()->filter !== null){
            $filter = request()->filter;
            if($filter == 'ascending'){
                $filter = $query->orderBy('price', 'asc');
            } elseif ($filter == 'decrease'){
                $filter = $query->orderBy('price', 'desc');
            } elseif ($filter == 'name_az'){
                $filter = $query->orderBy('name_pr', 'asc');
            } elseif ($filter == 'name_za'){
                $filter = $query->orderBy('name_pr', 'desc');
            }
        }
        elseif (request ()->price_min !== null && request()->price_max !== null){
            $price_min = request()->price_min;
            $price_max = request()->price_max;
            if ($price_min >= 0 && $price_max > 0){
                $filter = $query -> whereBetween('price', [$price_min, $price_max])->orderBy('price', 'asc');
            } else {
                $filter = $query -> orderBy('price', 'asc');
            }
        }
        else {
            $filter = $query -> orderBy('created_at', 'desc');
        }
        
        return $filter ;
    }

}
