@extends('layouts.admin')
@section('page')
    <a class="navbar-brand" href="{{route('admin.index')}}">الرئيسية</a>
@endsection
@section('content')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <div class="row">
        <div class="col-lg-12 text-right">
            @include('includes.erroralert')
            @include('includes.succalert')
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">اختيار جدول مباريات اليوم </h5>
                    <form method="post" action="{{route('admin.tables.setToday')}}">
                        @csrf
                        <div class="form-group col-12">
                            <label for="sel">الايام المجدولة :</label>
                            <select id="sel" name="tb_today" class="col-6">
                                @isset($tbDays)
                                    @foreach($tbDays as $tbDay)
                                        <option value="{{$tbDay->id}}">{{$tbDay->date}}
                                            ...............({{$tbDay->tbMatches()->count().'مباريات'}})
                                        </option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="form-group col-lg-2 col-md-6 col-sm-12">
                            <button type="submit" class="form-control btn btn-success">اختيار</button>
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
                    <h4 class="card-title text-right"> جدول مباريات اليوم@isset($active -> tbDays)
                            ({{$active -> tbDays-> date}})......({{$active -> tbDays->tbMatches()->count().'مباريات'}}
                            ) @endisset
                    </h4>
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
                                    موعد المباراة
                                </th>
                                <th>
                                    تفعيل
                                </th>
                                <th>
                                   المبارة انتهت
                                </th>
                                <th>
                                    عدد مصادر البث الموجوده
                                </th>
                                <th class="text-center">
                                    ادوات التحكم
                                </th>
                            </tr>
                            </thead>
                            <tbody class="text-right">
                            @isset($active -> tbDays)
                                @foreach($active -> tbDays ->tbMatches as $match)
                                    <tr>
                                        <td>
                                            {{++$counter}}
                                        </td>
                                        <td>
                                            {{$match -> firstTeam ->name}}
                                        </td>
                                        <td>
                                            {{$match -> secondTeam ->name}}
                                        </td>
                                        <td>
                                            {{$match -> match_time}}
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input class="check" data-id="{{$match->id}}" type="checkbox"
                                                       @if($match->active == 1) checked
                                                       @endif  value="{{$match -> active}}">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input class="check_finished" data-id="{{$match->id}}" type="checkbox"
                                                       @if($match->finished == 1) checked
                                                       @endif  value="{{$match -> finished}}">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            {{$match -> sources()->count()}}
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-info"><a class="text-white"
                                                                            href="{{route('admin.tbMatches.sourcesView',$match->id)}}">
                                                    اضافة مصدر للبث</a></button>
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
        $(document)
            .ready(function () {
                $('.check')
                    .change(function () {
                        $(this).val() == 0 ? $(this).val(1) : $(this).val(0)
                        var val = parseInt($(this).val());
                        var id = parseInt($(this).attr('data-id'));
                        console.log(id)
                        $.ajax({
                            type: 'get'
                            , url: '{{route('admin.activeMatch')}}'
                            , data: {id: id, actVal: val, _token: '{{csrf_token()}}'}
                            , success: function (data) {
                                console.log(data)
                            }
                        })
                    })
                $('.check_finished')
                    .change(function () {
                        $(this).val() == 0 ? $(this).val(1) : $(this).val(0)
                        var val = parseInt($(this).val());
                        var id = parseInt($(this).attr('data-id'));
                        console.log(id)
                        $.ajax({
                            type: 'get'
                            , url: '{{route('admin.activeFinished')}}'
                            , data: {id: id, actVal: val, _token: '{{csrf_token()}}'}
                            , success: function (data) {
                                console.log(data)
                            }
                        })
                    })
            })
    </script>
@endsection
