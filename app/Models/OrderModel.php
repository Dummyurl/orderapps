<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class OrderModel extends Model
{
    protected $table = 'order';

    public function scopeGetPendingOrder($query){
        return $query->select('id','product_detail','total')->where('status','pending');
    }

        public function scopeGetOrderById($query,$id){
            return $query->where('id',$id);
        }
}
