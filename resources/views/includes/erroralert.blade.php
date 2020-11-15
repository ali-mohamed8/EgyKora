@if(session() -> has('invalid'))
    <div class="alert-danger text-center col-12e text-dark">{{session()->get('invalid')}}</div><br>
@endif
