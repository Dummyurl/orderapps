<?php
namespace App\Http\Repository;

use App\Models\CategoryModel;
use App\Models\CategoryAttributeModel;
use Carbon\Carbon;

class CategoryRepository{

    public function createNew($data =[]){

        try{
                //dd($data);
            if(isset($data['without_Variant_cate']) && !isset($data['bucket_cate'])){
                $category = $data['category_name'];
                $insertArray = [
                    'category_name'=> $category,
                    'created_at'=>Carbon::now()
                ];
                $insert =  CategoryModel::insert($insertArray);
            }
            elseif (isset($data['bucket_cate'])){
                $category = $data['category_name'];

                ($data['bucket_item_cate'] == 1 ? $bucket_cate = true : $bucket_cate = '');
                $insertArray = [
                    'category_name'=> $category,
                    'bucket_cat'=> $bucket_cate,
                    'created_at'=>Carbon::now()
                ];
                $insert =  CategoryModel::insert($insertArray);
            }
            else{
                $category = $data['category_name'];
                unset($data['category_name']);
                unset($data['counter']);
                unset($data['_token']);

                $cat_id = CategoryModel::insertGetId(['category_name'=> $category,'created_at'=>Carbon::now()]);
                foreach ($data as $key => $value){
                    $insertArray = [
                        'cat_id' => $cat_id,
                        'category_name'=> $category,
                        'attribute_name'=> $value,
                        'created_at'=>Carbon::now()
                    ];

                    $insert = CategoryAttributeModel::insert($insertArray);


                }

            }

        }
        catch (\Exception $exception){
            return ['code' => 503, 'message' => $exception->getMessage()];
        }
        return true;
    }

    public function updateCategory($data = []){
        //dd($data);
        try{

            if(isset($data['bucket_cat']) && $data['bucket_cat'] == 1){
                $category = $data['category_name'];
                $updateArray = [
                    'category_name'=> $category,
                    'bucket_cat'=> 1,
                    'updated_at'=>Carbon::now()
                ];
                $update =  CategoryModel::Where('id',$data['cat_id'])->update($updateArray);

            }
            elseif ($data['bucket_cat'] == 0 && !isset($data['counter'])){
                $category = $data['category_name'];
                $updateArray = [
                    'category_name'=> $category,
                    'bucket_cat'=> 0,
                    'updated_at'=>Carbon::now()
                ];
                $update =  CategoryModel::Where('id',$data['cat_id'])->update($updateArray);
            }
            else{

                $category = $data['category_name'];
                $cat_id = $data['cat_id'];
                unset($data['category_name']);
                unset($data['counter']);
                unset($data['initial_counter']);
                unset($data['_token']);
                unset($data['cat_id']);
                unset($data['bucket_cat']);


                $updateArray = [
                    'category_name'=> $category,
                    'bucket_cat'=> 0,
                    'updated_at'=>Carbon::now()
                ];

                    $update =  CategoryModel::Where('id',$cat_id)->update($updateArray);
                  if(count($data) > 0){
                      foreach ($data as $key => $value){
                          $insertArray = [
                              'cat_id' => $cat_id,
                              'attribute_name'=> $value,
                              'created_at'=>Carbon::now()
                          ];

                          $insert = CategoryAttributeModel::insert($insertArray);

                         }
                  }

            }

        }
        catch (\Exception $exception){
            return ['code' => 503, 'message' => $exception->getMessage()];
        }
        return true;

    }
}