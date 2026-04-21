<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fornecedor;
use Barryvdh\DomPDF\Facade\Pdf;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = \App\Models\Fornecedor::all();
        return view('fornecedores.index', compact('fornecedores'));
    }

    public function create()
    {
        return view('fornecedores.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'cnpj' => ['required', 'regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/'],
            'razao_social' => ['required', 'min:3'],
            'contato' => ['required', 'regex:/^\(\d{2}\)\s?\d{4,5}-\d{4}$/'],
        ], [
            'cnpj.regex' => 'CNPJ deve estar no formato 00.000.000/0000-00',
            'contato.regex' => 'Celular deve estar no formato (99) 99999-9999',
        ]);

        // Crio o Fornecedor e envio uma mensagem de sucesso para a view
        \App\Models\Fornecedor::create($request->all());

        return redirect()
            ->route('fornecedores.index')
            ->with('success', 'Fornecedor cadastrado com sucesso!');
    }


    public function edit(string $id)
    {
        // Busco fornecedor por ID ou retorna falha se não encontrar
        $fornecedor = \App\Models\Fornecedor::findOrFail($id);

        return view('fornecedores.edit', compact('fornecedor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cnpj' => ['required', 'regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/'],
            'razao_social' => ['required', 'min:3'],
            'contato' => ['required', 'regex:/^\(\d{2}\)\s?\d{4,5}-\d{4}$/'],
        ]);

        // Atualizo o registro e retorno uma mensagem de sucesso
        $fornecedor = \App\Models\Fornecedor::findOrFail($id);

        $fornecedor->update($request->all());

        return redirect()
            ->route('fornecedores.index')
            ->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        // Busco por ID, excluo o registro e retorno uma mensagem de sucesso
        $fornecedor = \App\Models\Fornecedor::findOrFail($id);

        $fornecedor->delete();

        return redirect()
            ->route('fornecedores.index')
            ->with('success', 'Fornecedor excluído com sucesso!');
    }

    public function relatorio(Request $request)
    {
        $query = \App\Models\Fornecedor::query();

        // Filtro por nome (razão social)
        if ($request->filled('nome')) {
            $query->where('razao_social', 'like', '%' . $request->nome . '%');
        }

        $fornecedores = $query->get();

        return view('fornecedores.relatorio', compact('fornecedores'));
    }

    public function exportarPdf(Request $request)
    {
        $query = \App\Models\Fornecedor::query();

        // reaproveita filtro
        if ($request->filled('nome')) {
            $query->where('razao_social', 'like', '%' . $request->nome . '%');
        }

        // Gera PDF com DomPDF e retorna para download
        $fornecedores = $query->get();

        $pdf = Pdf::loadView('fornecedores.pdf', compact('fornecedores'));

        return $pdf->download('relatorio_fornecedores.pdf');
    }
}
