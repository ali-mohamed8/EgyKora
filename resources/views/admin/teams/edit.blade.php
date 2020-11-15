@extends('layouts.admin')
@section('page')
    <a class="navbar-brand" href="{{route('admin.index')}}">الرئيسية</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 text-right">
            @include('includes.erroralert')
            @include('includes.succalert')
            @error('team_.*.name')
            <div class="form-group col-12">
                <div class="alert-danger col-12 text-dark">
                    {{$message}}
                </div>
            </div>
            @enderror
            @error('team_.*.img')
            <div class="form-group col-12">
                <div class="alert-danger col-12 text-dark">
                    {{$message}}
                </div>
            </div>
            @enderror
            <div class="card card-chart">
                <div class="card-header">
                    <h4>{{$team->league->name}}-تعديل فرق</h4>
{{--                    <h5 class="card-category">تعديل فرق</h5>--}}
                    <img src="{{asset( $team -> img)}}" class="rounded-circle " style="height: 100px;width: 100px" alt="صورة الفريق">
                    <form method="post" action="{{route('admin.leagues.teams.doEdit')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="team_id" value="{{$team -> id}}">
                        <div id="form_content">
                            <div class="form-group col-12">
                                <label for="exampleFormControlInput1">اسم الفرقة:</label>
                                <div id="name_team" >
                                    <input type="text" class="form-control" name="team [0][name]" value="{{$team -> name}}" id="exampleFormControlInput1" placeholder="اسم الفرقة">
                                </div>
                                <label for="exampleFormControlInput2">صورة الفرقة:</label>
                                <div id="img_team" >
                                    <input type="file"  accept="image/*" class="form-control " style="opacity: unset;position: unset" name="team [0][img]" id="exampleFormControlInput2" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-2 col-md-6 col-sm-12">
                            <button type="submit" class="form-control btn btn-success">تعديل الفريق </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

