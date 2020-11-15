<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbMatches extends Model
{

    protected $table = 'tb_matches';

    protected $fillable =[
         'id','first_team_id','second_team_id','match_time','request','active','finished','tb_days_id','created_at','updated_at'
    ];

    protected $hidden = [
        'created_at' , 'updated_at'
    ];

    public function days(){
        return $this -> belongsTo('App\Models\TbDay' , 'tb_days_id' ,'id');
    }

    public function firstTeam(){
        return $this -> belongsTo('App\Models\Team','first_team_id','id') ;
    }

    public function secondTeam(){
        return $this -> belongsTo('App\Models\Team','second_team_id','id') ;
    }

    public function sources(){
        return $this->hasMany('App\Models\Source','tb_matches_id','id');
    }

    public function getMatchTimeAttribute($val){
         $val_ex = explode(':',$val);
         if ($val_ex[0] > 12){
            $val_ex[0] -= 12  ;
            return implode(':',$val_ex). 'pm';
         }else{
             return implode(':',$val_ex). 'am';
         }


    }


}
