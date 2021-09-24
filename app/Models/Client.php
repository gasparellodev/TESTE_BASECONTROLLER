<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Client extends Model
{
    protected $fillable = [
        'external_id',
        'integration_id',
        'headquarters',
        'type',
        'name',
        'tradename',
        'cnpj',
        'ie',
        'adress',
        'adress_number',
        'adress_complement',
        'district',
        'city',
        'state',
        'country',
        'zip_code',
        'latitude',
        'longitude',
        'landmarks',
        'contact_name',
        'phone1',
        'phone2',
        'email1',
        'email2',
        'info',
        'working_days',
        'contract',
    ];
}
