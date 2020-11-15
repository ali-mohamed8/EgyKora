<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
   protected $table ='leagues' ;
   protected $fillable=[
       'id','name','created_at','updated_at'
   ];
   public $timestamps= false ;

   public function teams(){
      return $this -> hasMany('App\Models\Team' ,'league_id','id');
   }

   public function scopeSelection($q){
       return $q -> select('id' , 'name');
   }
}
