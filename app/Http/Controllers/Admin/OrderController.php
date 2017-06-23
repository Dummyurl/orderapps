<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderAppOrderConfirmed;
class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

//    public function newOrder(){
//        $data = '{
//	"full_name":"pankaj",
//	"email":"pankaj@gmail.com",
//	"phone_no":"9827698850",
//	"intruction":null,
//	"discount_code":null,
//	"delivery":true,
//	"collection":false,
//	"delivery_post_code":"B1 1AA",
//	"address_line1":"1st Floor Pramukh Plaza, Near Sajan Prabha Garden, Vijay Nagar, Indore, Madhya Pradesh",
//	"address_line2":null,
//	"city":"Indore",
//	"request_delivery_time":null,
//		"product_detail":{
//				"0":{
//					"itm_name":"Pizza 8 Cheese",
//					"itm_price":"4.65"
//				},
//				"1":{
//					"itm_name":"Set Meal A",
//					"itm_price":"7.95"
//				},
//				"2":{
//					"itm_name":"Tandoori Mix",
//					"itm_price":"12.00"
//				}
//
//		},
//	"discount":null,
//	"delivery_charge":"1.60",
//	"transacation_fee":	"0.50"
//
//
//}';
//        $temp_data = json_decode($data, true);
//        $pro_detail_tem = $temp_data['product_detail'];
//        unset($temp_data['product_detail']);
//        $pro_detail = json_encode($pro_detail_tem);
//        $temp_data['product_detail'] =$pro_detail;
//        $temp_data['created_at'] = Carbon::now();
//        $insert = OrderModel::insert($temp_data);
//
//}

    /**
     * Get Order By ID
     * @param $id
     * @return mixed
     */
    public function getOrder($id){
        $temp_order = OrderModel::GetOrderById($id)->get();
        $temp_order_detail = json_decode($temp_order[0]->product_detail,true);
        $order = $temp_order[0]->toArray();
        unset($order['product_detail']);
        $order['product_detail'] = $temp_order_detail;
      //  dd($order);
        return Response::json($order);

    }

    /**
     * Get Pending Orders
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getPendingOrder(){
        $page = 'orders';
        $sub_page ='pending-order';
        $order_pending = OrderModel::GetPendingOrder()->get()->toArray();
        $orders = [];
        foreach ($order_pending as $key_ord => $value_ord){
            $product_detail = json_decode($value_ord['product_detail'],true);
            unset($value_ord['product_detail']);
            $value_ord['product_detail'] = $product_detail;
            array_push($orders,$value_ord);
        }
        if(count($orders) > 0){
            return view('vendor.order.pendingorder',compact('orders','page','sub_page'));
        }
        else{
            return back()->with('returnStatus', true)->with('status', 101)->with('message', 'None of order is currently pending');
        }

    }

    /**
     * Get Order History
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function orderHistory(){
        $page = 'orders';
        $sub_page ='order-history';
        $orders_history= OrderModel::select('id','product_detail','total')->orderBy('created_at','desc')->get()->toArray();
        $orders = [];
        foreach ($orders_history as $key_ord => $value_ord){
            $product_detail = json_decode($value_ord['product_detail'],true);
            unset($value_ord['product_detail']);
            $value_ord['product_detail'] = $product_detail;
            array_push($orders,$value_ord);
        }
        return view('vendor.order.orderhistory',compact('orders','page','sub_page'));
    }

    /**
     * Confirm Order
     * @param Request $request
     * @return mixed
     */
    public function confirmOrder(Request $request){
        $data = $request->all();
        $order = OrderModel::find($data['id']);
        $order->status = 'confirmed';
        $order->updated_at = Carbon::now();
        $order->save();
        $order_detail = $order->toArray();
        $product_detail = json_decode($order_detail['product_detail'],true);
        $order_detail['product_detail'] = $product_detail;
         Mail::to($order->email)->send(new OrderAppOrderConfirmed($order_detail));

        if(count(Mail::failures()) == 0){
            $returnArray = [
                'status'=> true,
                'message'=> 'Order confirmed Successfully'
            ];
        }
        else{
            $returnArray = [
                'status'=> false,
                'message'=> 'Internal Server Error'
            ];
        }

        return Response::json($returnArray);
        }



}
