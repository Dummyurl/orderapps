<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryAttributeModel extends Model
{
    protected $table = "category_atrribute";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    public function scopeGetAttributesById($query,$id){
        return $query->where('cat_id',$id);
    }
}
