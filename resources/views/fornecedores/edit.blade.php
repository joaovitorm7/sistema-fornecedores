<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-4">

    <h1>Editar Fornecedor</h1>

    <form method="POST" action="{{ route('fornecedores.update', $fornecedor->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">CNPJ</label>
            <input 
                type="text" 
                name="cnpj" 
                class="form-control" 
                value="{{ $fornecedor->cnpj }}" 
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Razão Social</label>
            <input 
                type="text" 
                name="razao_social" 
                class="form-control" 
                value="{{ $fornecedor->razao_social }}" 
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Contato</label>
            <input 
                type="text" 
                name="contato" 
                class="form-control" 
                value="{{ $fornecedor->contato }}" 
                required
            >
        </div>

        <button class="btn btn-success">Atualizar</button>
        <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary">Voltar</a>

    </form>

</div>