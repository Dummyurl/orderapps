<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BucketProductModel extends Model
{
    protected $table = 'bucket_product';


    public function relatedProducts(){
        return $this->hasMany('App\Models\BucketItemsModel','buk_id');
    }

    public function productCategory(){
        return $this->belongsTo('App\Models\CategoryModel','cat_id');
    }
    /**
     * @param $query
     * @param $id
     * @return mixed
     * Bucket product by category
     */
    public function scopeBuckProByCategory($query,$id){
        return $query->where('cat_id',$id);
    }
}
