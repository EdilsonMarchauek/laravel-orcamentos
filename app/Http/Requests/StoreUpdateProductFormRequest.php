<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Pegar o id do produto para abrir exceção
        $id = $this->segment(3);

        return [
            //pega o $id e compara se na coluna name id é igual ao id abrindo exceção
            'name'          => "required|min:3|max:100|unique:products,name,{$id},id",
            'url'           => "required|min:3|max:100|unique:products,url,{$id},id",
            'price'         => 'required',
            'description'   => 'max:9000',
            //Especial obrigatório e precisa existir na tabela categories
            'category_id'   => 'required|exists:categories,id',
        ];
    }
}
