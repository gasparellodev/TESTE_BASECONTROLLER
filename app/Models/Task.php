<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $table = 'tasks';
    protected $primaryKey = 'task_id';
    protected $fillable = [
        'task_id',
        'task_type_id',
        'item_type_id',
        'task_type',
        'name',
        'info',
        'estimated_time',
        'mandatory',
        'editable',
        'multipliable',
        'prioriry',
        'has_feedback',
    ];
}
