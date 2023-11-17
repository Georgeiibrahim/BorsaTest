<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorProject extends Model
{

    protected $fillable = ['user_id','project_id','price_invested'];


    public function project()
    {
        return $this->belongsTo(ProjectDetail::class,'project_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
