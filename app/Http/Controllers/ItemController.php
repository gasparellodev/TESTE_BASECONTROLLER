<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends BaseController {


    public function __construct(Item $item) {

        $this -> dados = Item::class;

    }

  
}
