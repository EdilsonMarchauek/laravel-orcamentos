<?php

namespace App\Models\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'url', 'description', 'price', 'photo'];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderByPrice', function(Builder $builder){

            $builder->orderBy('price', 'asc');
            
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
