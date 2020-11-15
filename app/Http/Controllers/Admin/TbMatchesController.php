<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TbMatchesRequest;
use App\Models\League;
use App\Models\Source;
use App\Models\TbDay;
use App\Models\TbMatches;
use App\Models\Team;
use Illuminate\Http\Request;

class TbMatchesController extends Controller
{
    ###########tb matches for day ##########################
    public function tbMatchesView($id){
        try {
            $leagues = League::selection()->get();
            $F_leag = League::
            with(
                ['teams' => function ($q) {
                    return $q->select('name', 'id', 'league_id');
                }])->first();
            $tbDay = TbDay::
            with([
                'tbMatches' => function ($q) {
                    return $q->with([
                            'firstTeam' => function ($q) {
                                return $q->select('name', 'id');
                            },
                            'secondTeam' => function ($q) {
                                return $q->select('name', 'id');
                            }]);
                }])
                ->select('date', 'id')
                ->findOrFail($id);
            $counter = 0;
            //return print_r($tbMatches);
            return view('admin.tbmatches.tbMatchesForDay', compact('leagues', 'tbDay', 'F_leag', 'counter'));
        }catch (\Exception $ex){
//            return $ex ;
            return redirect()->route('admin.tbDays.tbMatches')->with(['invalid'=>'حدث خطا ما']);
        }
    }

    public function tbMatchesCreate(TbMatchesRequest $request){
        try {
            $Req = [
                'first' =>
                    Team::select('name')->findOrFail($request->team[0])->name,
                'second' =>
                    Team::select('name')->findOrFail($request->team[1])->name
            ];
            $Request = 'مشاهدة-مباراة-' . $Req['second'] . '-' . $Req['first'] . '.html';
            $ins = [
                'first_team_id' => $request->team[0],
                'second_team_id' => $request->team[1],
                'match_time' => $request->matchtime,
                'tb_days_id' => $request->day_id,
                'request' => $Request,
                'active' => 0
            ];
            TbMatches::insert($ins);
            return redirect()->back()->with(['done' => 'تمت الاضافة بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.tbDays.tbMatches')->with(['invalid'=>'حدث خطا ما']);
        }
    }

    public function tbMatchesDelete($id)
    {
        try {
            $tbmatch = TbMatches::findOrFail($id);
            $tbmatch->delete();
            if ($tbmatch->sources()->count() > 0){
                $tbmatch->sources()->delete();
            }
            return redirect()->back()->with(['done' => 'تم الحذف  بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.tbDays.tbMatches')->with(['invalid'=>'حدث خطا ما']);
        }
    }

    public function tbMatchesSourcesView($id)
    {
        try {
            $counter = 0;
            $match = TbMatches::with([
                'firstTeam' => function ($q) {
                    return $q->select('name', 'id');
                },
                'secondTeam' => function ($q) {
                    return $q->select('name', 'id');
                },
                'sources' => function ($q) {
                    return $q->select('sources', 'id','tb_matches_id');
                }
            ])->findOrFail($id);
            return view('admin.tbmatches.sources', compact('match','counter'));
        }catch (\Exception $ex){
            return redirect()->route('admin.tbDays.tbMatches')->with(['invalid'=>'حدث خطا ما']);
        }
    }

    public function tbMatchesSources(Request $request){
        try {
            Source::insert([
                'sources' => $request->sources,
                'tb_matches_id' => $request->match_id
            ]);
            return redirect()->back()->with(['done' => 'تم اضافة مصدر للمباراة ينجاح']);
        }catch (\Exception $ex){
//            return $ex;
            return redirect()->back()->with(['invalid'=>'حدث خطا ما']);
        }
    }

    public function tbMatchesSourcesDelete($id){
        try {
            Source::findOrFail($id)->delete();
            return redirect()->back()->with(['done' => 'تم الحذف بنجاح']);
        }catch (\Exception $ex){
//            return $ex;
            return redirect()->back()->with(['invalid'=>'حدث خطا ما']);

        }
    }
}
