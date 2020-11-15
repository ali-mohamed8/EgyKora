<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ActiveTable;
use App\Models\TbMatches;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        try {
            $active = ActiveTable::with(['tbDays' => function ($q) {
                return $q->with([
                    'tbMatches' => function ($q) {
                        return $q->with([
                            'firstTeam' => function ($q) {
                                return $q->select('img','name', 'id');
                            },
                            'secondTeam' => function ($q) {
                                return $q->select('img','name', 'id');
                            }
                        ]);
                    }
                ])->select('date', 'id');
            }])
                ->where('disc', 'today_table')
                ->select('id', 'disc', 'tbDay_id')->first();
            return view('site.index', compact('active'));
        }catch (\Exception $ex){
            return redirect()->route('index.site')->with(['invalid' => 'حدث خطا ما']);
        }
    }
    public function watch($id){
        try {
            $match = TbMatches::with([
                'firstTeam' => function ($q) {
                    return $q->select('name', 'id');
                },
                'secondTeam' => function ($q) {
                    return $q->select('name', 'id');
                },
                'sources' => function ($q) {
                    return $q->select('sources', 'id', 'tb_matches_id');
                }
            ])->findOrFail($id);
            $counter = 0;
            if ($match -> active == 1 ) {
                return view('site.watch', compact('match', 'counter'));
            }else{
                return redirect()->route('index.site');
            }
        }catch (\Exception $ex){
            return redirect()->route('index.site')->with(['invalid' => 'حدث خطا ما']);
        }
    }
    public function tbMatches()
    {
        try {
            $activeToday = ActiveTable::with(['tbDays' => function ($q) {
                return $q->with([
                    'tbMatches' => function ($q) {
                        return $q->with([
                            'firstTeam' => function ($q) {
                                return $q->select('img', 'name', 'id');
                            },
                            'secondTeam' => function ($q) {
                                return $q->select('img', 'name', 'id');
                            }
                        ]);
                    }
                ])->select('date', 'id');
            }])
                ->where('disc', 'today_table')
                ->select('id', 'disc', 'tbDay_id')->first();

            $activeTomorrow = ActiveTable::with(['tbDays' => function ($q) {
                return $q->with([
                    'tbMatches' => function ($q) {
                        return $q->with([
                            'firstTeam' => function ($q) {
                                return $q->select('img', 'name', 'id');
                            },
                            'secondTeam' => function ($q) {
                                return $q->select('img', 'name', 'id');
                            }
                        ]);
                    }
                ])->select('date', 'id');
            }])
                ->where('disc', 'Tomorrow_table')
                ->select('id', 'disc', 'tbDay_id')->first();
            $activeYesterday = ActiveTable::with(['tbDays' => function ($q) {
                return $q->with([
                    'tbMatches' => function ($q) {
                        return $q->with([
                            'firstTeam' => function ($q) {
                                return $q->select('img', 'name', 'id');
                            },
                            'secondTeam' => function ($q) {
                                return $q->select('img', 'name', 'id');
                            }
                        ]);
                    }
                ])->select('date', 'id');
            }])
                ->where('disc', 'yesterday_table')
                ->select('id', 'disc', 'tbDay_id')->first();
//        foreach ( $active as $t){return $t ;} ;
            return view('site.tbMatches', compact(['activeToday', 'activeTomorrow', 'activeYesterday']));
        }catch (\Exception $ex){
            return redirect()->route('index.site')->with(['invalid' => 'حدث خطا ما']);
        }
    }

}
