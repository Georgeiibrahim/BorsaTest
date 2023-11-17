<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Feature;

use Illuminate\Http\Request;

use App\Http\Resources\V2\FeatureCollection;


class FeatureController extends Controller
{
    public function features()
    {
        return new FeatureCollection(Feature::all());
    }

    
}


