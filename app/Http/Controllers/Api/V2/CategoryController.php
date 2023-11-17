<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Categories;

use Illuminate\Http\Request;

use App\Http\Resources\V2\CategoryCollection;


class CategoryController extends Controller
{
    public function categories()
    {
        return new CategoryCollection(Categories::all());
    }

    
}


