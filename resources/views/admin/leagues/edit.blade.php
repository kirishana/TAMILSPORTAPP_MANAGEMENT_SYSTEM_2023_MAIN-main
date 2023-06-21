@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit League
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>{{ __('league.edit_league') }} ({{$league->name}})</h1>
    <ol class="breadcrumb">
       
        <li><a href="#"> Leagues</a></li>
        <li class="active">All Leagues</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons ">spa</i>
{{ __('league.edit_league') }}                    </h3>
                    <span class="pull-right">
                        <a href="/leagues" style="color:white">
                            {{ __('staffs.back') }}</a>                                </span>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <form class="form_action6" action="{{route('leagues.update',$league->id)}}" method="POST">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <input type="hidden" name="_method" value="PUT">

                            <div class="row">
                                <!-- <h4  style="text-align:center;font-weight:bold;">Organization's Information</h4> -->
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('league.season') }} <span style="color:red;"><b> *</b></span></label>
                                        <select id="disabledSelect" name="season" class="form-control">
                                            <option disabled selected>Select season</option>
                                                            @foreach ($seasons as $season)
                                                                <option value="{{ $season->id }}" {{$season->id==$league->season_id?'selected':''}}>{{ $season->name }}</option>
                                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('league.sports_cat') }}<span style="color:red;"><b> *</b></span></label>

                                        <select id="disabledSelect" name="category" class="form-control">
                                            <option disabled selected>Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}" {{$category->id==$league->sports_category_id?'selected':''}}>{{ $category->name }}</option>
                                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                            </div>
                            
                            <div class="row">
                                <!-- <h4 style="text-align:center;font-weight:bold;">Organization's Contact Information</h4> -->
                               

                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('league.league') }}<span style="color:red;"> <b> * </b></span> </label>
                                        <input type="text" class="form-control" name="name" value="{{$league->name}}" id="inputEmail3">
                                    </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('league.venue') }}<span style="color:red;"> <b> * </b></span> </label>
                                    <select id="disabledSelect" name="location" class="form-control">
                                        <option disabled selected>Select location</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}" {{$location->id==$league->venue_id?'selected':''}}>{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="inputPassword4">{{ __('league.st_date') }} <span style="color:red;"><b> *</b></span></label>
                                            <input type="date" name="sdate" value="{{$league->from_date}}" min="" max=""  class="form-control sDate" id="inputPassword4">
                                            <span style="color:red;display:none;" class="leagueStartDate">League Start Date Must be smaller than League End Date</span> 

                                        </div>
                                    </div>
                                    <input type="hidden" name="organization" value="{{Auth::user()->organization_id?Auth::user()->organization_id:$orgId}}">

                                    <div class="col-md-6">

                                        <div class="form-group label-floating">
                                            <label class="control-label" for="inputPassword4">{{ __('league.end_date') }}<span style="color:red;"><b> *</b></span></label>
                                            <input type="date" name="edate" class="form-control eDate" value="{{$league->to_date}}" min="" max="" id="inputPassword4" >
                                            <span style="color:red;display:none;" class="leagueEndDate">League End Date Must be Larger than League Start Date</span> 

                                        </div>
                                    </div>
                                </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="inputPassword4">{{ __('league.reg_st_date') }} <span style="color:red;"><b> *</b></span></label>
                                                <input type="date" name="regsdate" value="{{$league->reg_start_date?$league->reg_start_date:''}}"class="form-control startDate" id="inputPassword4">
                                                <span style="color:red;display:none;" class="RegStartDate">Registration Start Date Must be smaller than Registration Start and  End Date</span> 
                                                <span style="color:red;display:none;" class="RegStartDate1">Registration Start Date Must be smaller than Registration End Date</span> 

                                            </div>
                                        </div>

                                    
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="control-label" for="inputPassword4">{{ __('league.reg_end_date') }}<span style="color:red;"><b> *</b></span></label>
                                                <input type="date" name="regedate" value="{{$league->reg_end_date?$league->reg_end_date:''}}"class="form-control regendDate" min="" max="" id="inputPassword4">
                                                                                         <span style="color:red;display:none;" class="RegEndDate">Registration End Date Must be Larger than Registration Start Date</span> 
                                                                                         <span style="color:red;display:none;" class="RegEndDate1">Registration End Date Must be Smaller than League Start Date</span> 

                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                        
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="inputPassword4">{{ __('league.champ_method') }}<span style="color:red;"><b> *</b></span></label><br>&nbsp; &nbsp;
                                                    <input type="radio" name="points" value="1"{{$league->champions==1?'checked':''}} >&nbsp; &nbsp;{{ __('league.points') }} <br> &nbsp; &nbsp;
                                                    <input type="radio" name="points" value="0" {{$league->champions==0?'checked':''}}>&nbsp; &nbsp;{{ __('league.place') }}
                                                </div>
                                            
                                            <div class="col-md-6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">   
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <input style="float:right" type="submit" class="btn btn-raised btn-primary submit" value="{{ __('dashboard.submit') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/adduser.js') }}"></script>
<script>

    $('.sDate').on('change',function(){
        var leagueFromDate=$('.sDate').val();
        var leagueToDate=$('.eDate').val();
    if(leagueFromDate>leagueToDate){
    $('.leagueStartDate').show();
    $('.submit').prop('disabled', true);

}else{
    $('.leagueStartDate').hide();
    $('.submit').prop('disabled', false);


}


    });
    $('.eDate').on('change',function(){
    var leagueFromDate=$('.sDate').val();
    var leagueToDate=$('.eDate').val();
    if(leagueToDate<leagueFromDate){
    $('.leagueEndDate').show();
    $('.submit').prop('disabled', true);

}else{
    $('.leagueEndDate').hide();
    $('.leagueStartDate').hide();
    $('.submit').prop('disabled', false);


}
    });

    $('.startDate').on('change',function(){
    var leagueRegSDate=$('.startDate').val();
    var leagueFromDate=$('.sDate').val();
    var RegEndDate=$('.regendDate').val();
    if(leagueRegSDate>=leagueFromDate){
        $('.RegStartDate').show();
        $('.RegStartDate1').hide();
        $('.submit').prop('disabled', true);

    }
   else if(leagueRegSDate>RegEndDate){
    $('.RegStartDate1').show();
    $('.submit').prop('disabled', true);

    }
    else{
        $('.RegEndDate').hide();
    $('.RegStartDate1').hide();
    $('.RegStartDate').hide();
    $('.submit').prop('disabled', false);

}


    });
    $('.regendDate').on('change',function(){
    var leagueRegSDate=$('.startDate').val();
    var RegEndDate=$('.regendDate').val();
    var leagueFromDate=$('.sDate').val();
    if(leagueFromDate<=RegEndDate){
        $('.RegEndDate').hide();
        $('.RegEndDate1').show();
        $('.submit').prop('disabled', true);

    }
    else if(leagueRegSDate>RegEndDate){
    $('.RegEndDate').show();
    $('.RegEndDate1').hide();
    $('.submit').prop('disabled', true);

}else{
    $('.RegEndDate').hide();
    $('.RegStartDate1').hide();
    $('.RegStartDate').hide();
    $('.submit').prop('disabled', false);

}


    });
   
</script>
@stop