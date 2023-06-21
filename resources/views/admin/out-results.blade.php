@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Leagues
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<style>
    .mt-100 {
        margin-top: 100px
    }
    .example::-webkit-scrollbar {
  display: none;
}
.example::-webkit-scrollbar {
    -ms-overflow-style: none;
  scrollbar-width: none; 
}
    /* body {
        background: #00B4DB;
        background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
        background: linear-gradient(to right, #0083B0, #00B4DB);
        color: #514B64;
        min-height: 100vh
    } */
</style>
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Iframes</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>

                Dashboard
            </a>
        </li>
        <li>
            <a href="#">Iframes</a>
        </li>
        <li class="active">Out Results</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    Iframes
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        
                        <div class="col-md-6">                               
                                    <div class="form-group">
                                        
                                        <div class="col-md-6 input-group select2-bootstrap-append">
                                            <select id="select24" class="form-control select2 multiple" >
                                                <option disbaled dselected>Select League</option>
                                                @foreach($leagues as $league)
                                                @if($league->events->count()>0)
                                                <option value="{{ $league->id }}">{{ $league->name }} </option>
                                                @endif
                                                @endforeach
                                            </select>  
                                        </div>
                                    </div>
                        </div>
                        <div class="col-md-6">
</div>
                    </div>
                    <br>
                   
                    <div class="table-responsive example">


                        @include('admin.out-result-include')

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Third Basic Table Ends Here-->
</section>


<!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script>
    $("#select24").on('change', function() {
        var league=$(this).val();
    
$.ajax({
type: 'GET',
url: '/out-results/search',
data: {
 "league": league


},
success: function(response) {
 $('.results').html(response['html']);    
}
});
 });
</script>
@stop