@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Event Results
Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/tab.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<style>
    @media (max-width:340px) {
        .button-group .button {
            padding: 0 10px !important;
        }
    }
</style>
@stop



@section('content')
<section class="content-header">
    <h1>Event Results</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href=""> Events</a></li>
        <li class="active">Results</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    Event Results

                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive" style="min-height:800px;">
                <div class="row">
                    @if(Auth::user()->hasRole(3))
                    @elseif(Auth::user()->hasRole(7))
                    <div class="col-md-3">
                        <select id="organization" class="form-control multiselect organization" placeholder="Select Organization">
                            <option value="0">Select Organization</option>
                            @foreach($organizations as $organization)
                            <option value={{ $organization->id }}>{{ $organization->name }}</option>
                            @endforeach
                        </select>

                        </div>
               
                        <div class="col-md-3">

                        <select id="league" class="form-control multiselect league" placeholder="Select League">
                            <option value="0">Select League</option>

                            @foreach($leagues as $league)
                            <option value={{ $league->id }}>{{ $league->name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-md-3">

                            <select id="event" class="form-control multiselect event" placeholder="Select Event">
                                <option value="0">Select Event</option>
                                @foreach($registrations as $registration)
                            @foreach($registration->events as $event)
                            <option value={{ $event->mainEvent->id }}>{{ $event->mainEvent->name }}</option>
                            @endforeach
                            @endforeach
                            </select>
                            </div>
                            <div class="col-md-2">

                            <select id="status" class="form-control multiselect status" placeholder="Select Status">
                                <option value="5">Select Status</option>
                                <option value="1">Finished</option>
                                <option value="2">Ongoing</option>
                                <option value="0">NotStarted</option>

                            </select>
                            </div>
                            </div>
                            @if(Auth::user()->hasRole(7))
                            @else
                            <div class="row">
                            <div class="col-md-1 pull-right" style="margin-top: 20px; display:flex; justify-content:flex-end;">
                            <a id="btn2" style="cursor:pointer;margin-right: 5px;"><img src="{{asset('assets/images/print.png')}}" style="float: right;" class="img-responsive" />
                            </a>
                            <a href="/results/export" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>

                             <a href="/results/excel"> <img src="{{asset('assets/images/excel.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>
                            </div>
                            </div>
@endif

                    @else
                    <div class="col-md-2">

                        <select id="season" class="form-control multiselect season" placeholder="Select Season">
                            <option value="0">Select Season</option>
                            @foreach($seasons as $season)
                            <option value={{ $season->id }} data-name={{ $season->name }}>{{ $season->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-3">

                        <select id="league" class="form-control multiselect league" placeholder="Select League">
                            <option value="0">Select League</option>
                            @foreach($leagues as $league)
                            <option value={{ $league->id }}>{{ $league->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">

                        <select id="event" class="form-control multiselect event" placeholder="Select Event">
                            <option value="0">Select Event</option>
                            @foreach($mainEvents as $mainEvent)
                            <option value={{ $mainEvent->id }}>{{ $mainEvent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="age" class="form-control multiselect age" placeholder="Select AgeGroup" >
                            <option value="0">Select AgeGroup</option>
                            @foreach($ageGroups as $ageGroup)
                            <option value={{ $ageGroup->id }}>{{ $ageGroup->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="gender" class="form-control multiselect gender" placeholder="Select Gender">
                            <option value="0">Select Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-2 pull-right" style="margin-top: 20px; display:flex; justify-content:flex-end;">
                        <a id="btn2" style="cursor:pointer;"><img src="{{asset('assets/images/print.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
                        <a href="/results/export" target="_blank"><img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
                        <a href="/results/excel"> <img src="{{asset('assets/images/excel.png')}}" style="float: right;margin-right:18px;" class="img-responsive" /></a>
                    </div>
                    </div>
                    @endif
                <br>
                <div class="panel-body table-responsive">
                    @include('players.search')
                </div> 
            </div>

</section>
<div style="display:none" class="panel-body table-responsive">
                    @include('players.printEventResultPreview')
                 </div>
                </div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("#btn2").click(function() {
        $(".suvarna").print();
    });
   
    $(document).ready(function() {

        var multipleCancelButton = new Choices('#season', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#league', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#gender', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#age', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#event', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#status', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#organization', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });

    });
    $("#btn").click(function() {
        $("#events").print();
    });
    var obj = {};
    var leagueData ;
    var seasonData ;
    var genderData ;
    var eventData ;
    var ageData ;
    var statusData ;
    var organizationData ;

    $("#season").on('change', function() {

        seasonData=$(".season option:selected").val();
        // alert(seasonData);
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        statusData=$(".status option:selected").val();
        organizationData=$(".organization option:selected").val();

        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['status'] = statusData;
        obj['organization'] = organizationData;
        obj['age'] = ageData;
        obj['event'] = eventData;
       
        $.ajax({
            type: 'GET',
            url: '/results/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.genders').html(response.html)
                $('.suvarna').html(response.html2)
            }
        });
    });

    //country
    $("#league").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        statusData=$(".status option:selected").val();
        organizationData=$(".organization option:selected").val();

        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['status'] = statusData;
        obj['organization'] = organizationData;
        obj['age'] = ageData;
        obj['event'] = eventData;
$.ajax({
type: 'GET',
url: '/results/search',
data: {
    "_token": "{{ csrf_token() }}",
    "obj": obj,
},
success: function(response) {
    $('.genders').html(response.html);
    $('.suvarna').html(response.html2);

}
});
});

    //gender

    $("#gender").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        statusData=$(".status option:selected").val();
        organizationData=$(".organization option:selected").val();

        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['status'] = statusData;
        obj['organization'] = organizationData;
        obj['age'] = ageData;
        obj['event'] = eventData;
$.ajax({
type: 'GET',
url: '/results/search',
data: {
    "_token": "{{ csrf_token() }}",
    "obj": obj,
},
success: function(response) {
    $('.genders').html(response.html);
    $('.suvarna').html(response.html2);
}
});
});

    //name

    //country
    $("#age").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        statusData=$(".status option:selected").val();
        organizationData=$(".organization option:selected").val();

        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['status'] = statusData;
        obj['organization'] = organizationData;
        obj['age'] = ageData;
        obj['event'] = eventData;
$.ajax({
type: 'GET',
url: '/results/search',
data: {
    "_token": "{{ csrf_token() }}",
    "obj": obj,
},
success: function(response) {
    $('.genders').html(response.html);
    $('.suvarna').html(response.html2);
}
});
});

    $("#event").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        statusData=$(".status option:selected").val();
        organizationData=$(".organization option:selected").val();

        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['status'] = statusData;
        obj['organization'] = organizationData;
        obj['age'] = ageData;
        obj['event'] = eventData;
$.ajax({
type: 'GET',
url: '/results/search',
data: {
    "_token": "{{ csrf_token() }}",
    "obj": obj,
},
success: function(response) {
    $('.genders').html(response.html);
    $('.suvarna').html(response.html2);

}
});
});
    $("#organization").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        statusData=$(".status option:selected").val();
        organizationData=$(".organization option:selected").val();

        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['status'] = statusData;
        obj['organization'] = organizationData;
        obj['age'] = ageData;
        obj['event'] = eventData;
$.ajax({
type: 'GET',
url: '/results/search',
data: {
    "_token": "{{ csrf_token() }}",
    "obj": obj,
},
success: function(response) {
    $('.genders').html(response.html);
    $('.suvarna').html(response.html2);

}
});
});
    $("#status").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        statusData=$(".status option:selected").val();
        organizationData=$(".organization option:selected").val();

        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['status'] = statusData;
        obj['organization'] = organizationData;
        obj['age'] = ageData;
        obj['event'] = eventData;
$.ajax({
type: 'GET',
url: '/results/search',
data: {
    "_token": "{{ csrf_token() }}",
    "obj": obj,
},
success: function(response) {
    $('.genders').html(response.html);
    $('.suvarna').html(response.html2);

}
});
});

</script>
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
        <!--Content-->
        <div class="modal-content">

            <div class="modal-header" style="border-bottom:none">
                <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Winners Details</h2>

            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">

                <div class="md-form ml-0 mr-0">

                    <div class="row">
                        <div class="col-md-12">
                            <table>

                                <tbody id="tbody1">



                                </tbody>
                                <tbody id="tbody2">



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Login with Avatar Form-->




    @stop