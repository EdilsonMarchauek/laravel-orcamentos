<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Str;

class QueryBuilderCategoryRepository extends BaseQueryBuilderRepository implements CategoryRepositoryInterface
{
    //Se não fosse criado esta propriedade geraria o erro do resolveTable()
    protected $table = 'categories';

    public function search(array $data)
    {
        return $this->db
                        ->table($this->tb)
                        ->where(function ($query) use ($data) {
                            if (isset($data['title'])) {
                                $query->where('title', $data['title']);
                            }

                            if (isset($data['url'])) {
                                $query->orWhere('url', $data['url']);
                            }

                            if (isset($data['description'])) {
                                $desc = $data['description'];
                                $query->where('description', 'LIKE', "%{$desc}%");
                            }
                        })
                        ->orderBy('id', 'desc')
                        ->paginate();
    }

    //Poliformismo
    public function store(array $data)
    {
        $data['url'] = Str::kebab($data['title']);
        
        return $this->db->table($this->tb)
                        ->insert($data);
    }

    //Poliformismo
    public function update($id, array $data)
    {
        $data['url'] = Str::kebab($data['title']);
        
        return $this->db->table($this->tb)
                        ->where('id', $id)
                        ->update($data);
    }

    public function productsByCategoryId($id)
    {
        return $this->db->table('products')
                        ->where('category_id', $id)
                        ->get();

    }
  
}