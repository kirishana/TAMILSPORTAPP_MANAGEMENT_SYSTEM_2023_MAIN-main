@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Add League
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
    <h1>{{__('sidebar.leagues')}}</h1>
    <ol class="breadcrumb">

        <li><a href="#"> Leagues</a></li>
        <li class="active">Add New</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                {{--  @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif  --}}
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons ">golf_course </i>
                       {{ __('sidebar.add_new') }}
                    <div style="float:right">
                        <a href="" style="color:white">
                            <i class="material-icons">keyboard_arrow_left</i>

                            <a href="/leagues" style="color:white">
                                {{ __('staffs.back') }}</a>
                            </div>
                    </h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <form class="form_action6" action="{{route('leagues.store')}}" method="POST">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                            <div class="row">
                                <!-- <h4  style="text-align:center;font-weight:bold;">Organization's Information</h4> -->
                                <div class="col-md-6">
                              
                                        <label class="control-label" for="inputEmail3">{{ __('league.season') }} <span style="color:red;"><b> *</b></span></label>
                                        <select id="disabledSelect" name="season" class="form-control">
                                            <option disabled selected>Select season</option>
                                            @foreach ($seasons as $season)
                                          
                                            @if(old('season')==$season->id)
                                            <option value="{{ $season->id }}" selected>{{ $season->name }}</option>
                                            @else
                                            
                                            <option value="{{ $season->id }}">{{ $season->name }}</option>
                                            @endif
                                            
                                            @endforeach
                                        </select>
                                         @if ($errors->has('season'))
                    <span class="help-block">{{ $errors->first('season') }}.</span>
                @endif
                                </div>
                                <div class="col-md-6">
                                        <label class="control-label" for="inputEmail3">{{ __('league.sports_cat') }} <span style="color:red;"><b> *</b></span></label>
                                        <select id="disabledSelect" name="category" class="form-control" >
                                            <option disabled selected>Select Category</option>
                                            @foreach ($categories as $category)
                                            @if(old('category')==$category->id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                            @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>    
                                         @if ($errors->has('category'))
                    <span class="help-block">{{ $errors->first('category') }}.</span>
                @endif
                                </div>
                            </div>

                            <div class="row">
                                <!-- <h4 style="text-align:center;font-weight:bold;">Organization's Contact Information</h4> -->
                                <div class="col-md-6">
                                    
                                        <label class="control-label" for="inputEmail3">{{ __('league.league') }} <span style="color:red;"><b> *</b></span></label>
                                        <input type="text" class="form-control" name="name" id="inputEmail3" value="{!! old('name') !!}">
                                         @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}.</span>
                @endif
                                </div>
                                <div class="col-md-6">
                                        <label class="control-label" for="inputEmail3">{{ __('league.venue') }}  <span style="color:red;"><b> *</b></span></label>
                                        <select id="disabledSelect" name="location" class="form-control">
                                            <option disabled selected>Select location </option>
                                            @foreach ($locations as $location)
                                            @if(old('location')== $location->id)
                                            <option value="{{ $location->id }}" selected>{{ $location->name }}</option>
                                            @else
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>   
                                         @if ($errors->has('location'))
                    <span class="help-block">{{ $errors->first('location') }}.</span>
                @endif   
                                </div>

                                <div class="row">
                                    <div class="col-md-6"> 
                                            <label class="control-label" for="inputPassword4">{{ __('league.st_date') }}  <span style="color:red;"><b> *</b></span></label>
                                            <input type="date" name="sdate" class="form-control sDate" id="inputPassword4" data-id={{ $today }} min={{ $today }} max="" value="{!! old('sdate') !!}">
                                            <span style="color:red;display:none;" class="leagueStartDate1">League Start Date Must be Larger than or Equel To Today</span> 
                                            <!-- <span style="color:red;display:none;" class="leagueStartDate">League Start Date Must be Smaller than League End Date</span>  -->

                                            @if ($errors->has('sdate'))
                    <span class="help-block">{{ $errors->first('sdate') }}.</span>
                @endif
                                    </div>
                                    <input type="hidden" name="organization" value="{{Auth::user()->organization_id?Auth::user()->organization_id:$id}}">

                                    <div class="col-md-6">
                                            <label class="control-label" for="inputPassword4">{{ __('league.end_date') }} <span style="color:red;"><b> *</b></span></label>
                                            <input type="date" name="edate" class="form-control eDate" id="inputPassword4" min="" max="" value="{!! old('edate') !!}">
                                            <span style="color:red;display:none;" class="leagueEndDate">League End Date Must be Larger than League Start Date</span> 
                                            <span style="color:red;display:none;" class="leagueEndDate1">League End Date Must be Larger than Today and League Start Date</span> 

                                   @if ($errors->has('edate'))
                    <span class="help-block">{{ $errors->first('edate') }}.</span>
                @endif
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-6">  
                                                <label class="control-label" for="inputPassword4">{{ __('league.reg_st_date') }} <span style="color:red;"><b> *</b></span></label>
                                                <input type="date" name="regsdate" class="form-control startDate" id="inputPassword4"  max="" value="{!! old('regsdate') !!}">
                                               <span style="color:red;display:none;" class="RegStartDate">Registration Start Date Must be smaller than League Start Date and End Date</span> 
                                               <span style="color:red;display:none;" class="RegStartDate1">Registration Start Date Must be Larger than Today</span> 
 @if ($errors->has('regsdate'))
                    <span class="help-block">{{ $errors->first('regsdate') }}.</span>
                @endif
                                        </div>
                                        <input type="hidden" name="organization" value="{{Auth::user()->organization_id?Auth::user()->organization_id:$id}}">

                                        <div class="col-md-6">
                                                <label class="control-label" for="inputPassword4">{{ __('league.reg_end_date') }} <span style="color:red;"><b> *</b></span></label>
                                                <input type="date" name="regedate" class="form-control endDate" id="inputPassword4"  max="" value="{!! old('regedate') !!}">
                                               <span style="color:red;display:none;" class="RegEndDate">Registration End Date Must be smaller than League Start Date and End Date</span> 
                                               <span style="color:red;display:none;" class="RegEndDate1">Registration End Date Must be Larger than Registration Start Date</span> 
 @if ($errors->has('regedate'))
                    <span class="help-block">{{ $errors->first('regedate') }}.</span>
                @endif
                                        </div>
                                    </div>
                                        <div class="row">
                                        <div class="form-group form-actions">
                                            <div class="col-md-6"> 
                                                    <label class="control-label" for="inputPassword4">{{ __('league.champ_method') }}  <span style="color:red;"><b> *</b></span></label><br>
                                                    <input type="radio" name="points" value="1"  @if(old('points')=='1') checked @endif>{{ __('league.points') }}  <br>
                                                    <input type="radio" name="points" value="0" @if(old('points')=='0') checked @endif>{{ __('league.place') }} 
                                           @if ($errors->has('points'))
                    <span class="help-block">{{ $errors->first('points') }}.</span>
                @endif
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">  
                                                <input style="float:right" id="button" type="submit" class="btn btn-raised btn-primary submit" value="{{ __('dashboard.submit') }} ">
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

