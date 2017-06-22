<?php

namespace App\Http\Repository;


use App\Models\AddressModel;
use App\Models\CouponModel;
use App\Models\DeliveryInformationModel;
use App\Models\DiscountModel;
use App\Models\TimingModel;
use Carbon\Carbon;

class CrudRepository
{

    public function createNew($data = [], $modal)
    {
        try {
            $data['created_at'] = Carbon::now();
            $modal->create($data);

        } catch (\Exception $exception) {
            return ['code' => 503, 'message' => $exception->getMessage()];
        }
        return true;
    }

    public function updateTiming($data = [])
    {
        try {
            foreach ($data['day'] as $key_data => $value_data) {
                $updateArray = [
                    'day' => $value_data,
                    'opening_time' => $data['opening_time'][$key_data],
                    'closing_time' => $data['closing_time'][$key_data],
                    'collection_timing' => $data['collection_timing'][$key_data],
                    'updated_at' => Carbon::now()
                ];
                $update = TimingModel::where('id', $data['id'][$key_data])->update($updateArray);
            }


        } catch (\Exception $exception) {
            return ['code' => 503, 'message' => $exception->getMessage()];
        }
        return true;
    }

    public function updateAboutContact($data = [])
    {
        try {
                $id = $data['id'];
                unset($data['_token']);
                unset($data['id']);

                $update = AddressModel::where('id',$id)->update($data);

        } catch (\Exception $exception) {
            return ['code' => 503, 'message' => $exception->getMessage()];
        }
        return true;
    }

    public function createNewDelivery($data =[]){
        try {
            unset($data['_token']);
            $data['created_at'] =  Carbon::now();
            $insert= DeliveryInformationModel::insert($data);


        } catch (\Exception $exception) {
            return ['code' => 503, 'message' => $exception->getMessage()];
        }
        return true;
    }

    public function updateDiscount($data = []){
        try {
            $id = $data['id'];
            unset($data['_token']);
            unset($data['id']);

            $update = DiscountModel::where('id',$id)->update($data);

        } catch (\Exception $exception) {
            return ['code' => 503, 'message' => $exception->getMessage()];
        }
        return true;
    }

    public function updateCoupon($data = []){
        try {
            $id = $data['id'];
            unset($data['_token']);
            unset($data['id']);

            $update = CouponModel::where('id',$id)->update($data);

        } catch (\Exception $exception) {
            return ['code' => 503, 'message' => $exception->getMessage()];
        }
        return true;
    }

}