<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Categoria;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $produtos = Produto::with('categoria')->get();
        return view('paginas/produtos/listar')->with('produtos', $produtos);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $produtos = Produto::get();
        $categorias = Categoria::get();

        return view('paginas/produtos/cadastrar')->with('produtos', $produtos)->with('categorias', $categorias);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;
        $produto->categoria_id = $request->categoria;
        $produto->save();

        //$produto = Produto::create($request->all());

        return redirect()->route('produtos.index', $produto->id);
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Produto  $produto
    * @return \Illuminate\Http\Response
    */
    public function show(Produto $produto)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Produto  $produto
    * @return \Illuminate\Http\Response
    */
    public function edit(Produto $produto)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Produto  $produto
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Produto  $produto
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->route('produtos.index');
    }
}
