<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

Class Activity extends Model {

    protected $table = 'activities';    
    protected $primaryKey = 'activity_id';
    protected $fillable = [
        'task_id',
        'title',
        'type',
        'default_value',
        'min_value',
        'max_value',
        'value_format',
        'has_obs',
        'mandatory',
        'unit',
        'fill',
        'info',
        'image_url',
        'photo_gallery',
        'fill_order'

    ];
}
