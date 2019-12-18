@extends('layouts.layout')
@section('content')


<h3>Listagem de Clientes</h3>
<br><br>
{{-- o route é um helper do laravel serve para pegar as rotas pelo nome --}}
<a href="{{ route('clients.create') }}" class="btn btn-default">Novo</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>CPF/CNPJ</th>
            <th>DATA NASCI</th>
            <th>E-MAIL</th>
            <th>TELEFONE</th>
            <th>SEXO</th>
            <th>AÇÃO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->document_number }}</td>
                <td>{{ $client->date_birth }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->sex }}</td>
                <td><a type="button" href="{{ route('clients.edit', ['id' => $client->id]) }}">Editar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
