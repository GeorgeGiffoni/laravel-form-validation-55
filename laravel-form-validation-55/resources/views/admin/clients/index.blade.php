@extends('layouts.layout')
@section('content')


<h3>Listagem de Clientes</h3>
<br><br>
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
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
