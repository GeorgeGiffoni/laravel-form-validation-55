    {{csrf_field()}}

    <div class="form-group">
      <label for="name">Nome</label>
    <input type="text" name="name" value="{{$client->name}}" id="name" placeholder="Insira o nome" class="form-control">
      @if ($errors->has('name'))<div class="alert alert-danger" role="alert">{{$errors->first('name')}}</div>@endif
    </div>

    <div class="form-group">
      <label for="document_number">Documento</label>
      <input type="text" class="form-control" id="document_number" name="document_number" value="{{$client->document_number}}" placeholder="Documento">
      @if ($errors->has('document_number'))<div class="alert alert-danger" role="alert">{{$errors->first('document_number')}}</div>@endif
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" value="{{$client->email}}" name="email" placeholder="E-mail">
      @if ($errors->has('email'))<div class="alert alert-danger" role="alert">{{$errors->first('email')}}</div>@endif
    </div>
    <div class="form-group">
      <label for="phone">Telefone</label>
      <input type="tel" class="form-control" id="phone" value="{{$client->phone}}" name="phone" placeholder="Telefone">
      @if ($errors->has('phone'))<div class="alert alert-danger" role="alert">{{$errors->first('phone')}}</div>@endif
    </div>
    
    <div class="form-group">
        <label for="marital_status">Estado Civil</label>
    <select class="form-control" id="marital_status" selected="{{$client->marital_status}}" name="marital_status" placeholder="Selecione o estado Civil">
            <option value="1" {{ $client->marital_status == '1' ? 'selected="selected"' : ''}}>Solteiro</option>
            <option value="2" {{ $client->marital_status == '2' ? 'selected="selected"' : ''}}>Casado</option>
            <option value="3" {{ $client->marital_status == '3' ? 'selected="selected"' : ''}}>Divorciado</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="date_birth">Data de Nascimento</label>
    <input type="date" class="form-control" id="date_birth" value="{{$client->date_birth}}" name="date_birth" placeholder="Data de Nascimento">
        @if ($errors->has('date_birth'))<div class="alert alert-danger" role="alert">{{$errors->first('date_birth')}}</div>@endif
    </div>

    <div class="radio">
        <label>
            <input type="radio" name="sex" value="M" {{$client->sex == 'M' ? 'checked="checked"' : null}}> Masculino
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="sex" value="F" {{$client->sex == 'F' ? 'checked="checked"' : null}}> Feminino
        </label>
    </div>

    
    <div class="form-group">
        <label for="physical_disability">Deficiência Física</label>
    <input type="text" class="form-control" value="{{$client->physical_disability}}" name="physical_disability" id="physical_disability" placeholder="Insira a deficiência se possuir">
        @if ($errors->has('physical_disability'))<div class="alert alert-danger" role="alert">{{$errors->first('physical_disability')}}</div>@endif
      </div>


    <div class="form-group">
        <label> Inadimplente?</label>
        <div class="radio">
            <label>
                <input type="radio" name="defaulter" value="1" {{$client->defaulter ? 'checked="checked"' : null}}> Sim
            </label>
            <label>
                <input type="radio" name="defaulter" value="0" {{$client->defaulter ? 'checked="checked"' : null}}> Não
            </label>
        </div>
    </div>