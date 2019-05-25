<?php

namespace App\Http\Controllers;

use App\Produto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BuscaController extends Controller
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $campo = Input::get('q');
        $produtos = Produto::where('nome', 'LIKE', '%' . $campo . '%')->limit(25)->get();
        return view('paginas.buscar.resultado')->with('produtos',$produtos);
    }
}
