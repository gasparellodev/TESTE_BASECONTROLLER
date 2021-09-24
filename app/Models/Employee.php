<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'user_id',
        'user_group_id',
        'name',
        'rg',
        'cpf',
        'phone',
        'email',
        'info',
        'image_key',
        'external_id',
        'integration_id'
    ];
}
