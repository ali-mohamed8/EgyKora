@extends('layouts.admin')
@section('page')
    <a class="navbar-brand" href="{{route('admin.index')}}">الرئيسية</a>

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4 text-right">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">مباريات اليوم</h5>
                    <h3 id="TodayMatches" class="card-title text-danger" ><i class="tim-icons  text-primary"></i> @isset($tbtodaycount){{$tbtodaycount}}@endisset</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-right">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">الدوريات</h5>
                    <h3 class="card-title text-danger league"><i class="tim-icons  text-info"></i>@isset($leagcount){{$leagcount}}@endisset</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-right">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">الفرق</h5>
                    <h3 class="card-title text-danger teams"><i class="tim-icons text-success"></i>@isset($teamcount){{$teamcount}}@endisset</h3>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
{{--    <script>--}}
{{--        function myStopFunction() {--}}
{{--            clearInterval(inter)--}}
{{--        }--}}
{{--        function reset(num){--}}
{{--            if (i>num){--}}
{{--                myStopFunction()--}}
{{--            }--}}
{{--        }--}}
{{--        var i = 0;--}}
{{--        var inter = setInterval(function(){--}}
{{--            $('#TodayMatches').text(i)--}}
{{--            ++i;--}}
{{--            reset({{App\Models\ActiveTable::find(1)->tbDays()->count()}});--}}
{{--            },50)--}}
{{--    </script>--}}
@endsection
