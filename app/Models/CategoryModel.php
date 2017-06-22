<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryAttributeModel;

class CategoryModel extends Model
{
    protected $table = "categories";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Relation category has many attributes.
     */
    public function categoryAttributes(){
        return $this->hasMany('App\Models\CategoryAttributeModel','cat_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Relation category has many products.
     */
    public function categoryProducts(){
        return $this->hasMany('App\Models\ProductModel','cat_id');
    }


    public function scopeGetCategoryById($query,$cat_id){
        return $query->where('id',$cat_id);
    }
    /**
     * @param $query
     * @return mixed
     * get category for Normal items
     */
    public function scopeGetNormalCategory($query){
        return $query->where('bucket_cat',0);
    }

    /**
     * @param $query
     * @return mixed
     * get category for bucket items
     */
    public function scopeGetBucketCategory($query){
        return $query->where('bucket_cat',1);
    }

}
