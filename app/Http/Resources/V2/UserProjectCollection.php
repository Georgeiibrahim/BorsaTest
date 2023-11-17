<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserProjectCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($data) {


                return [
                    'id'      =>(int) $data->id,
                    'user_name' => $data->user->first_name . " " .$data->user->middle_name ,
                    'project_name' =>  $data->project->p_name,
                    'no_of_shares' => $data->no_of_share,
                    'price_for_share' => $data->price_for_share,
                    'request_status'    => $data->request_status,
                    'req_type'  => $data->req_type,
                    'req_data' => $data->created_at

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
