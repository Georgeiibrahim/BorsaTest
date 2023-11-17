<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($data) {


                return [
                    'id'      =>(int) $data->id,
                    'Project_Name' => $data->p_name,
                    'Project_Description' =>  $data->p_descriptin,
                    'Price' =>  $data->project_price,
                    'buliding_type' => $data->buliding_type,
                    'country' =>  $data->country,
                    'government' =>  $data->government,
                    'area' => $data->area,
                    'district' =>  $data->district,
                    'street' =>  $data->street,
                    'building_no' => $data->building_no,
                    'apartment_no' =>  $data->apartment_no,
                    'floor' =>  $data->floor,
                    'image_link' => $data->image_link




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
