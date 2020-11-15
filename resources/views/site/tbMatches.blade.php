@extends('layouts.site')
@section('tittle','جدول المباريات|ايجى كوره')
@section('tbMatch')
    <link href="{{asset('assets/site/custom.css')}}" rel="stylesheet">
    <div class="container-fluid col-lg-9 col-md-12">
        <div class="col-12 text-dark ">
            <h3 class="text-dark mb-4" style=""> <a href="{{route('index.site')}}">الرئيسية</a>/ جدول المباريات</h3>
        </div>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-secondary text-center m-0 font-weight-bold" style="
                float:right;
                 right: 100px;
                 font-size: 30px;
                 font-family: 'Jomhuria', cursive;
                 color: #5b79f5;">
                    جدول المباريات</p>
                <div id="clock">

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills mb-3 col-lg-12 " id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active"  id="pills-source1-tab" data-toggle="pill" href="#pills-source1" role="tab" aria-controls="pills-home" aria-selected="true">@isset($activeYesterday)({{$activeYesterday->tbDays->date}})@endisset{{'_____'}}امس</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"   id="pills-source2-tab" data-toggle="pill" href="#pills-source2" role="tab" aria-controls="pills-profile" aria-selected="false">@isset($activeToday)({{$activeToday->tbDays->date}})@endisset{{'_____'}}اليوم</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"   id="pills-source3-tab" data-toggle="pill" href="#pills-source3" role="tab" aria-controls="pills-contact" aria-selected="false">@isset($activeTomorrow)({{$activeTomorrow->tbDays->date}})@endisset{{'_____'}}الغد</a>
                            </li>
                        </ul>
                        <div class="tab-content " id="pills-tabContent">
                            <div class="tab-pane fade show active col-12" id="pills-source1" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="list-group matches">
                                    @isset($activeYesterday -> tbDays)
                                        @foreach($activeYesterday -> tbDays ->tbMatches as $match)
                                            <a class="list-group-item  list_all" href="#">
                                                <div class="col-3 col-md-4 left_div"  >
                                                    <img src="{{asset($match -> firstTeam ->img)}}" class="rounded-circle first_img"  alt="{{$match -> firstTeam ->name}}">
                                                </div>
                                                <div class="col-6 text-center center_div col-md-4 " >
                                                    <p class="first_p">{{$match -> secondTeam ->name}} x {{$match -> firstTeam ->name}}</p>
                                                    <p class="scond_p">{{$match -> match_time}}</p>
                                                </div>
                                                <div class="col-3 right_div col-md-4 "  >
                                                    <img src="{{asset($match -> secondTeam ->img)}}" class="rounded-circle second_img"   alt="{{$match -> secondTeam ->name}}">
                                                </div>
                                            </a>
                                            <br>
                                        @endforeach
                                    @endisset

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-source2" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="list-group matches">
                                    @isset($activeToday-> tbDays)
                                        @foreach($activeToday -> tbDays ->tbMatches as $match)
                                            <a class="list-group-item  list_all" href="#">
                                                <div class="col-3 col-md-4 left_div"  >
                                                    <img src="{{asset($match -> firstTeam ->img)}}" class="rounded-circle first_img"  alt="{{$match -> firstTeam ->name}}">
                                                </div>
                                                <div class="col-6 text-center center_div col-md-4 " >
                                                    <p class="first_p">{{$match -> secondTeam ->name}} x {{$match -> firstTeam ->name}}</p>
                                                    <p class="scond_p">{{$match -> match_time}}</p>
                                                </div>
                                                <div class="col-3 right_div col-md-4 "  >
                                                    <img src="{{asset($match -> secondTeam ->img)}}" class="rounded-circle second_img"   alt="{{$match -> secondTeam ->name}}">
                                                </div>
                                            </a>
                                            <br>
                                        @endforeach
                                    @endisset

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-source3" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="list-group matches">
                                    @isset($activeTomorrow -> tbDays)
                                        @foreach($activeTomorrow -> tbDays ->tbMatches as $match)
                                            <a class="list-group-item  list_all" href="#">
                                                <div class="col-3 col-md-4 left_div"  >
                                                    <img src="{{asset($match -> firstTeam ->img)}}" class="rounded-circle first_img"  alt="{{$match -> firstTeam ->name}}">
                                                </div>
                                                <div class="col-6 text-center center_div col-md-4 " >
                                                    <p class="first_p">{{$match -> secondTeam ->name}} x {{$match -> firstTeam ->name}}</p>
                                                    <p class="scond_p">{{$match -> match_time}}</p>
                                                </div>
                                                <div class="col-3 right_div col-md-4 "  >
                                                    <img src="{{asset($match -> secondTeam ->img)}}" class="rounded-circle second_img"   alt="{{$match -> secondTeam ->name}}">
                                                </div>
                                            </a>
                                            <br>
                                        @endforeach
                                    @endisset

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection





