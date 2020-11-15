<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Leagues;
use App\Http\Requests\Teams;
use App\Models\League;
use App\Models\Team;
use DB ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class LeaguesController extends Controller
{
    public function index(){
        try {
            $leagues = League::with(['teams' => function ($q) {
                return $q->count();
            }])->selection()->paginate(PAGINATE);
            $counter = 0;
            return view('admin.leagues.leagues', compact('leagues', 'counter'));
        }catch (\Exception $ex){
           // return $ex ;
            return redirect()->route('admin.leagues')->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public function add(Leagues $request){
//        return $request -> name ;
        try {
            foreach ($request->name as $name) {
                $qu [] = [
                    'name' => $name
                ];
            }
            //return $qu ;
            League::insert($qu);
            return redirect()->route('admin.leagues')->with(['done' => 'تمت الاضافة بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.leagues')->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public function delete($req_id){
        try {
            DB::beginTransaction();
            $leg = League::findOrFail($req_id);
            $leg->delete();
            if ($leg->teams() -> count() > 0) {
                $leg->teams()->delete();
            }
            DB::commit();
            return redirect()->route('admin.leagues')->with(['done' => 'تم الحذف بنجاح']);
        }catch (\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.leagues')->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public function editView($id){
        try {
            $league = League::findOrFail($id);
            return view('admin.leagues.edit' , compact('league'));
        }catch (\Exception $ex){
            return redirect()->route('admin.leagues')->with(['invalid' => 'حدث خطا ما']);
        }

    }

    public function edit(Leagues $request){
        try {
            DB::beginTransaction();
            $league = League::findOrFail($request -> leag_id);
            $league -> update([
                'name' => $request -> name[0]
            ]);
            DB::commit();
            return redirect() -> route('admin.leagues')->with(['done' => 'تم التعديل بنجاح ']);
        }catch (\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.leagues')->with(['invalid' => 'حدث خطا ما']);
        }

    }
    ##########teams for leagues #######################
    public function teamsView($league_id){
         $counter = 0 ;
        $leags = League::findOrFail($league_id) -> teams() -> paginate(PAGINATE) ;
        $leag = League::selection()->findOrFail($league_id);
      return view('admin.teams.index',compact('leags','counter','leag'));
    }

    public function teamsLeagueAdd(Teams $request){
        try {
            function uploadImages($folder,$image){
                //    $image -> store('/',$folder) ;
                $newName = $image -> hashName();
                $path = 'assets/images/'.$folder;
                $image -> move($path,$newName);
                return $path .'/'.$newName  ;
            }
            DB::beginTransaction();
            foreach ($request->team_ as $team) {
                $q[] =[
//                $team ['name']
                    'name' =>  $team ['name'],
                    'img' =>  uploadImages('teams', $team ['img']),
                    'league_id' => $request->leag_id
                ];
            }
            //return $q ;
            Team::insert($q);
            DB::commit();
            return redirect()->route('admin.leagues.teamsView', $request->leag_id)->with(['done' => 'تم الاضافة بنجاح ']);
        }catch (\Exception $ex){
            DB::rollback();
            //return $ex;
            return redirect()->route('admin.leagues.teamsView' , $request->leag_id)->with(['invalid' => 'حدث خطا ما']);
        }
        //return $im_name;

    }

    public  function teamsLeagueEditView($id){
        try {
            $team = Team::with(['league' => function($q){
                return $q -> select('name','id') ;
            }])->findOrFail($id);
            return view('admin.teams.edit',compact('team'));
        }catch (\Exception $ex){
            return redirect()->back()->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public  function teamsLeagueDoEdit(Teams $request){
        try {
            function uploadImages($folder,$image){
                //    $image -> store('/',$folder) ;
                $newName = $image -> hashName();
                $path = 'assets/images/'.$folder;
                $image -> move($path,$newName);
                return $path .'/'.$newName  ;
            }
            // return print_r($request->all());
            // return print_r( $request-> team[0]['name']) ;
            $team = Team::findOrFail($request->team_id);
            $img = isset($request->team_[0]['img']) ? uploadImages('teams', $request->team_[0]['img']) : $team->img;
            $team->update([
                'name' => $request->team_[0]['name'],
                'img' => $img
            ]);
            return redirect()->route('admin.leagues.teamsView', $team->league_id)->with(['done' => 'تم التعديل بنجاح ']);

        } catch (\Exception $ex) {
            // return $ex ;
            return redirect()->back()->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public function teamsLeagueDelete($tm_id){
        try {
            $team = Team::findOrFail($tm_id);
            File::delete($team -> img);
            $team -> delete();
            return redirect()->back()->with(['done' => 'تم الحذف بنجاح ']);
        } catch (\Exception $ex) {
            // return $ex ;
            return redirect()->back()->with(['invalid' => 'حدث خطا ما']);
        }
    }



}
