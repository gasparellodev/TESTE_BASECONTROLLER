<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    protected $fillable = [
     'item_id',
     'root_id',
     'client_id',
     'type_id',
     'name',
     'tag',
     'initial_month',
     'info',
     'workday',
     'public_qr',
     'qrcode',
     'image_url',
     'integration_id',
     'external_id',
     'origin',
     'validity',
    ];
}
