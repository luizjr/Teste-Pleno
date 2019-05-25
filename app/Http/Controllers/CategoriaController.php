<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Alert;

class CategoriaController extends Controller
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
        $categorias = Categoria::get();
        return view('paginas/categorias/listar')->with('categorias', $categorias);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('paginas/categorias/cadastrar');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $categorias = new Categoria;
        $categorias->nome = $request->nome;
        $categorias->descricao = $request->descricao;
        $categorias->save();

        return redirect()->route('categorias.index', $categorias->id);
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Categoria  $categoria
    * @return \Illuminate\Http\Response
    */
    public function show(Categoria $categoria)
    {
        $categoria = Categoria::findOrFail('id');
        return view('paginas/categorias/ver', ['categoria' => $categoria]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Categoria  $categoria
    * @return \Illuminate\Http\Response
    */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Categoria  $categoria
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Categoria  $categoria
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        try {
            $categoria->delete();
            Alert::success(__('A categoria :categoria foi excluída',['categoria' => $campo]));
        } catch (Illuminate\Database\QueryException $e) {
            Alert::error(__('A categoria :categoria não pôde ser excluída',['categoria' => $campo]))->persistent("Fechar");
        }
        return redirect()->route('categorias.index');
    }
}
