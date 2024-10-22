<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cidade;
use App\Models\Estado;

class CidadeController extends Controller
{
    public function index()
    {
        $cidades = Cidade::where("cidade_ativo", "1")->with('estado')->get();
        return view('ADM_cidades.index', compact('cidades'));
    }

    public function BuscarInclusao()
    {
        // Buscando os estados para o dropdown
        $estados = Estado::where("estado_ativo", "1")->get();

        return view('ADM_cidades.incluir', compact('estados'));
    }

    public function salvarNovaCidade(Request $request)
    {
        $request->validate([
            'estado_id' => 'required|exists:estado,id',
            'cidade_nome' => 'required|string|max:255',
        ]);

        Cidade::create($request->all());
                                //aqui é o apelido, quando chama o ROUTE
        return redirect()->route('adm_cidades_index')->with('success', 'Produto criado com sucesso!');
    }

    public function formularioAlterar($id)
    {
        $cidade = Cidade::where("id", $id)->first();
        $estados = Estado::where('estado_ativo', '1')->get();
        return view('ADM_cidades.alterar', compact('cidade', 'estados'));
    }

    public function salvarAlterarCidade(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:cidade,id',
            'estado_id' => 'required|exists:estado,id',
            'cidade_nome' => 'required|string|max:255',
        ]);

        $infoCidade = $request->except('id');
        $id = $request['id'];
        $cidade = Cidade::find($id);
        $cidade->update($infoCidade);

        return redirect()->route('cidades_index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function excluirCidade($id)
    {
        $cidade = Cidade::where("id", $id)->first();
        $cidade->cidade_ativo = 0;
        $cidade->save();
        return redirect()->route('cidades_index')->with('success', 'Produto removido com sucesso!');
    }
}
