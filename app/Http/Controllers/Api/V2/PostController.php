<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Post;

use Illuminate\Http\Request;

use App\Http\Resources\V2\PostCollection;


class PostController extends Controller
{
    public function posts()
    {
        return new PostCollection(Post::all());
    }

    
}


