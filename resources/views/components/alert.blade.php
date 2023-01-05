@if (session()->has($type))
    <div class="alert alert-{{$color}}">{{session($type)}}</div>
@endif

