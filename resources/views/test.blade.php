{{--@extends('layouts.site')--}}
{{--@section('tittle','ايجى كوره')--}}
{{--@section('tbMatch')--}}
{{--    <div class="container-fluid col-lg-9 col-md-12">--}}
{{--    <h3 class="text-dark mb-4" style="--}}
{{--        margin-left: 95%--}}
{{--        ; font-family: 'Jomhuria', cursive;">الرئيسة</h3>--}}
{{--        <div class="card-body">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12 req">--}}

{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--    </div>--}}
{{--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>--}}
{{--   <script>--}}
{{--       // const url = "https://www.365scores.com/ar/football"; // site that doesn’t send Access-Control-*--}}
{{--       // fetch(url)--}}
{{--       //     .then(response => response.text())--}}
{{--       //     .then(contents => console.log(contents))--}}
{{--       //     .catch(() => console.log("Can’t access " + url + " response. Blocked by browser?"))--}}
{{--       var content ;--}}
{{--       const proxyurl = "https://cors-anywhere.herokuapp.com/";--}}
{{--       const url = "https://www.365scores.com/ar/football .all-scores-widget"; // site that doesn’t send Access-Control-*--}}
{{--       fetch(proxyurl + url) // https://cors-anywhere.herokuapp.com/https://example.com--}}
{{--           .then(response => response.text())--}}
{{--           .then(contents => $('.req').html(contents))--}}
{{--           .catch(() => console.log("Can’t access " + url + " response. Blocked by browser?"))--}}

{{--       // $(document).ready(function () {--}}
{{--       //     $('.req').load('https://www.365scores.com/ar/football .all-scores-widget ')--}}
{{--       // });--}}

{{--   </script>--}}
{{--@endsection--}}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    // const url = "https://www.365scores.com/ar/football"; // site that doesn’t send Access-Control-*
    // fetch(url)
    //     .then(response => response.text())
    //     .then(contents => console.log(contents))
    //     .catch(() => console.log("Can’t access " + url + " response. Blocked by browser?"))
    const proxyurl = "https://cors-anywhere.herokuapp.com/";
    const url = "https://www.super-kora.tv/channels/bein-sport/bein-sport-HD1?embed&server=524"; // site that doesn’t send Access-Control-*
    fetch(proxyurl + url) // https://cors-anywhere.herokuapp.com/https://example.com
        .then(response => response.text())
        .then(contents => document.write(contents))
        .catch(() => console.log("Can’t access " + url + " response. Blocked by browser?"))

    // $(document).ready(function () {
    //     $('.req').load('https://www.365scores.com/ar/football .all-scores-widget ')
    // });

</script>
