<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $table = 'sources';

    protected $fillable =[
        'id','sources','tb_matches_id','created_at','updated_at'
    ];

    protected $hidden = [
        'created_at' , 'updated_at'
    ];

    public function matches(){
        return $this->belongsTo('App\Models\TbMatches','tb_matches_id','id');
    }
}
