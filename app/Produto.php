<?php

namespace App;

use App\Categoria;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'quantidade', 'preco', 'categoria_id'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
