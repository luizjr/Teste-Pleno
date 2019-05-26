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
        $categoria = new Categoria;
        $categoria->fill($request->all());
        $categoria->save();

        Alert::success(__('A :categoria foi criada',['categoria' => $categoria->nome]));
        return redirect()->route('categorias.index', $categoria);
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Categoria  $categoria
    * @return \Illuminate\Http\Response
    */
    public function show(Categoria $categoria)
    {
        $categoria = Categoria::findOrFail($categoria->id);
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
        $categoria = Categoria::findOrFail($categoria->id);
        return view('paginas/categorias/cadastrar')->with('categoria', $categoria);
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
        $categoria->update($request->all());
        Alert::success(__('A :categoria foi atualizada',['categoria' => $categoria->nome]));
        return redirect()->route('categorias.index', $categoria->id);
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

        if ($categoria->produtos->isEmpty()) {
            $categoria->delete();
            Alert::success(__('A :categoria foi excluída',['categoria' => $categoria->nome]));
            return redirect()->route('categorias.index');
        } else {
            Alert::error(__('A :categoria não pôde ser excluída pois ainda existem produtos relacionados à ela',['categoria' => $categoria->nome]))->persistent("Fechar");
            return redirect()->route('categorias.index');
        }
    }
}
