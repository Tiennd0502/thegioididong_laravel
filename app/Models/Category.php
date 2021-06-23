<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Models\Brand;

class Category extends Model
{
    protected $table = 'categories';
    // protected $filable = [];
    protected $guarded = [''];
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    protected $status = [ 
        1 => [
            'name' =>'Hiển thị',
            'class' => 'badge bg-success'
        ],
        0 => [
            'name' =>'Tạm ẩn',
            'class' => 'badge bg-danger'
        ]
    ];

    public function getStatus(){
        return Arr::get($this->status,$this->active,'[N\A]');
    }
    public function brands(){
        return $this->hasMany(Brand::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
