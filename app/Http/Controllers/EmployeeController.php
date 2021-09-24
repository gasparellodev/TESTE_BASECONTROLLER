<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    protected $employee;

    public function __construct(Employee $employee) {

        $this -> employee = $employee;

    }

    public function index() {

        return response() -> json(['employees' => Employee::all()], 200);

    }


    public function show($employeeId) {
        try {

            $employee = Employee::findOrFail($employeeId);

            return response() -> json(['Employee' => $employee], 200);

        } catch (\Exception $e){

            return response() -> json(['message' => 'Employee Not Found'], 409);

        }
    }
    public function store(Request $request) {

        $this -> validate($request, [
            'user_id' => 'required|integer',
            'user_group_id' => 'required|integer',
            'name' => 'required|string',
            'rg' => 'required|string',
            'cpf' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'info' => 'required|string',
            'image_key' => 'required|string',
            'external_id' => 'required|string',
            'integration_id' => 'required|string'
        ]);

        try {
            $employee = $this -> employee -> create([
                'user_id' => $request -> input('user_id'),
                'user_group_id' => $request -> input('user_group_id'),
                'name' => $request -> input('name'),
                'rg' => $request -> input('rg'),
                'cpf' => $request -> input('cpf'),
                'phone' => $request -> input('phone'),
                'email' => $request -> input('email'),
                'info' => $request -> input('info'),
                'image_key' => $request -> input('image_key'),
                'external_id' => $request -> input('external_id'),
                'integration_id' => $request -> input('integration_id'),
            ]);

            return response() -> json(['employee' => $employee, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {

            return response() -> json(['message' => 'USER REGISTRATION FAILED'], 409);

        }

    }

    public function update(Request $request, $employee_Id) {

        $this -> validate($request, [
            'user_id' => 'required|integer',
            'user_group_id' => 'required|integer',
            'name' => 'required',
            'rg' => 'required',
            'cpf' => 'require',
            'phone' => 'require|string',
            'email' => 'require|string',
            'info' => 'require|string',
            'image_key' => 'require|string',
            'external_id' => 'require|string',
            'integration_id' => 'require|string'
        ]);

        $employee = $this -> employee -> find($employee_Id);

        if (empty($employee)) {
           return response() -> json (['message' => 'FAILED TO EDIT'], 409);
        }

        $employee -> update([
            'user_id' => $request -> input('user_id'),
            'user_group_id' => $request -> input('user_group_id'),
            'name' => $request -> input('name'),
            'rg' => $request -> input('rg'),
            'cpf' => $request -> input('cpf'),
            'phone' => $request -> input('phone'),
            'email' => $request -> input('email'),
            'info' => $request -> input('info'),
            'image_key' => $request -> input('image_key'),
            'external_id' => $request -> input('external_id'),
            'integration_id' => $request -> input('integration_id'),
        ]);

        return response() -> json(['employee' => $employee, 'message' => 'SUCESSFULLY EDITED'], 201);



    }

    public function destroy($employee_Id) {

        $employee = $this -> employee -> find($employee_Id);

        if(empty($employee)){
            return response() -> json (['message' => 'FAILED TO DELETE'], 409);
        }

        $employee -> delete();
        return;
    }


}


