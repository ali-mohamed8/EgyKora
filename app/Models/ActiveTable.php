<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActiveTable extends Model
{
    protected $table ='active_tables' ;
    protected $fillable=[
        'id','disc','tbDay_id'
    ];

    public function tbDays(){
        return $this -> belongsTo('App\Models\TbDay' ,'tbDay_id','id');
    }

}
