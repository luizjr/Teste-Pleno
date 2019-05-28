<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Categoria;
use Alert;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $produtos = Produto::with('categoria')->paginate(10);
        return view('paginas/produtos/listar')->with('produtos', $produtos);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $categorias = Categoria::get();

        return view('paginas/produtos/CadastrarEditar')->with('categorias', $categorias);
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
        $produto->fill($request->all());
        $produto->save();

        Alert::success(__('O :produto foi criado',['produto' => $produto->nome]));
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
        $produto = Produto::findOrFail($produto->id);
        return view('paginas/produtos/ver')->with('produto', $produto);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Produto  $produto
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::get();
        return view('paginas/produtos/CadastrarEditar')->with('produto', $produto)->with('categorias', $categorias);
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
        $produto->update($request->all());
        Alert::success(__('O :produto foi atualizado',['produto' => $produto->nome]));
        return redirect()->route('produtos.index', $produto->id);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Produto  $produto
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        Alert::success(__('O :produto foi excluído',['produto' => $produto->nome]));
        return redirect()->route('produtos.index');
    }
}
