<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct(Task $task) {

        $this -> task = $task;

    }

    public function index() {

        return response() -> json(['tasks' => Task::all()], 200);

    }

    public function show($TaskId) {

        try {

            $task = Task::findOrFail($TaskId);

            return response() -> json(['Task' => $task], 200);

        } catch (\Exception $e){

            return response() -> json(['message' => 'Task Not Found'], 409);
        }
    }

    public function store(Request $request){

        $this -> validate($request, [
            'task_type_id' => 'required|integer',
            'item_type_id' => 'required|integer',
            'task_type' => 'required',
            'name' => 'required',
            'info' => 'required',
            'estimated_time' => 'required',
            'mandatory' => 'required',
            'editable' => 'required',
            'multipliable' => 'required',
            'prioriry' => 'required',
            'has_feedback' => 'required'
        ]);


        try {
            $task = $this -> task -> create([
                'task_type_id' => $request -> input('task_type_id'),
                'item_type_id' => $request -> input('item_type_id'),
                'task_type' => $request -> input('task_type'),
                'name' => $request -> input('name'),
                'info' => $request -> input('info'),
                'estimated_time' => $request -> input('estimated_time'),
                'mandatory' => $request -> input('mandatory'),
                'editable' => $request -> input('editable'),
                'multipliable' => $request -> input('multipliable'),
                'prioriry' => $request -> input('prioriry'),
                'has_feedback' => $request -> input('has_feedback'),
            ]);

            return response() -> json(['task' => $task, 'message' => 'CREATED'], 201);

        } catch(\Exception $e) {

            return response() -> json(['message' =>'TASK REGISTRATION SUCESS'], 409);

        }
    }

    public function update(Request $request, $taskId){

        $this -> validate($request, [
            'task_type_id' => 'required|integer',
            'item_type_id' => 'required|integer',
            'task_type' => 'required',
            'name' => 'required',
            'info' => 'required',
            'estimated_time' => 'required',
            'mandatory' => 'required',
            'editable' => 'required',
            'multipliable' => 'required',
            'prioriry' => 'required',
            'has_feedback' => 'required'
        ]);

        $task = $this -> task -> find($taskId);

        try {
            $task = $this -> task -> update([
                'task_type_id' => $request -> input('task_type_id'),
                'item_type_id' => $request -> input('item_type_id'),
                'task_type' => $request -> input('task_type'),
                'name' => $request -> input('name'),
                'info' => $request -> input('info'),
                'estimated_time' => $request -> input('estimated_time'),
                'mandatory' => $request -> input('mandatory'),
                'editable' => $request -> input('editable'),
                'multipliable' => $request -> input('multipliable'),
                'prioriry' => $request -> input('prioriry'),
                'has_feedback' => $request -> input('has_feedback'),
            ]);

            return response() -> json(['task' => $task, 'message' => 'EDITED'], 201);

        } catch(\Exception $e) {

            return response() -> json(['message' => 'EDIT FAIL'], 409);

        }

    }

    public function destroy($taskId){

        $task = $this -> task -> find($taskId);

        if(empty($task)){
            return response() -> json (['message' => 'FAILED TO DELETE'], 409);
        }

        $task -> delete();
        return;
    }
}
