<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

    <h1 class="mb-3">Fornecedores</h1>

    <a href="{{ route('fornecedores.create') }}" class="btn btn-primary mb-3">
        Novo Fornecedor
    </a>

    @if(session('success'))
        <div id="alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>CNPJ</th>
                <th>Razão Social</th>
                <th>Contato</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach($fornecedores as $f)
                <tr>
                    <td>{{ $f->id }}</td>
                    <td>{{ $f->cnpj }}</td>
                    <td>{{ $f->razao_social }}</td>
                    <td>{{ $f->contato }}</td>
                    <td>
                        <a href="{{ route('fornecedores.edit', $f->id) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form method="POST"
                              action="{{ route('fornecedores.destroy', $f->id) }}"
                              style="display:inline;"
                              onsubmit="return confirm('Tem certeza que deseja excluir?')">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('fornecedores.relatorio') }}" class="btn btn-primary mb-3">
    Ver Relatório
    </a>

</div>