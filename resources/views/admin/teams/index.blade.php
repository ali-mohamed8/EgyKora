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
{{--            @error('name.*')--}}
{{--            <div class="form-group col-12">--}}
{{--                <div class="alert-danger col-12 text-dark">--}}
{{--                    {{$message}}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @enderror--}}
{{--            @error('img.*')--}}
{{--            <div class="form-group col-12">--}}
{{--                <div class="alert-danger col-12 text-dark">--}}
{{--                    {{$message}}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @enderror--}}
            @error('team_.*.img')
            <div class="form-group col-12">
                <div class="alert-danger col-12 text-dark">
                    {{$message}}
                </div>
            </div>
            @enderror
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">فرق</h5>
                    <label for="teams_num">العدد</label>
                    <input type="number" min="1" max="20" id="teams_num" class="col-2 form-control" value="1">
                    <form method="post" action="{{route('admin.leagues.teams.add')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="leag_id" value="{{$leag -> id}}">
                        <div id="form_content">
                            <div class="form-group col-12">
                                <label for="exampleFormControlInput1">اسم الفرقة:</label>
                                <div id="name_team" >
                                    <input type="text" class="form-control" name="team [0][name]" id="exampleFormControlInput1" placeholder="اسم الفرقة">
                                </div>
                                <label for="exampleFormControlInput2">صورة الفرقة:</label>
                                <div id="img_team" >
                                    <input type="file"  accept="image/*" class="form-control " style="opacity: unset;position: unset" name="team [0][img]" id="exampleFormControlInput2" >
                                    <br>
                                    <div class="col-12" style="border: 1px solid darkgray"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-2 col-md-6 col-sm-12">
                            <button type="submit" class="form-control btn btn-success">اضافة الفرق </button>
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
                    <h4 class="card-title text-right">جدول الفرق({{$leag -> name}})</h4>
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
                                   اسم الفريق
                                </th>
                                <th>
                                   صورة الفريق
                                </th>
                                <th class="text-center">
                                    اعدادت تحكم
                                </th>
                            </tr>
                            </thead>
                            <tbody class="text-right">
                            @isset($leags )
                                @foreach($leags  as $team)
                                    <tr>
                                        <td>
                                            {{++$counter}}
                                        </td>
                                        <td>
                                            {{$team -> name}}
                                        </td>
                                        <td>
                                            <img src="{{asset( $team -> img)}}" class="rounded-circle " style="height: 100px;width: 100px" alt="صورة الفريق">

                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger">  <a class="text-white" href="{{route('admin.leagues.teams.delete',$team -> id)}}"> حذف</a></button>
                                            <button class="btn btn-success"><a class="text-white" href="{{route('admin.leagues.teams.edit',$team -> id)}}">تعديل</a></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                        {!! $leags ->  render()  !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        function changeTeamForm() {
            let e = $("#teams_num").val();
            console.log(e);
            for (var o = [], a = 0; a <= parseInt(e) - 1; a++) {
                let e ="<label for='exampleFormControlInput"+a+"'>اسم الفرقة:</label> <div id='name_team"+a+"' > <input type='text' class='form-control' name='team ["+a+"][name]' id='exampleFormControlInput1' placeholder='اسم الفرقة'> </div> <label for='exampleFormControlInput"+a+"'>صورة الفرقة:</label> <div id='img_team"+a+"' > <input type='file'  accept='image/*' class='form-control ' style='opacity: unset;position: unset' name='team ["+a+"][img]' id='exampleFormControlInput"+a+"' > <br> <div class='col-12' style='border: 1px solid darkgray'></div>"
                o.push(e);
            }
            console.log(o), $("#form_content").fadeIn(500).html(o);
        }
        $(document).ready(function () {
            $("#teams_num")
                .change(function () {
                    changeTeamForm();
                })
                .keyup(function () {
                    parseInt($(this).val()) > 20 ? $(this).val(20) : changeTeamForm();
                });
        });
    </script>
@endsection
