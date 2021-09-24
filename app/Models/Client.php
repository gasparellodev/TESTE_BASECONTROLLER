<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Client extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'client_id';
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
        'user_group_id',
        'working_days',
        'contract',
    ];

    public function users(){
        
        return $this -> hasMany(User::class, 'client_users', 'client_id', 'user_id');
        
    }

    public function getTableColumns() {

        return $this -> getConnection() -> getSchemaBuilder() -> getColumnListing($this -> getTable());

    }
}
