@if($header)
<img class="img-fluid"  style="width:100%;margin-left:auto;margin-right:auto;" src="{{ asset('organization/header/'.$header .'') }}">

@else
<img class="img-fluid"  style="width:100%;margin-left:auto;margin-right:auto;" src="{{ asset('assets/images/authors/avatar5.png')}}">
@endif