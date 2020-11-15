@extends('layouts.site')
@section('tittle')
    @isset($match)مشاهدة مباراة {{$match->firstTeam->name.'-'.$match->secondTeam->name.'|'.'بث مباشر |ايجى كوره'}} @endisset
@endsection
@section('tbMatch')
    <div class="container-fluid col-lg-9 col-md-12">
        <div class="col-12 text-dark ">
            <h3 class="text-dark mb-4" style=""> <a href="{{route('index.site')}}">الرئيسية/</a>@isset($match){{$match->firstTeam->name}}x{{$match->secondTeam->name}}@endisset</h3>
        </div>

        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-secondary text-center m-0 font-weight-bold" style="
                float:right;
                 right: 100px;
                 font-size: 30px;
                 font-family: 'Jomhuria', cursive;
                 color: #5b79f5;">
                    مشاهدة مباراة @isset($match){{$match->firstTeam->name}}x{{$match->secondTeam->name}}@endisset</p>
                <div id="clock">

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills mb-3 col-lg-12 na_src" id="pills-tab" role="tablist">
                            @isset($match->sources)
                                @foreach($match->sources as $i =>$sources)
                                    <li class="nav-item">
                                        <a class="nav-link @if($i==0){{'active'}}@endif" data-id="{{$i}}" data-link="{{$sources->sources}}" id="pills-source1-tab" data-toggle="pill" href="#pills-source{{$i}}" role="tab" aria-controls="pills-{{$i}}" aria-selected="true">سيرفر{{++$counter}}</a>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                        <div class="tab-content dv_iframs" id="pills-tabContent">
                            @isset($match->sources)
                                @foreach($match->sources as $i =>$sources)
                                    <div class="tab-pane fade @if($i==0){{'show active'}}@endif col-12" id="pills-source{{$i}}" role="tabpanel" aria-labelledby="pills-{{$i}}-tab">
                                        <iframe width="100%" iframe-id="{{$i}}" height="700" frameborder="0" allowfullscreen="" src="" scrolling="no"></iframe>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection





