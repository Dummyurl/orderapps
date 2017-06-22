<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{

    protected $table = "product";

    public function productAttributePricing(){
        return $this->hasMany('App\Models\ProductAttibutePricingModel','product_id');
    }

    public function productCategory(){
        return $this->belongsTo('App\Models\CategoryModel','cat_id');
    }

    public function scopeProductsByCategory($query,$id){
        return $query->where('cat_id',$id);
    }

}
