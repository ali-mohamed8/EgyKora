<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SetTablesRequest;
use App\Models\ActiveTable;
use App\Models\TbDay;
use App\Models\TbMatches;
use Illuminate\Http\Request;

class ActiveTablesController extends Controller
{
    public function setTodayView()
    {
        try {
            $tbDays = TbDay::select('id', 'date')->get();
            $active = ActiveTable::with(['tbDays' => function ($q) {
                return $q->with([
                    'tbMatches' => function ($q) {
                        return $q->with([
                            'firstTeam' => function ($q) {
                                return $q->select('name', 'id');
                            },
                            'secondTeam' => function ($q) {
                                return $q->select('name', 'id');
                            }
                        ]);
                    }
                ])->select('date', 'id');
            }])
                ->where('disc', 'today_table')
                ->select('id', 'disc', 'tbDay_id')->first();
            //        //return $active;
            //
            //        foreach ( $active -> tbDays ->tbMatches as $r){return $r->firstTeam ;}
            $counter = 0;
            return view('admin.tbactive.tbtoday', compact('tbDays', 'active', 'counter'));
        }catch (\Exception $ex){
            return redirect()->route('admin.tables.setTodayView')->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public function setToday(Request $request){
        try {
            $tbs = TbMatches::where('tb_days_id','!=',$request->tb_today)->get() ;
            foreach ($tbs as $tb){
                $tb->update([
                    'active'=>0
                ]);
            }
            ActiveTable::where('disc', 'today_table')
            ->update([
                'tbDay_id' => $request->tb_today
            ]);
            return redirect()->back()->with(['done' => 'تم تعيين اليوم بنجاح']);
        }catch (\Exception $ex){
            //return $ex;
            return redirect()->route('admin.tables.setTodayView')->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public function setYesterdayView(){
        try {
            $tbDays = TbDay::select('id', 'date')->get();
            $active = ActiveTable::with(['tbDays' => function ($q) {
                return $q->with([
                    'tbMatches' => function ($q) {
                        return $q->with([
                            'firstTeam' => function ($q) {
                                return $q->select('name', 'id');
                            },
                            'secondTeam' => function ($q) {
                                return $q->select('name', 'id');
                            }
                        ]);
                    }
                ])->select('date', 'id');
            }])
                ->where('disc', 'yesterday_table')
                ->select('id', 'disc', 'tbDay_id')->first();
            $counter = 0;
            return view('admin.tbactive.tbystr', compact('tbDays', 'active', 'counter'));
        }catch (\Exception $ex){
            return redirect()->route('admin.tables.setTodayView')->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public function setYesterday(SetTablesRequest $request){
        try {
            //return $request ;
            ActiveTable::where('disc', 'yesterday_table')
                ->update([
                    'tbDay_id' => $request->tb_day_id
                ]);
            return redirect()->back()->with(['done' => 'تم تعيين اليوم بنجاح']);
        }catch (\Exception $ex){
            //return $ex;
            return redirect()->route('admin.tables.setTodayView')->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public function setTomorrowView(){
        try {
            $tbDays = TbDay::select('id', 'date')->get();
            $active = ActiveTable::with(['tbDays' => function ($q) {
                return $q->with([
                    'tbMatches' => function ($q) {
                        return $q->with([
                            'firstTeam' => function ($q) {
                                return $q->select('name', 'id');
                            },
                            'secondTeam' => function ($q) {
                                return $q->select('name', 'id');
                            }
                        ]);
                    }
                ])->select('date', 'id');
            }])
                ->where('disc', 'Tomorrow_table')
                ->select('id', 'disc', 'tbDay_id')->first();
            $counter = 0;
            return view('admin.tbactive.tbtomorrow', compact('tbDays', 'active', 'counter'));
        }catch (\Exception $ex){
            //return $ex;
            return redirect()->route('admin.tables.setTodayView')->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public function setTomorrow(SetTablesRequest $request){
        try {
            ActiveTable::where('disc', 'Tomorrow_table')
                ->update([
                    'tbDay_id' => $request->tb_day_id
                ]);
            return redirect()->back()->with(['done' => 'تم تعيين اليوم بنجاح']);
        }catch (\Exception $ex){
            //return $ex;
            return redirect()->route('admin.tables.setTodayView')->with(['invalid' => 'حدث خطا ما']);
        }
    }



}
