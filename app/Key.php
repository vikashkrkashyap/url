<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $table ='keys';
    //protected $hidden =['created_at','updated_at'];
    public function hits(){
        return $this->hasMany('\App\Hit','url_id');
    }
}
