@extends('layouts.admin')
@section('page')
    <a class="navbar-brand" href="{{route('admin.index')}}">الرئيسية</a>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 text-right">
            @include('includes.erroralert')
            @include('includes.succalert')
            @error('name')
            <div class="form-group col-6">
                <div class="alert-danger col-6 text-dark">
                    {{$message}}
                </div>
            </div>
            @enderror
            @error('name.*')
            <div class="form-group col-6">
                <div class="alert-danger col-6 text-dark">
                    {{$message}}
                </div>
            </div>
            @enderror
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">تعديل </h5>
                    <form method="post" action="{{route('admin.leagues.edit')}}">
                        @csrf
                        <div class="form-group col-6">
                            <label for="exampleFormControlInput1">اسم الدورى :</label>
                            <input type="text" class="form-control" name="name[0]" id="exampleFormControlInput1" value="{{$league->name}}" placeholder="اسم الدورى">
                            <input type="hidden" name="leag_id" value="{{$league -> id}}">
                        </div>
                        <div class="form-group col-lg-2 col-md-6 col-sm-12">
                            <button type="submit" class="form-control btn btn-success">تعديل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

