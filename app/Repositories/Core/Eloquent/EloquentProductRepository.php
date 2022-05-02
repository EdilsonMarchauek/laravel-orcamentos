<?php

namespace App\Repositories\Core\Eloquent;

use Illuminate\Http\Request;
use App\Models\Models\Product;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\ProductRepositoryInterface;

class EloquentProductRepository extends BaseEloquentRepository implements ProductRepositoryInterface
{

    public function entity()
    {
        return Product::class;
    }

    public function search(Request $request)
    {
        return $this->entity
                            ->with('category')
                            ->where(function ($query) use($request) {
                                //verifica se foi preenchido
                                if ($request->name){
                                        $filter = $request->name;
                                        $query->where(function ($querysub) use ($filter) {
                                        $querysub->where( 'name', 'LIKE', "%{$filter}%")
                                                 ->orWhere('description', 'LIKE', "%{$filter}%");
                                    });    
                                }

                                if ($request->price){
                                    $query->where('price', $request->price);
                                }   
                                
                                if ($request->category){
                                    $query->orWhere('category_id', $request->category);
                                }   
                            })
                            //->toSql();
                            //dd($products);
                            ->paginate();
    }
}