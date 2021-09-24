<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController {

    protected $dados;

    //Retorna todos os recursos
    public function index(){

        return $this -> dados::all();

    }

    //retorna um recurso especifico pelo $id
    public function show(int $client_id, int $employee_id, int $users_id){

        $recurso = $this -> dados::find($client_id, $employee_id, $users_id);

        if (is_null($recurso)){
            return response() -> json('', 204);
        }

        return response() -> json($recurso);
        
    }

    //cadastra um novo recurso
    public function store(Request $request){
        
        return response()
        -> json($this -> dados::create($request -> all()), 201);
        
    }

    //altera um recurso existente
    public function update(int $client_id, Request $request){

        $recurso = $this -> dados::find($client_id);

        if (is_null($recurso)){
            return response() -> json(['client' => 'Client Not Found'], 404);
        }

        $recurso -> fill($request -> all());
        $recurso -> save();


        return $recurso;
    }

    //inativa um recurso
    public function destroy(int $client_id){

        $NumberOfRemovedClients = $this -> dados::destroy($client_id);
        if($NumberOfRemovedClients === 0) {

            return response() -> json(['erro' => 'Client Not Found'], 404);
        }
            return response() -> json('', 204);
    }
}
