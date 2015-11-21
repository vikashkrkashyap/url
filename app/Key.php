<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $table ='keys';
    protected $hidden =['created_at','updated_at'];

}
