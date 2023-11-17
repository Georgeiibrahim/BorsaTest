<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CommissionCollection extends ResourceCollection
{
    public function toArray($request)
    {   
        $user_id = PickmanAuth::where('user_id',auth()->user()->id)->first();

        $sum=0;
        foreach($data as $key => $value)
        {
           $sum=$sum+ $value->seller_earning;
        }
        return [
            'data' => $this->collection->map(function ($data) {
                return [
                    'id'      => (int) $data->id,
                    'order_id ' => $data->order->id,
                    'order_detail_id' =>  $data->order_detail_id,
                    'seller_id' =>  $data->seller_id,
                    'admin_commission' =>  $data->admin_commission,
                    'seller_earning' =>  $data->seller_earning,
                    'Wallet_amount' =>  $sum,
                    'status' => $user_id->status,



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
