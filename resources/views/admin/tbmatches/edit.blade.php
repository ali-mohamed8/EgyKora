@extends('layouts.admin')
@section('page')
    <a class="navbar-brand" href="{{route('admin.index')}}">الرئيسية</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 text-right">
            @include('includes.erroralert')
            @include('includes.succalert')
            @error('day')
            <div class="form-group col-12">
                <div class="alert-danger col-12 text-dark">
                    {{$message}}
                </div>
            </div>
            @enderror
            @error('day.*')
            <div class="form-group col-12">
                <div class="alert-danger col-12 text-dark">
                    {{$message}}
                </div>
            </div>
            @enderror
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">تعديل يوم</h5>
                    <form method="post" action="{{route('admin.tbDays.doEditDay')}}">
                        @csrf
                        <div class="form-group col-12">
                            <label for="exampleFormControlInput1">تاريخ اليوم :</label>
                            <div id="ch_1">
                                <input type="date" class="form-control" name="day[0]" value="{{$tbday->date}}" id="exampleFormControlInput1">
                                <input type="hidden" value="{{$tbday -> id}}" name="tb_id">
                            </div>
                        </div>
                        <div class="form-group col-lg-2 col-md-6 col-sm-12">
                            <button type="submit" class="form-control btn btn-success">تعديل </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

