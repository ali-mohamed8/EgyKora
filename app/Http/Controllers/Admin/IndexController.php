<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActiveTable;
use App\Models\League;
use App\Models\Team;
use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function index(){
       $active = ActiveTable::with(['tbDays' => function ($q) {
           return $q->with([
               'tbMatches' => function ($q) {
                   return $q->count();
               }
           ])->select('date', 'id');
       }])
           ->where('disc', 'today_table')
           ->select('id', 'disc', 'tbDay_id')->first();
      $tbtodaycount = $active -> tbDays ->tbMatches->count();
      $teamcount =Team::get()->count();
      $leagcount = League::get()->count();
       return view('admin.index' ,compact(['tbtodaycount','teamcount','leagcount']));
   }
}
