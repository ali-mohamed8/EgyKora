@extends('layouts.site')
@section('tittle','بث مباشر|مباريات اليوم|ايجى كوره')
@section('description','ايجي كوره egykora لمشاهدة البث المباشر لمباريات بدون تقطيع اليوم مجاناً. موقع ايجي كوره EgyKora  - ايجي كورهegykora')
@section('tbMatch')
    <link href="{{asset('assets/site/custom.css')}}" rel="stylesheet">
    @include('includes.erroralert')
    <div class="container-fluid col-lg-9 col-md-12">
        <h3 class="text-dark mb-4" style="margin-left: 95%;">الرئيسة</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-secondary text-center m-0 font-weight-bold" style="
                float:right;
                 right: 100px;
                 font-size: 30px;
                 font-family: 'Jomhuria', cursive;
                 color: #5b79f5;">مباريات اليوم</p>
                <div id="clock">

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="list-group matches">
                            @isset($active -> tbDays)
                                @foreach($active -> tbDays ->tbMatches as $match)
                                    <a class="list-group-item @if($match->active ==1){{'active_a'}}@endif list_all" href="@if($match->active ==1){{route('index.watch',[$match->id,$match -> request])}}@endif">
                                        <div class="col-3 col-md-4 left_div"  >
                                            <img src="{{asset($match -> firstTeam ->img)}}" class="rounded-circle first_img"  alt="{{$match -> firstTeam ->name}}">
                                        </div>
                                        <div class="col-6 text-center center_div col-md-4 " >
                                            <p class="first_p">{{$match -> secondTeam ->name}} x {{$match -> firstTeam ->name}}</p>
                                            <p class="scond_p">{{$match -> match_time}}</p>
                                            <p class="thrd_p @if($match->active ==1){{'text-danger'}}@endif">@if($match->active ==1)المباراة قائمة الان@elseif($match->active ==0 && $match->finished ==1 )المباراة انتهت@elseالمباراة لم تبد بعد @endif </p>
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
@endsection
