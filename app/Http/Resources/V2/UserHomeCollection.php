<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserHomeCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($data) {


                return [
                    'id'      =>(int) $data->id,
                    // 'user_id' =>(int) $data->user_id,
                    'Title' => $data->title,
                    "Image" => $data->image_id,
                    'Description' =>  $data->descriptin,
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
