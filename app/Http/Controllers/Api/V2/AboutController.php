<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\About;

use Illuminate\Http\Request;

use App\Http\Resources\V2\AboutCollection;


class AboutController extends Controller
{
    public function abouts()
    {
        return new AboutCollection(About::all());
    }

    
}


