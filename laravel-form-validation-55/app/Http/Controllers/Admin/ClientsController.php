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

        // dd($clients);
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
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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


        $data = $request->all();
        $data['defaulter'] = $request->has('defaulter');
        Client::create($data);
        return redirect()->to('/admin/clients');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
