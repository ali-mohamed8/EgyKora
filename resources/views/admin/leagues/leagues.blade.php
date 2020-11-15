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
                    <h5 class="card-category">اضافة دورى</h5>
                    <label for="leag_num">العدد</label>
                    <input type="number" min="1" max="20" id="leag_num" class="col-2" value="1">
                    <form method="post" action="{{route('admin.leagues.add')}}">
                        @csrf
                        <div class="form-group col-6">
                                <label for="exampleFormControlInput1">اسم الدورى :</label>
                            <div id="ch_1">
                                <input type="text" class="form-control" name="name[0]" id="exampleFormControlInput1" placeholder="اسم الدورى">
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
                    <h4 class="card-title text-right"> جدول الدوريات</h4>
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
                                   اسم الدورى
                                </th>
                                <th>
                                   عدد الفرق
                                </th>
                                <th class="text-center">
                                    اعدادت تحكم
                                </th>
                            </tr>
                            </thead>
                            <tbody class="text-right">
                            @isset($leagues)
                              @foreach($leagues as $league)
                                <tr>
                                    <td>
                                        {{++$counter}}
                                    </td>
                                    <td>
                                        {{$league -> name}}
                                    </td>
                                    <td>
                                        {{ $league -> teams() -> count()}}
                                    </td>
                                    <td class="text-center">
                                       <button class="btn btn-danger">  <a class="text-white" href="{{route('admin.leagues.delete',$league -> id)}}"> حذف</a></button>
                                        <button class="btn btn-success"><a class="text-white" href="{{route('admin.leagues.editView',$league -> id)}}">تعديل</a></button>
                                        <button class="btn btn-info"><a class="text-white" href="{{route('admin.leagues.teamsView',$league -> id)}}">عرض الفرق</a></button>
                                    </td>
                                </tr>
                              @endforeach
                            @endisset
                            <div>{!! $leagues -> links() !!}</div>
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
             $('#leag_num')
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
                $('#leag_num')
                    .val();
            var rar = [];
            var i = 0;
            for (i; i <= parseInt(val) - 1; i++) {
                rar.push("<input type='text' class='form-control' name='name[" + i + "]' id='exampleFormControlInput" + i + "' placeholder= 'اسم الدورى' > <br>")
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
