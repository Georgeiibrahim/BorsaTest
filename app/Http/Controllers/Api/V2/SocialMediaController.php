<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\SocialMedia;

use Illuminate\Http\Request;

use App\Http\Resources\V2\SocialMediaCollection;


class SocialMediaController extends Controller
{
    public function social_media()
    {
        return new SocialMediaCollection(SocialMedia::all());
    }

    
}


