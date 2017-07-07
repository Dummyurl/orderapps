<?php

namespace App\Http\Controllers\Api;

use App\Models\AddressModel;
use App\Models\BucketProductModel;
use App\Models\DeliveryInformationModel;
use App\Models\DiscountModel;
use App\Models\ProductModel;
use App\Models\TimingModel;
use App\Models\OrderModel;
use App\Models\CustomerModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Mockery\Exception;
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
      try{
            $data = Input::all();
            $customer = CustomerModel::whereEmail($data['email'])->first();
            // dd($customer);

            if($customer == null){
                $customerArray = [
                    'customer_name'=>$data['full_name'],
                    'email'=>$data['email'],
                    'customer_mobile'=>$data['phone_no'],
                    'created_at'=>Carbon::now(),
                ];

                $customer_id = CustomerModel::insertGetId($customerArray);
            }
            else{
                $customer_id = $customer->id;
            }



            $pro_detail_tem = $data['product_detail'];

            unset($data['product_detail']);
            $pro_detail = json_encode($pro_detail_tem);
            $data['product_detail'] =$pro_detail;
            $data['created_at'] = Carbon::now();
            $data['customer_id'] = $customer_id;

            //temporary Transcation Id
            // $data['transcation_id'] = str_random(25);

            $insert = OrderModel::insert($data);

            $return_array = [
                'status'=>true,
                'message'=>'Order Added successfully'
            ];


            return Response::json($return_array);
        }
        catch(\Exception $ex)
        {
            return Response::json(['status'=>false,'message'=>$ex->getMessage()]);
        }



    }
}
