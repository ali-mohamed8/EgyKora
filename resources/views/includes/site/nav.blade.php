
<nav class="navbar navbar-light navbar-expand-md shadow bg-white static-top mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{route('index.site')}}">
            <img class="headimg" src="{{asset('assets/site/assets/img/Capture.PNG')}}" style="width: auto;height:58px">

        </a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" aria-expanded="true">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse show" id="navcol-1" style="">
            <ul class="nav navbar-nav ml-auto head-ul">
                <li class="nav-item"><a class="nav-link active main_nav" href="{{route('index.site')}}" style="
                    font-size: 32px;
                    font-family: 'Jomhuria', cursive;
                    color: #293c74;;
                ">الرئيسية</a></li>
                <li class="nav-item" style="
                    margin-right: 24px;
                "><a class="nav-link tb_nav" href="{{route('index.tbMatches')}}" style="
                    font-size: 32px;
                    font-family: 'Jomhuria', cursive;
                    color: #293c74;;
                ">جدول المباريات</a>
                </li>
{{--                <li class="nav-item" style="--}}
{{--                    margin-right: 10px;--}}
{{--                ">--}}
{{--                    <a class="nav-link" href="#" style="--}}
{{--                    font-size: 32px;--}}
{{--                ">اتصل بنا</a>--}}
{{--                </li>--}}
            </ul>
            <div class="my-2 my-lg-0 mylog_div">
                <a class="btn btn-social-icon btn-twitter" title="twitter">
                    <span class="fa fa-twitter"></span>
                </a>
                <a class="btn btn-social-icon btn-facebook" target="_blank" href="https://www.facebook.com/Egykora.me" title="facebook">
                    <span class="fa fa-facebook"></span>
                </a>
                <a class="btn btn-social-icon btn-instagram" title="instgeam">
                    <span class="fa fa-instagram"></span>
                </a>
            </div>
        </div>
    </div>
</nav>
