<h2>Relatório de Fornecedores</h2>

<p>Total: {{ count($fornecedores) }}</p>

<table border="1" width="100%" cellpadding="5" cellspacing="0">
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
    </tbody>
</table>