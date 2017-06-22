<?php

namespace App\Http\Controllers\Api;

use App\Models\AddressModel;
use App\Models\BucketProductModel;
use App\Models\DeliveryInformationModel;
use App\Models\DiscountModel;
use App\Models\ProductModel;
use App\Models\TimingModel;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Response;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Input;

class ApiHomeController extends Controller
{

    public function allCategories(){

        $datacategory = CategoryModel::all();
        return Response::json($datacategory);
    }


    public function productByCategory(Request $request){
        $buk_id = $request->input('bucket_cat');
        $cat_id = $request->input('cat_id');

        if($buk_id == 1){
            $buc_pro = BucketProductModel::BuckProByCategory($cat_id)->get();
            //dd($buc_pro);
            $products = [];
               foreach ($buc_pro as $key_bukpro => $value_bukpro){
                   $pushitm = $value_bukpro->toArray();
                   $buk_itm = $value_bukpro->relatedProducts()->get();
                   $pushitm['items'] = $value_bukpro->relatedProducts()->get()->toArray();

                       foreach ($buk_itm as $key_itm => $value_itm) {
                           $pushitm['items'][$key_itm]['related_items'] = $value_itm->itemRelatedProducts()->get()->toArray();

                       }


                array_push($products,$pushitm);
                }
        }
        else{
           // dd('into');
            $products = [];
            $data = ProductModel::ProductsByCategory($cat_id)->get();

            foreach ($data as $key_data => $value_data){
                $temp_pro = $value_data->toArray();
                $temp_pro['attribute_pricing'] =  $value_data->productAttributePricing()->get()->toArray();
                array_push($products,$temp_pro);
            }

        }

        return Response::json($products);
    }

    public function aboutUsInfo(){
        $address = AddressModel::all()->toArray();
        $address[0]['latitude'] = 51.5199;
        $address[0]['longitude'] = -.0917;
        $post_info = DeliveryInformationModel::all()->toArray();
        $timing = TimingModel::all()->toArray();
        $discount = DiscountModel::all()->toArray();

        $returnArray =[
            'address_contact_no'=>$address,
            'delivery_info'=>$post_info,
            'opening_closing_time'=>$timing,
            'delivery_time'=> 45,
            'collection_time'=> 15,
            'discount'=>$discount[0]['discount'],
        ];

        if(count($returnArray) > 0){
            $data = [
                'status' => true,
                'message'=>'Data Found',
                'data'=>$returnArray
            ];
        }
        else{
            $data = [
                'status' => false,
                'message'=>'Data Not Found',
                'data'=>$returnArray
            ];
        }

        return Response::json($data);
    }


    public function newOrder(Request $request){
        // dd(Input::all());
        $data = Input::all();
        //dd($data);
//        $data = '{
//  "full_name":"pankaj",
//  "email":"pankaj@gmail.com",
//  "phone_no":"9827698850",
//  "intruction":null,
//  "discount_code":null,
//  "delivery":true,
//  "collection":false,
//  "delivery_post_code":"PAN 3AN",
//  "address_line1":"1st Floor Pramukh Plaza, Near Sajan Prabha Garden, Vijay Nagar, Indore, Madhya Pradesh",
//  "address_line2":null,
//  "city":"Indore",
//  "request_delivery_time":null,
//      "product_detail":{
//              "0":{
//                  "itm_name":"Pizza 8 Cheese",
//                  "itm_price":"4.65"
//              },
//              "1":{
//                  "itm_name":"Set Meal A",
//                  "itm_price":"7.95"
//              },
//              "2":{
//                  "itm_name":"Tandoori Mix",
//                  "itm_price":"12.00"
//              }
//
//      },
//  "discount":null,
//  "delivery_charge":"1.60",
//  "transacation_fee": "0.50"
//
//
//}';
        // $temp_data = json_decode($data, true);

        $pro_detail_tem = $data['product_detail'];

        unset($data['product_detail']);
        $pro_detail = json_encode($pro_detail_tem);
        $data['product_detail'] =$pro_detail;
        $data['created_at'] = Carbon::now();

        $insert = OrderModel::insert($data);
        $return_array = [
            'status'=>true,
            'message'=>'Order Added successfully'
        ];
        return Response::json($return_array);


    }
}
