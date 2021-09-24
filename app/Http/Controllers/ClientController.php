<?php

namespace App\Http\Controllers;

use App\Models\Client;

class ClientController extends BaseController {

    public function __construct() {

        $this -> dados = Client::class;        

    }

}
