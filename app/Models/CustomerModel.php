<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';

    public function customerOrders(){
        return $this->hasMany('App\Models\OrderModel','customer_id');
    }
}
