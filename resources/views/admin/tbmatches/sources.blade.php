@extends('layouts.admin')
@section('page')
    <a class="navbar-brand" href="{{route('admin.index')}}">الرئيسية</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 text-right">
            @include('includes.erroralert')
            @include('includes.succalert')
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">اضافة مصدر({{$match -> firstTeam -> name.'xxx'.$match -> secondTeam -> name}})</h5>
                    <form method="post" action="{{route('admin.tbMatches.sourcesAdd')}}">
                        @csrf
                        <input type="hidden" value="{{$match -> id}}" name="match_id">
                        <div class="form-group col-12">
                            <label class="col-12">
                                اضافة مصدر:<input class="form-control col-12" name="sources" type="text" placeholder="اضف مصدر">
                            </label>
                        </div>
                        <div class="form-group col-lg-2 col-md-6 col-sm-12">
                            <button type="submit" class="form-control btn btn-success">اضافة مصدر </button>
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
                    <h4 class="card-title text-right"> المصادر الموجودة مباراة ({{$match -> firstTeam -> name.'xxx'.$match -> secondTeam -> name}})</h4>
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
                                    المصدر
                                </th>
                                <th class="text-center">
                                    ادوات التحكم
                                </th>
                            </tr>
                            </thead>
                            <tbody class="text-right">
                            @isset($match -> sources)
                                @foreach($match -> sources as $source)
                                    <tr>
                                        <td>
                                            {{++$counter}}
                                        </td>
                                        <td>
                                            {{$source -> sources}}
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger">  <a class="text-white" href="{{route('admin.tbMatches.sources.delete',$source ->id)}}"> حذف</a></button>
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

