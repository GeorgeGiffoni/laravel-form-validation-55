@extends('layouts.layout')

@section('content')
    <h3>Ver Cliente</h3>
    <a type="button" class="btn btn-primary" href="{{ route('clients.edit', ['id' => $client->id]) }}">Editar</a>
    <a type="button" class="btn btn-link" href="{{ route('clients.index') }}">Voltar</a>
    <a class="btn btn-danger" href="{{route('clients.destroy', ['client' => $client->id])}}"
        onclick="event.preventDefault();if(confirm('Deseja excluir esse cliente?')){$('#form-delete').submit();}">Excluir</a>

    <form style="display: none" id="form-delete" method="POST" action="{{route('clients.destroy', ['client' => $client->id])}}">
        {{ csrf_field() }}
        {{method_field('DELETE')}}
    </form>

    <br><br>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{$client->id}}</td>
            </tr>
            <tr>
                <th scope="row">Documento</th>
                <td>{{$client->document_number}}</td>
            </tr>
            <tr>
                <th scope="row">E-mail</th>
                <td>{{$client->email}}</td>
            </tr>
            <tr>
                <th scope="row">Telefone</th>
                <td>{{$client->phone}}</td>
            </tr>
            <tr>
                <th scope="row">Estado Civil</th>
                <td>{{$client->marital_status}}</td>
            </tr>
            <tr>
                <th scope="row">Data de Nascimento</th>
                <td>{{$client->date_birth}}</td>
            </tr>
            <tr>
                <th scope="row">Sexo</th>
                <td>{{$client->sex == 'M' ? 'Masculino' : 'Feminono'}}</td>
            </tr>
            <tr>
                <th scope="row">Deficiência Física</th>
                <td>{{$client->physical_disability}}</td>
            </tr>
            <tr>
                <th scope="row">Inadimplente</th>
                <td>{{$client->defaulter ? 'Sim' : 'Não'}}</td>
            </tr>
        </tbody>
    </table>
@endsection