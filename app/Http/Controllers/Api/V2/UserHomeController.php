<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\UserHomes;

use Illuminate\Http\Request;

use App\Http\Resources\V2\UserHomeCollection;


class UserHomeController extends Controller
{
    public function homes()
    {
        return new UserHomeCollection(UserHomes::all());
    }

    
}


