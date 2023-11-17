<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{


    public function getTranslation($field = '', $lang = false)
    {
        $lang = $lang == false ? App::getLocale() : $lang;
        $model_translations = $this->model_translations->where('lang', $lang)->first();
        return $model_translations != null ? $model_translations->$field : $this->$field;
    }

    public function model_translations()
    {
        return $this->hasMany(CarModelTranslation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
