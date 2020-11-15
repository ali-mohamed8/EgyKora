<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\TbMatches;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function selectionLeagueTeam(Request $id){
       $leag = League::with(['teams' => function($q){
           return $q -> select('id','name','league_id');
       }]) -> selection()-> findOrFail($id) ;
       return response() -> json($leag) ;
    }

    public function activeMatch(Request $request){
        $qu = TbMatches::findOrFail($request->id);
        $qu -> update([
           'active' => $request -> actVal
        ]);
        return 'done' ;
    }

    public function activeFinished(Request $request){
        $qu = TbMatches::findOrFail($request->id);
        $qu -> update([
            'finished' => $request -> actVal
        ]);
        return 'done' ;
    }
}
