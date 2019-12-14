@extends('layouts.layout')
@section('content')
<h3>Novo Cliente</h3>
<form method="post" action="/admin/clients">
    {{csrf_field()}}
    <div class="form-group">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="nomeHelp" placeholder="Insira o nome">
      <small id="nomeHelp" class="form-text text-muted">Inclua o Nome do Cliente</small>
    </div>

    <div class="form-group">
      <label for="document_number">Documento</label>
      <input type="text" class="form-control" id="document_number" name="document_number" placeholder="Documento">
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
    </div>

    <div class="form-group">
      <label for="phone">Telefone</label>
      <input type="tel" class="form-control" id="phone" name="phone" placeholder="Telefone">
    </div>
    
    
    <div class="form-group">
        <label for="marital_status">Estado Civil</label>
        <select class="form-control" id="marital_status" placeholder="Selecione o estado Civil">
            <option value="1">Solteiro</option>
            <option value="2">Casado</option>
            <option value="3">Divorciado</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="date_birth">Data de Nascimento</label>
        <input type="date" class="form-control" id="date_birth" name="date_birth" placeholder="Data de Nascimento">
    </div>

    <div class="radio">
        <label>
            <input type="radio" name="sex" value="M"> Masculino
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="sex" value="F"> Feminino
        </label>
    </div>

    
    <div class="form-group">
        <label for="physical_disability">Deficiência Física</label>
        <input type="text" class="form-control" name="physical_disability" id="physical_disability" placeholder="Insira a deficiência se possuir">
      </div>


    <div class="form-group">
        <label> Inadimplente?</label>
        <div class="radio">
            <label>
                <input type="radio" name="defaulter" value="1"> Sim
            </label>
            <label>
                <input type="radio" name="defaulter" value="0"> Não
            </label>
        </div>
    </div>


    <button type="submit" class="btn btn-default">Gravar</button>
</form>
@endsection
