<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller {


    public function __construct(Item $item) {

        $this -> item = $item;

    }

    public function index(){

        return response() -> json(['Item' => Item::all()], 200);

    }

    public function show($itemId){

        try {

            $item = Item::findOrFail($itemId);

            return response() -> json(['Item' => $item], 200);

        } catch (\Exception $e){

            return response() -> json(['message' => 'Item Not Found'], 409);

        }
    }

    public function store(Request $request){

        $this -> validate($request, [
            "root_id" => "required|integer",
            "client_id" => "required|integer",
            "type_id" => "required|integer",
            "name" => "required|string",
            "tag" => "required|string",
            "initial_month" => "required|string",
            "info" => "required",
            "workday" => "required|string",
            "public_qr" => "required",
            "qrcode" => "required|string",
            "image_url" => "required|string",
            "integration_id" => "required|integer",
            "external_id" => "required|integer",
            "origin" => "required|integer",
            "date" => "required",
            "validity" => "required"
        ]);

        try {
            $item = $this -> item -> create([

                'root_id' => $request -> input('root_id'),
                'client_id' => $request -> input('client_id'),
                'type_id' => $request -> input('type_id'),
                'name' => $request -> input('name'),
                'tag' => $request -> input('tag'),
                'initial_month' => $request -> input('initial_month'),
                'info' => $request -> input('info'),
                'workday' => $request -> input('root_id'),
                'public_qr' => $request -> input('root_id'),
                'qrcode' => $request -> input('qrcode'),
                'image_url' => $request -> input('image_url'),
                'integration_id' => $request -> input('integration_id'),
                'externa_id' => $request -> input('externa_id'),
                'origin' => $request -> input('origin'),
                'validity' => $request -> input('validity'),

            ]);

            return response() -> json(['client' => $item, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {

            return response() -> json(['message' => 'USER REGISTRATION FAILED'], 409);

        }
    }

    public function update(Request $request, $itemId){

        $this -> validate($request, [
            "root_id" => "required|integer",
            "client_id" => "required|integer",
            "type_id" => "required|integer",
            "name" => "required|string",
            "tag" => "required|string",
            "initial_month" => "required|string",
            "info" => "required",
            "workday" => "required|string",
            "public_qr" => "required",
            "qrcode" => "required|string",
            "image_url" => "required|string",
            "integration_id" => "required|integer",
            "external_id" => "required|integer",
            "origin" => "required|integer",
            "date" => "required",
            "validity" => "required"
        ]);

        $item = $this -> item -> find($itemId);

        if (empty($item)) {
           return response() -> json (['message' => 'FAILED TO EDIT'], 409);
        }

        $item = $this -> item -> create([

            'root_id' => $request -> input('root_id'),
            'client_id' => $request -> input('client_id'),
            'type_id' => $request -> input('type_id'),
            'name' => $request -> input('name'),
            'tag' => $request -> input('tag'),
            'initial_month' => $request -> input('initial_month'),
            'info' => $request -> input('info'),
            'workday' => $request -> input('root_id'),
            'public_qr' => $request -> input('root_id'),
            'qrcode' => $request -> input('qrcode'),
            'image_url' => $request -> input('image_url'),
            'integration_id' => $request -> input('integration_id'),
            'externa_id' => $request -> input('externa_id'),
            'origin' => $request -> input('origin'),
            'validity' => $request -> input('validity'),

        ]);

        return response() -> json(['item' => $item, 'message' => 'SUCESSFULLY EDITED'], 201);

    }

    public function destroy($itemId){

        $item = $this -> item -> find($itemId);

        if(empty($item)){
            return response() -> json (['message' => 'FAILED TO DELETE'], 409);
        }

        $item -> delete();
        return;

    }
}
