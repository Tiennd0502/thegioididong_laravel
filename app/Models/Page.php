<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Slide;
class Page extends Model
{
    protected $table = 'pages';
    protected $guarded = [];

    public function sliders(){
        return $this->hasMany(Slider::class);
    }
}
