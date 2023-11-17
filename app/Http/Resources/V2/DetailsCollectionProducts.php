<?php

namespace App\Http\Resources\V2;

use App\Models\Coupon;
use App\Models\CouponUsage;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DetailsCollectionProducts extends ResourceCollection
{
    public function toArray($request)
    {


        return [
            'items' => $this->collection->map(function($data) {
                $value =  Order::where('id',$data->order_id)->first();

                // $user_info =  CouponUsage::where('user_id',$value->user_id)->first();


                return [
                        'product_name' => $data->product->name,
                        'quantity'=>$data->quantity,
                        'single_price'=>$data->price

                ];
            })
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'status' => 200
        ];
    }
}
