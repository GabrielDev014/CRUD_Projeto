<?php

namespace App\Http\Controllers;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function index()
    {
        //Seleciona todos, até inativos
        //$estados = Estado::all();

        $estados = Estado::where("estado_ativo", "1")->get();
        return view('ADM_estados.index', compact('estados'));
    }

    public function BuscarInclusao()
    {
        return view('ADM_estados.incluir');
    }

    public function ExecutaInclusao(Request $request)
    {
        $estado_nome  = $request->input("estado_nome");
        $sigla  = $request->input("sigla");
        
        $nova = new Estado;
        $nova->estado_nome = $estado_nome;
        $nova->sigla = $sigla;

        //Caso você queira forçar um zero em ativo
        //$nova->cat_ativo = 0;

        $nova->save(); //Esse é o INSERT INTO do Laravel

        return redirect('/adm_estados');
    }

    public function ExcluirEstado($id)
    {
        //SELECT * FROM estado WHERE id = id
        $est = Estado::where("id", $id)->first();
        //est->delete(); ====> Também funciona.

        $est->estado_ativo = 0;
        $est->save();

        return redirect('/adm_estados');
    }

    public function BuscarAlteracao($id)
    {
        $estado = Estado::where("id", $id)->first();
        return view('ADM_estados.alterar', compact('estado'));
    }

    public function ExecutaAlteracao(Request $request)
    {
        $dado_nome = $request->input("estado_nome");
        $dado_sigla = $request->input("sigla");
        $dado_id = $request->input("id");

        $estado = Estado::where("id", $dado_id)->first();
        $estado->estado_nome = $dado_nome;
        $estado->sigla = $dado_sigla;
        $estado->save();

        return redirect('/adm_estados');
    }

}
