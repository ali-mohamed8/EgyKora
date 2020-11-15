@extends('layouts.admin')
@section('page')
    <a class="navbar-brand" href="{{route('admin.index')}}">الرئيسية</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 text-right">
            @include('includes.erroralert')
            @include('includes.succalert')
            @error('tb_day_id')
            <div class="form-group col-12">
                <div class="alert-danger col-12 text-dark">
                    {{$message}}
                </div>
            </div>
            @enderror
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">اختيار جدول مباريات الامس </h5>
                    <form method="post" action="{{route('admin.tables.setYesterday')}}">
                        @csrf
                        <div class="form-group col-12">
                            <label for="sel">الايام المجدولة :</label>
                            <select id="sel" name="tb_day_id" class="col-6 form-control">
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
                    <h4 class="card-title text-right"> جدول مباريات الامس@isset($active -> tbDays)
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
                            </tr>
                            </thead>
                            <tbody class="text-right">
                            @isset($active -> tbDays)
                                @foreach($active -> tbDays ->tbMatches as $i=>$match)
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
