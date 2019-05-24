<?php

namespace App;

use App\Categoria;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function categoria(){
        return $this->belongsTo(Categoria::class);
        //return $this->hasOneThrough('App\Categoria','categoria_id','id');
        //return $this->hasOneThrough('App\Categoria', 'App\Produto');
        //return $this->belongsTo('App\Categoria', 'produto_id');
    }
}
