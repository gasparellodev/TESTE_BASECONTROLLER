<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends BaseController
{

    public function __construct(){

        $this -> dados = Employee::class;

    }

}


