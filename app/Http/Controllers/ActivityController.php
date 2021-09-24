<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

Class ActivityController extends BaseController {

        public function __construct() {

            $this -> dados = Activity::class;

        }

}
