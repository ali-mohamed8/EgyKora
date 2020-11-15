<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table ='teams' ;
    protected $fillable=[
        'id','name','img','league_id','created_at','updated_at'
    ];
    public $timestamps= false ;

    public function league(){
      return $this -> belongsTo('App\Models\League' ,'league_id','id');
    }

    public function scopeSelection($q){
        return $q -> select('id' , 'name' ,'img' , 'league_id');
    }

    public function tbMatchesF(){
        return $this -> hasMany('App\Models\TbMatches' ,'first_team_id','id');
    }

    public function tbMatchesS(){
        return $this -> hasMany('App\Models\TbMatches' ,'Second_team_id','id');
    }
}
