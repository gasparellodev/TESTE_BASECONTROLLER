<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class UserGroup extends Model
{

    protected $table = 'users_group';
    protected $primaryKey = 'group_id';
    protected $fillable = [
        'user_group_role_id'
    ];

    public function getTableColumns(){

        return $this -> getConnection() -> getSchemaBuilder() -> getColumnListing($this -> getTable());

    }

}
