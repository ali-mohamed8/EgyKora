@extends('layouts.admin')
@section('page')
    <a class="navbar-brand" href="{{route('admin.index')}}">الرئيسية</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 text-right">
            @include('includes.erroralert')
            @include('includes.succalert')
            @error('matchtime')
            <div class="form-group col-12">
                <div class="alert-danger col-12 text-dark">
                    {{$message}}
                </div>
            </div>
            @enderror
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">جدولة مباراة لبوم ({{$tbDay -> date}})</h5>
                    <form method="post" action="{{route('admin.tbMatches.create')}}">
                        @csrf
                        <input type="hidden" value="{{$tbDay -> id}}" name="day_id">
                        <div class="form-group col-12">
                            <label for="field_1">الفريق الاول :</label>
                            <div id="field_1" class="LT_field">
                                <label for="leagues1">الدورى</label>
                                <select class="form-control" name="leagueSelection[0]" id="leagues1">
                                    @isset($leagues)
                                        @foreach($leagues as $league)
                                            <option value="{{$league -> id}}">{{$league -> name}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                                <label for="teams1">الفريق</label>
                                <select class="form-control" name="team[0]" id="teams1">
                                    @isset($F_leag->teams)
                                        @foreach($F_leag->teams as $team)
                                            <option value="{{$team -> id}}">{{$team -> name}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <label for="field_2">الفريق الثانى :</label>
                            <div id="field_2" class="LT_field">
                                <label for="leagues2">الدورى</label>
                                <select class="form-control" name="leagueSelection[1]" id="leagues2">
                                    @isset($leagues)
                                        @foreach($leagues as $league)
                                            <option value="{{$league -> id}}">{{$league -> name}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                                <label for="teams2">الفريق</label>
                                <select class="form-control" name="team[1]" id="teams2">
                                    @isset($F_leag->teams)
                                        @foreach($F_leag->teams as $team)
                                            <option value="{{$team -> id}}">{{$team -> name}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <label for="field_3">موعد المباراه :</label>
                            <div id="field_3">
                               <input type="time" class="form-control" name="matchtime" id="field_3">
                            </div>
                        </div>
                        <div class="form-group col-lg-2 col-md-6 col-sm-12">
                            <button type="submit" class="form-control btn btn-success">اضافة مباراة </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title text-right"> جدول ايام المباريات</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary text-right">
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    الفريق الاول
                                </th>
                                <th>
                                    الفريق الثانى
                                </th>
                                <th>
                                   موعد المبارة
                                </th>
                                <th class="text-center">
                                    ادوات التحكم
                                </th>
                            </tr>
                            </thead>
                            <tbody class="text-right">
                            @isset($tbDay -> tbMatches)
                                @foreach($tbDay -> tbMatches as $tbMatch)
                                    <tr>
                                        <td>
                                            {{++$counter}}
                                        </td>
                                        <td>
                                            {{$tbMatch -> firstTeam -> name}}
                                        </td>
                                        <td>
                                            {{ $tbMatch -> secondTeam -> name}}
                                        </td>
                                        <td>
                                            {{ $tbMatch -> match_time}}
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger">  <a class="text-white" href="{{route('admin.tbMatches.delete',$tbMatch ->id)}}"> حذف</a></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        function selectionCH(val){
            $('.LT_field')
            .find("#leagues"+val)
            .change(function (e){
                e.preventDefault;
                var selVal = $(this).val() ;
                var value =val ;
                $.ajax({
                    type:'get'
                    ,url: "{{route('admin.tbMatches.selectChange')}}"
                    ,data: {val:selVal}
                    ,success:function (data){
                        console.log(data[0].teams[0]);
                        var val = data[0].teams;
                        var pusherArr = [];
                        val.forEach(function (item, index) {
                            console.log(item.name + '   ' + index + '   ' + item.id);
                            pusherArr.push("<option value='" + item.id + "'>" + item.name + "</option>")
                        })
                        console.log(pusherArr);
                        $("#teams"+value).html(pusherArr)
                    }

                })
            })
        }
        $(document)
            .ready(function (){
                selectionCH(1)
                selectionCH(2)
            })
    </script>
@endsection
