<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BucketItemsModel extends Model
{
  protected $table = 'bucket_items';


    public function itemRelatedProducts(){
        return $this->hasMany('App\Models\BucketItemRelatedProductsModel','buk_itm_id');
    }

}
