<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    use HasFactory;
    protected $table = 'oder';

    public function getPaymentMethodAttribute($value){
        $status_tt = [
            0 => 'Thanh Toán Chuyển Khoản',
            1 => 'Thanh Toán Khi Nhận Hàng'
        ];
        return $status_tt[$value] ?? 'Thanh Toán Khi Nhận Hàng';
    }

    public function order_detail(){
        return $this->hasMany(OderDetail::class, "id_order", "id");
    }
    public function getStatus(){
        $status_tt = [
            0 => ['Chưa xử lí','secondary'],
            1 => ['Chấp Nhận','primary'],
            2 => ['Đang Giao Hàng','info'],
            3 => ['Hoàn Thành','success'],
            4 => ['Hủy Đơn','danger'],
            5 => ['Giao hàng Không Thành Công','unsuccessful']
        ];
        return $status_tt[$this->status];
    }
}
