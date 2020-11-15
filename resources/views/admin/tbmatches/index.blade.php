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
                    <h5 class="card-category">جدولة يوم</h5>
                    <label for="leag_num">العدد</label>
                    <input type="number" min="1" max="20" id="tbDay_num" class="col-2" value="1">
                    <form method="post" action="{{route('admin.tbDays.create')}}">
                        @csrf
                        <div class="form-group col-12">
                            <label for="exampleFormControlInput1">تاريخ اليوم :</label>
                            <div id="ch_1">
                                <input type="date"class="form-control" name="day[0]" id="exampleFormControlInput1" placeholder="تاريخ اليوم">
                            </div>
                        </div>
                        <div class="form-group col-lg-2 col-md-6 col-sm-12">
                            <button type="submit" class="form-control btn btn-success">اضافة </button>
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
                                 التاريخ
                                </th>
                                <th>
                                 عدد المباريات الموجوده
                                </th>
                                <th class="text-center">
                                    ادوات التحكم
                                </th>
                            </tr>
                            </thead>
                            <tbody class="text-right">
                            @isset($tbDays)
                                @foreach($tbDays as $tbDay)
                                    <tr>
                                        <td>
                                            {{++$counter}}
                                        </td>
                                        <td>
                                            {{$tbDay -> date}}
                                        </td>
                                        <td>
                                            {{ $tbDay -> tbMatches() -> count()}}
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-danger">  <a class="text-white" href="{{route('admin.tbDays.delete',$tbDay -> id)}}"> حذف</a></button>
                                            <button class="btn btn-success"><a class="text-white" href="{{route('admin.tbDays.editView',$tbDay -> id)}}">تعديل</a></button>
                                            <button class="btn btn-info"><a class="text-white" href="{{route('admin.tbDays.tbMatches',$tbDay -> id)}}">عرض المباريات</a></button>
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
            .ready(function (){
                $('#tbDay_num')
                    .change(function (){
                        change()
                    }).keyup(function (){
                    if (parseInt($(this).val()) > 20){
                        $(this).val(20)
                    }else
                        change();
                })

            })
        function change() {
            let val =
                $('#tbDay_num')
                    .val();
            var rar = [];
            var i = 0;
            for (i; i <= parseInt(val) - 1; i++) {
                rar.push("<input type='date' class='form-control' name='day[" + i + "]' id='exampleFormControlInput" + i + "' placeholder= 'تاريخ الجدول' > <br>")
            }
            $('#ch_1').fadeIn(500).html(rar)
            // rar.forEach(changeDiv)
            // function changeDiv(value,key){
            //     console .log(key)
            //     $('#ch_1').html(value)
            // }
        }


    </script>
@endsection
