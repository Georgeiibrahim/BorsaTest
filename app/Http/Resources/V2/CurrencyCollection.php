<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CurrencyCollection extends ResourceCollection
{

    // public $request;
    // public $def;
    // function __construct($request,$defaultCurr)
    // {
    //     $this->request =$request;
    //     $this->def =$defaultCurr;

    // }


    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($data,$data2) {

                return [
                    'id' => $data->id,
                    'name' => $data->name,
                    'code' => $data->code,
                    'symbol' => $data->symbol,
                    'exchange_rate' => (double) $data->exchange_rate,
                    'is_default' =>$data->is_default,

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