//     $(document).on('change','.startDate',function(){
//     var date=$(this).val();
//     var leagueFromDate=$('.sDate').val();
//     var leagueToDate=$('.eDate').val();
// if(date>=leagueFromDate){
//     $('.leagueStartDate').show();
//     $('.submit').prop('disabled', true);


// }
// else if(date>=leagueToDate){
//     $('.leagueStartDate').show();
//     $('.submit').prop('disabled', true);

// }else{
//     $('.leagueStartDate').hide();
//     $('.submit').prop('disabled', false);
// }
//     });
//         $(document).on('change','.endDate',function(){
//     var date=$(this).val();
//     var leagueFromDate=$('.sDate').val();
//     var leagueToDate=$('.eDate').val();
// if(date>=leagueFromDate){
//     $('.leagueEndDate').show();
//     $('.submit').prop('disabled', true);
// }
// else if(date>=leagueToDate){
//     $('.leagueEndDate').show();
//     $('.submit').prop('disabled', true);

// }else{
//     $('.leagueEndDate').hide();
//     $('.submit').prop('disabled', false);
// }
//     });
$('.eDate').on('change',function(){
    var today=$('.sDate').attr("data-id");
    var leagueFromDate=$('.sDate').val();
    var leagueToDate=$('.eDate').val();
    if(leagueToDate<today){
    $('.leagueEndDate1').show();
    $('.leagueEndDate').hide();
    $('.submit').prop('disabled', true);
    }else if(leagueToDate<leagueFromDate){
        $('.leagueEndDate').show();
        $('.leagueEndDate1').hide();
        $('.submit').prop('disabled', true);
    }else if(today>leagueFromDate){
    $('.leagueEndDate1').hide();
    $('.leagueEndDate').hide();
    $('.leagueStartDate').hide();
    $('.leagueStartDate1').show();
}else{
    $('.leagueEndDate1').hide();
    $('.leagueEndDate').hide();
    $('.leagueStartDate').hide();
    $('.leagueStartDate1').hide();
    $('.submit').prop('disabled', false);


}
    });

    $('.sDate').on('change',function(){
        var today=$('.sDate').attr("data-id");
        var leagueFromDate=$('.sDate').val();
        var leagueToDate=$('.eDate').val();
    if(leagueFromDate<today){
    $('.leagueStartDate1').show();
    $('.leagueStartDate').hide();

    $('.submit').prop('disabled', true);
}else{
    $('.leagueStartDate').hide();
    $('.leagueStartDate1').hide();
    $('.submit').prop('disabled', false);
}
    });

    $('.startDate').on('change',function(){
    var today=$('.sDate').attr("data-id");
    var leagueRegSDate=$('.startDate').val();
    var leagueFromDate=$('.sDate').val();
    var leagueToDate=$('.eDate').val();
    if(leagueRegSDate>=leagueFromDate ||leagueRegSDate>leagueToDate){
    $('.RegStartDate').show();
    $('.RegStartDate1').hide();
    $('.submit').prop('disabled', true);
    }else if(today>leagueRegSDate){
        $('.RegStartDate1').show();
        $('.RegStartDate').hide();
        $('.submit').prop('disabled', true);
}else{
    $('.RegStartDate').hide();
    $('.RegStartDate1').hide();

    $('.submit').prop('disabled', false);

}


    });
    $('.endDate').on('change',function(){
    var leagueRegSDate=$('.startDate').val();
    var RegEndDate=$('.endDate').val();
    var leagueFromDate=$('.sDate').val();
    var leagueToDate=$('.eDate').val();
   if(RegEndDate>=leagueFromDate){
    $('.RegEndDate').show();
    $('.RegEndDate1').hide();

        $('.submit').prop('disabled', true);
   }else if(RegEndDate<leagueRegSDate){
    $('.RegEndDate1').show();
    $('.RegEndDate').hide();
    $('.submit').prop('disabled', true);


   }else{
    $('.RegEndDate1').hide();
    $('.RegEndDate').hide();
    $('.submit').prop('disabled', false);

   }

    });
</script>
@stop