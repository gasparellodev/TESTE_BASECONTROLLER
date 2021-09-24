<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends BaseController
{
    public function __construct() {

        $this -> dados = Task::class;

    }

}
