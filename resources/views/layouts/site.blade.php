<!DOCTYPE html>
<html style="direction: rtl">
<head>
    <link href="{{asset('assets/site/assets/img/texlog_mCM_icon.ico')}}" rel="shortcut icon">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta name="referrer" content="same-origin">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#0066CC">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="ايجى كوره, egykora,egy kora,EgyKora,ايجى كوره لايف, مباريات اليوم, بث مباشر">
    <meta content="https://egykora.me/" property="og:url">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ar_AR">
    <meta property="og:site_name" content="egykora ايجى كوره">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="ايجي كوره لمشاهدة مباريات اليوم بجوده عالية  - EgyKora">
    <title>@yield('tittle')</title>
    <link href="{{asset('assets/site/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="{{asset('assets/site/assets/fonts/fontawesome-all.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>

        @import url('https://fonts.googleapis.com/css?family=Orbitron');
        h3{
            margin-left: 80%;
            font-family: 'Jomhuria', cursive;
        }
        .head-ul a{
            color: #293c74;
            font-size: 12px;
        }
        .btn-twitter {
            color: #fff;
            background-color: #55ACEE;
            border-color:#eaecf4;
        }
        .matches a{
            border-radius: 70px 70px 70px 70px;
        }
        .btn-instagram {
            color: #fff;
            background-color: #e74a3b;
            border-color: #eaecf4;
        }
        /* Google font */

        #clock {
            font-family: 'Orbitron', sans-serif;
            font-size: 29px;
            color: #e74a3b;
            margin-top: 8px;
            direction: ltr;
        }
        video{
            height: 600px;
        }
        @media only screen and (max-width: 420px) {
            .matches {
                font-size: 11px;
            }
            .headimg{
                margin-right: -20px;
            }
            #clock{
                font-size: 16px;
            }
            h3{
                margin-left: 25%;
            }

        }
        .tb_nav{
            margin-right: 80px;
        }
        .main_nav{
            font-size: 32px;
            font-family: 'Jomhuria', cursive;
            color: #293c74;;
        }
        @media only screen and (max-width:768px) {
            .main_nav{
                font-size: 32px;
                font-family: 'Jomhuria', cursive;
                color: #293c74;
                float: right;
            }
            .tb_nav{
                font-size: 32px;
                margin-right: -28px;
                font-family: 'Jomhuria', cursive;
                color: #293c74;
                float: right;
            }
            .mylog_div{
                margin-bottom: .5rem!important;
                float: right;
                /* right: 10px; */
                margin-right: 42px;
            }

        }



    </style>
</head>

<body id="page-top">
<span hidden>{{error_reporting(0)}}</span>
<div id="wrapper">
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <div class="col-12 " style="height: 15px;background-color: #3a3b45">
            </div>
            @include('includes.site.nav')
           @yield('tbMatch')
        </div>
       @include('includes.site.footer')
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
<script src="{{asset('assets/site/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/site/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="{{asset('assets/site/assets/js/theme.js')}}"></script>
<script type="text/javascript">
    function currentTime() {
        var date = new Date(); /* creating object of Date class */
        var hour = date.getUTCHours() + 2;
        var min = date.getUTCMinutes();
        var sec = date.getSeconds();
        var midday = "AM";
        midday = (hour >= 12) ? "PM" : "AM"; /* assigning AM/PM */
        hour = (hour ===0) ? 12 : ((hour > 12) ? (hour - 12): hour); /* assigning hour in 12-hour format */
        hour = updateTime(hour);
        min = updateTime(min);
        sec = updateTime(sec);
        document.getElementById("clock").innerText = hour + " : " + min + " : " + sec + " " + midday; /* adding time to the div */
        var t = setTimeout(currentTime, 1000); /* setting timer */
    }

    function updateTime(k) { /* appending 0 before time elements if less than 10 */
        if (k < 10) {
            return "0" + k;
        }
        else {
            return k;
        }
    }

    currentTime();
</script>
<script>
    $(document).ready(function (){
        console.log('goood')
        var a_sour = $('.na_src').find('a') ;

        if (a_sour) {
            a_sour
            .click(function () {
                var ifram_link =
                    $(this)
                    .attr('data-link');
                console.log(ifram_link)
                var a_id =
                    $(this)
                    .attr('data-id')
                console.log(a_id)
                $('.dv_iframs')
                .find('iframe')
                .each(function () {
                    var iframe_f =
                        $(this)
                        .attr('iframe-id');
                    console.log(iframe_f)
                    if (iframe_f === a_id) {
                        $(this)
                        .attr('src', ifram_link)
                        console.log('done')
                    } else {
                        $(this)
                        .attr('src', '')

                    }
                })

            })
           var onload_ifr =
            a_sour
            .first()
            .attr('data-link') ;
            $('iframe:first')
            .attr('src' ,onload_ifr );
        }
    })
</script>
</body>

</html>
