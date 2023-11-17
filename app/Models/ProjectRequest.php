<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{

    public function project()
    {
        return $this->belongsTo(ProjectDetail::class,'project_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
