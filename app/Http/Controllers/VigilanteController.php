<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class VigilanteController extends Controller
{
    public function index()
    {
        $vigilantes = User::where("vigia_ativo", "1")->get();
        return view('ADM_vigilantes.index', compact('vigilantes'));
    }

    public function BuscarInclusao()
    {

        return view('ADM_vigilantes.incluir');
    }

    public function salvarNovoVigilante(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'vigia_celular' => 'required|string|max:15',
        ]);

        // Criação do usuário
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'vigia_celular' => $validatedData['vigia_celular'],
            'vigia_ativo' => 1,
        ]);

        // Autenticar o usuário
        //Auth::login($user);

        // Redirecionar ou retornar uma resposta
        return redirect()->route('adm_vigilantes_index')->with('success', 'Registro concluído com sucesso!');
    }

    public function BuscarAlteracao($id)
    {
        $vigilante = User::where("id", $id)->first();
        return view('ADM_vigilantes.alterar', compact('vigilante'));
    }

    public function ExecutaAlteracao(Request $request)
    {
        $dado_nome = $request->input("name");
        $dado_email = $request->input("email");
        $dado_celular = $request->input("vigia_celular");
        $dado_id = $request->input("id");

        $vigilante = User::where("id", $dado_id)->first();
        $vigilante->name = $dado_nome;
        $vigilante->email = $dado_email;
        $vigilante->vigia_celular = $dado_celular;
        $vigilante->save();

        return redirect('/adm_vigilantes');
    }

    public function ExcluirVigilante($id)
    {
        $vigia = User::where("id", $id)->first();

        $vigia->vigia_ativo = 0;
        $vigia->save();

        return redirect('/adm_vigilantes');
    }

}
