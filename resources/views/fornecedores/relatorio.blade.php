<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

    <h1 class="mb-4">Relatório de Fornecedores</h1>

    <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary mb-3">
        Voltar
    </a>

    <div class="card shadow">
        <div class="card-body">

            <h5>Total de Fornecedores: {{ count($fornecedores) }}</h5>

            <form method="GET" action="{{ route('fornecedores.relatorio') }}" class="mb-3">

                <div class="row">
                    <div class="col-md-6">
                        <input 
                            type="text" 
                            name="nome" 
                            class="form-control" 
                            placeholder="Buscar por razão social..."
                            value="{{ request('nome') }}"
                        >
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">Buscar</button>
                    </div>
    
                    <div class="col-md-2">
                        <a href="{{ route('fornecedores.relatorio') }}" class="btn btn-secondary w-100">
                        Limpar
                        </a>
                    </div>
                </div>

            </form>

            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CNPJ</th>
                        <th>Razão Social</th>
                        <th>Contato</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($fornecedores as $f)
                        <tr>
                            <td>{{ $f->id }}</td>
                            <td>{{ $f->cnpj }}</td>
                            <td>{{ $f->razao_social }}</td>
                            <td>{{ $f->contato }}</td>
                        </tr>
                    @endforeach

                    @if($fornecedores->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center">
                                Nenhum fornecedor encontrado.
                            </td>
                        </tr>
                    @else

                    @endif

                </tbody>
            </table>

            <a href="{{ route('fornecedores.pdf', request()->query()) }}" class="btn btn-danger mb-3">
                Exportar PDF
            </a>

        </div>
    </div>

</div>