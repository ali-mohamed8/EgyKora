<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbDay extends Model
{
    protected $table = 'tbdays';

    protected $fillable =[
        'id','date','created_at','updated_at'
    ];

    protected $hidden = [
        'created_at' , 'updated_at'
    ];



    public function tbMatches(){
        return $this -> hasMany('App\Models\TbMatches' , 'tb_days_id','id') ;
    }

    public function tbActive(){
        return $this->hasOne('App\Models\ActiveTable','tbDay_id','id');
    }
}
