<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TbDayRequest;
use App\Http\Requests\TbMatchesRequest;
use App\Models\League;
use App\Models\TbDay;
use App\Models\TbMatches;


class TbDaysController extends Controller
{
    public function index(){
        try {
            $tbDays = TbDay::select('date','id') -> paginate(PAGINATE);
            $counter = 0 ;
            return view('admin.tbmatches.index', compact('tbDays','counter'));
        }catch (\Exception $ex){
            //return $ex;
            return redirect()->route('admin.tbDays.View')->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public function createDay(TbDayRequest $request){
        try {
            foreach ($request -> day as $day){
                $ins[]=[
                  'date' => $day
                ];
            }
            TbDay::insert($ins);
            return redirect() -> route('admin.tbDays.View') -> with(['done' => 'تمت الاضافة بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.tbDays.View')->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public function editDayView($id){
        try {
           $tbday = TbDay::select('id','date') -> findOrFail($id);
           return view('admin.tbmatches.edit',compact('tbday'));
        }catch (\Exception $ex){
            //return $ex ;
            return redirect()->route('admin.tbDays.View')->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public function doEditDay(TbDayRequest $request){
        try {
           $FindDay = TbDay::findOrFail($request -> tb_id) ;
           $FindDay->update([
                'date' => $request -> day[0]
           ]);
           return redirect() -> route('admin.tbDays.View') -> with(['done' => 'تم التعديل بنجاح']);
        }catch (\Exception $ex){
//            return  $ex ;
            return redirect()->route('admin.tbDays.View')->with(['invalid' => 'حدث خطا ما']);
        }
    }

    public function DeleteDay($id){
        try {
            $Find = TbDay::findOrFail($id);
            $Find->delete();
            if ($Find->tbMatches()->count() > 0) {
                $Find->tbMatches()->delete();
            }
            return redirect() -> route('admin.tbDays.View') -> with(['done' => 'تم الحذف بنجاح']);
        }catch (\Exception $ex){
            //            return  $ex ;
            return redirect()->route('admin.tbDays.View')->with(['invalid' => 'حدث خطا ما']);
        }
    }





}
