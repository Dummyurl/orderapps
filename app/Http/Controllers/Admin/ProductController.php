<?php

namespace App\Http\Controllers\Admin;

use App\Models\BucketItemRelatedProductsModel;
use App\Models\BucketProductModel;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\Http\Repository\ProductRepository;
use App\Models\CategoryModel;
use App\Models\BucketItemsModel;
use App\Models\CategoryAttributeModel;
use App\Models\ProductModel;

class ProductController extends Controller
{

    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Add New Product
     */
    public function productIndex(){
        $page = 'products';
        $sub_page = 'add-product';
        $category = CategoryModel::GetNormalCategory()->get()->toArray();
        return view('vendor.product.addproduct' ,compact('category','page','sub_page'));
    }

    /**
     * @param $id
     * @return mixed
     * Get Category Attribute By ID
     */
    public function getCategoryAttribute($id){
        $data = CategoryAttributeModel::GetAttributesById($id)->get();
        return Response::json($data);
    }

    /**
     * @param Request $req
     * @param ProductRepository $prorepo
     * @return \Illuminate\Http\RedirectResponse
     * Add New Product Into Catlog
     */
    public function productAdd(Request $req,ProductRepository $prorepo){
        if ($prorepo->addNewProduct($req->all()))
            return back()->with('returnStatus',true)->with('status' , 101)->with('message','Product Added successfully');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * View All Products.
     */
    public function viewProducts(){
        $page = 'products';
        $sub_page = 'view-product';
        $data = ProductModel::all();
        $products = [];
        foreach ($data as $key_pro => $value_pro){
            $temp_pro = $value_pro->toArray();
            $temp_pro['category'] = $value_pro->productCategory->category_name;
            $pro_attr = $value_pro->productAttributePricing()->get()->toArray();
            if(count($pro_attr) > 0){
                $temp_pro['product_attr_pricing'] = $pro_attr;
            }
            array_push($products,$temp_pro);
        }

        return view('vendor.product.viewproduct' ,compact('products','page','sub_page'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * view of add Bucket Products
     */
    public function bucketProductIndex(){
        $category = CategoryModel::GetBucketCategory()->get();
        $page = 'products';
        $sub_page = 'bucket-product';
        return view('vendor.product.addbucketproduct',compact('category','page','sub_page'));
    }


    /**
     * @param Request $req
     * @param ProductRepository $prorepo
     * Add New Bucket.
     */
    public function bucketProductAdd(Request $req,ProductRepository $prorepo){
        if($prorepo->addNewBucket($req->all()))
        return back()->with('returnStatus',true)->with('status' , 101)->with('message','Bucket Product Added successfully');
    }

    /**
     * View Bucket Products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewBucketProducts(){
        $buc_pro = BucketProductModel::all();
        $page = 'products';
        $sub_page = 'view-bucket-product';
        $products = [];
        foreach ($buc_pro as $key_bukpro => $value_bukpro){
            $pushitm = $value_bukpro->toArray();
            $pushitm['category'] = $value_bukpro->productCategory->category_name;
            $buk_itm = $value_bukpro->relatedProducts()->get();
            $pushitm['items'] = $value_bukpro->relatedProducts()->get()->toArray();

            foreach ($buk_itm as $key_itm => $value_itm) {
                $pushitm['items'][$key_itm]['related_items'] = $value_itm->itemRelatedProducts()->get()->toArray();

            }


            array_push($products,$pushitm);
        }
         //dd($products);
        return view('vendor.product.viewbucketproducts',compact('products','page','sub_page'));
    }

    /**
     * Edit Bucket Items
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editBucketProducts($id){
        $page = 'products';
        $sub_page = 'view-bucket-product';
        $temp_buk = BucketProductModel::find($id);
        $bucket = $temp_buk->toArray();
        $bucket_items = $temp_buk->relatedProducts()->get();
        $bucket['category'] = $temp_buk->productCategory->category_name;
        $bucket['items'] = array();
            foreach ($bucket_items as $key_itm => $value_itm ){
               array_push($bucket['items'],$value_itm->toArray());
                  $bucket['items'][$key_itm]['related_items'] = $value_itm->itemRelatedProducts()->get()->toArray();
              }
             // dd($bucket);
        return view('vendor.product.editbucket',compact('bucket','page','sub_page'));
    }

    public function updateBucketProduct(Request $req){

    }

    /**
     * Delete Bucket Item
     * @param $id
     * @return mixed
     */
    public function deleteBucketItemById($id){
        try{

            $itm = BucketItemsModel::find($id);
            $delete = $itm->delete();
            return Response::json(['status'=>true,'message'=>'Item Deleted Successfully']);
        }
        catch(\Exception $ex)
        {
            return Response::json(['status'=>false,'message'=>$ex->getMessage()]);
        }
    }

    public function deleteBucketRelatedItemById($id){
        try{
            $related_itm = BucketItemRelatedProductsModel::find($id);
            $delete = $related_itm->delete();
            return Response::json(['status'=>true,'message'=>'Optional Item Deleted Successfully']);

        }
        catch (\Exception $ex){
            return Response::json(['status'=>false,'message'=>$ex->getMessage()]);
        }
    }

}
