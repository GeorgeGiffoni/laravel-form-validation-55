<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Client;

/**
 * ela nao é só um controller habitual
 * ela é um recurso para administrar um cliente
 * entao cada um dos metodos abaixo tem um objetivo
 * cada metodo vai servir para fazer o crud
 */

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * 
         */
        return view('admin.clients.create', ['client' => new Client()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validate($request);
        $data = $request->all();
        $data['defaulter'] = $request->has('defaulter');
        Client::create($data);
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Object  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $teste = array_key_first($client->marital_status);
        dd($teste);
        $client->marital_status = Client::MARITAL_STATUS[$client->marital_status];
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)//route Model Binding implicito - Explicito precisa de outra configuração
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Object  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $this->_validate($request);
        $data = $request->all();
        $data['defaulter'] = $request->has('defaulter');
        //nos delimitamos os campos que sao seguros nos fillables
        //e usando o metodo fill ele so vai persistir no banco de dados as colunas que vc colocou
        //nos fillables do model Client
        $client->fill($data);
        $client->save();
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Função utilizada para validar os campos do tipo radio e estado civil
     *
     * @param Request $request
     * @return void
     */
    protected function _validate(Request $request) {
        /**
         * validando o formulario antes de salvar utilizando o metodo validate que pertence a essa mesma classe pq ela extende de Controller
         * esse metodo valida as informacoes no back end e se caso as informacoes nao estiverem de acordo com as regras que vc configurou
         * ele nem vai executar o restante da funcao e automaticamente ele redireciona para a view em que esta o formulario
         */
        $maritalStatus = implode(',', array_keys(Client::MARITAL_STATUS));
        $this->validate($request, [
            'name' => 'required | max:255',
            'document_number' => 'required',
            'email' => 'required | email',
            'phone' => 'required',
            'date_birth' => 'required | date',
            'marital_status' => "required|in:$maritalStatus",
            'sex' => 'required | in:M,F',
            'physical_desability' => 'max:255',
        ]);
    }
}