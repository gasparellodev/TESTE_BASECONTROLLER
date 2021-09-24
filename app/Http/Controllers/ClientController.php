<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller {

    protected $client;

    public function __construct(Client $client) {

        $this -> client = $client;

    }

    public function index(){

        return response() -> json(['Clients' => Client::all()], 200);

    }

    public function show($clientId){


        $clients = $this -> client -> find($clientId);

        if(empty($clients)){
            return response() -> json (['message' => 'FAILED TO DISPLAY'], 409);
        }

        return $clients;

    }

    public function store(Request $request){

        //Valida se a entrada de todos os campos está correta
        $this -> validate($request, [
            'external_id' => 'required|string',
            'integration_id' => 'required|integer',
            'headquarters' => 'required|integer',
            'type' => 'required',
            'name' => 'required|string',
            'tradename' => 'required|string',
            'cnpj' => 'required|string',
            'adress' => 'required|string',
            'adress_number' => 'required|string',
            'adress_complement' => 'required|string',
            'district' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip_code' => 'required|string',
            'latitude' => 'required',
            'longitude' => 'required',
            'landmarks' => 'required|string',
            'contact_name' => 'required|string',
            'phone1' => 'required|string',
            'phone2' => 'required|string',
            'email1' => 'required|string',
            'email2' => 'required|string',
            'info' => 'required|string',
            'working_days' => 'required|string',
            'contract' => 'required|string',
        ]);

        try {

        //Criação de Clients
        $client = $this -> client -> create([
            'external_id' => $request -> input ('external_id'),
            'integration_id' => $request -> input ('integration_id'),
            'headquarters' => $request -> input ('headquarters'),
            'name' => $request -> input ('external_id'),
            'tradename' => $request -> input ('tradename'),
            'cnpj' => $request -> input('cnpj'),
            'adress' => $request -> input('adress'),
            'adress_number' => $request -> input('adress_number'),
            'adress_complement' => $request -> input('adress_complement'),
            'district' => $request -> input('district'),
            'city' => $request -> input('city'),
            'state' => $request -> input('state'),
            'country' => $request -> input('country'),
            'zip_code' => $request -> input('zip_code'),
            'latitude' => $request -> input('latitude'),
            'longitude' => $request -> input('longitude'),
            'landmarks' => $request -> input('landmarks'),
            'contact_name' => $request -> input('contact_name'),
            'phone1' => $request -> input('phone1'),
            'phone2' => $request -> input('phone2'),
            'email1' => $request -> input('email1'),
            'email2' => $request -> input('email2'),
            'info' => $request -> input('info'),
            'working_days' => $request -> input('working_days'),
            'contract' => $request -> input('contract'),
        ]);

        return response() -> json(['client' => $client, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {

            return response() -> json(['message' => 'USER REGISTRATION FAILED'], 409);

        }
    }


    public function update(Request $request, $clientId){

        $this -> validate($request, [
            'external_id' => 'required|string',
            'integration_id' => 'required|integer',
            'headquarters' => 'required|integer',
            'type' => 'required',
            'name' => 'required|string',
            'tradename' => 'required|string',
            'cnpj' => 'required|string',
            'adress' => 'required|string',
            'adress_number' => 'required|string',
            'adress_complement' => 'required|string',
            'district' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip_code' => 'required|string',
            'latitude' => 'required',
            'longitude' => 'required',
            'landmarks' => 'required|string',
            'contact_name' => 'required|string',
            'phone1' => 'required|string',
            'phone2' => 'required|string',
            'email1' => 'required|string',
            'email2' => 'required|string',
            'info' => 'required|string',
            'working_days' => 'required|string',
            'contract' => 'required|string',
        ]);

        $client = $this -> client -> find($clientId);

        if (empty($client)) {
        return response() -> json (['message' => 'FAILED TO EDIT'], 409);
        }

        $client -> update([
            'external_id' => $request -> input ('external_id'),
            'integration_id' => $request -> input ('integration_id'),
            'headquarters' => $request -> input ('headquarters'),
            'name' => $request -> input ('external_id'),
            'tradename' => $request -> input ('tradename'),
            'cnpj' => $request -> input('cnpj'),
            'adress' => $request -> input('adress'),
            'adress_number' => $request -> input('adress_number'),
            'adress_complement' => $request -> input('adress_complement'),
            'district' => $request -> input('district'),
            'city' => $request -> input('city'),
            'state' => $request -> input('state'),
            'country' => $request -> input('country'),
            'zip_code' => $request -> input('zip_code'),
            'latitude' => $request -> input('latitude'),
            'longitude' => $request -> input('longitude'),
            'landmarks' => $request -> input('landmarks'),
            'contact_name' => $request -> input('contact_name'),
            'phone1' => $request -> input('phone1'),
            'phone2' => $request -> input('phone2'),
            'email1' => $request -> input('email1'),
            'email2' => $request -> input('email2'),
            'info' => $request -> input('info'),
            'working_days' => $request -> input('working_days'),
            'contract' => $request -> input('contract'),
        ]);

        return response() -> json(['client' => $client, 'message' => 'SUCESSFULLY EDITED'], 201);
    }


    public function destroy($clientId){

        $client = $this -> client -> find($clientId);

        if(empty($client)){
            return response() -> json (['message' => 'FAILED TO DELETE'], 409);
        }

        $client -> delete();
        return;

    }
}
