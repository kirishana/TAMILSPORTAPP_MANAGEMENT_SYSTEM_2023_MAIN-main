@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Events
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<style>
    .mt-100 {
        margin-top: 100px
    }

    /* body {
        background: #00B4DB;
        background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
        background: linear-gradient(to right, #0083B0, #00B4DB);
        color: #514B64;
        min-height: 100vh
    } */
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />

@stop

{{-- Page content--}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Events</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>

                Dashboard
            </a>
        </li>
        <li>
            <a href="#">Reports</a>
        </li>
        <li class="active">Events</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Events
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">

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
                                @foreach($mainEvents as $event)
                                <option value={{ $event->id }}>{{ $event->name}}</option>
                                @endforeach
                            </select>
                        </div>
                       <div class="col-md-4"></div>
                       
                    </div>
                    <div class="row">
                        
                        <div class="col-md-1 pull-right" style="margin-top: 35px; display:flex; justify-content:flex-end;">
                            <a id="btn" style="cursor:pointer;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}" />
                            </a>
                            <a href="/event/export" style="float:right;margin-right:5px;" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" />
                            </a>

                            <a href="/event/excel" style="float:right;margin-right:5px;"> <img src="{{asset('assets/images/excel.png')}}" />
                            </a>
                        </div>
                    </div>
                   
                    <br>
                    <div class="row">
                    <div class="table-responsive" style="display:none">
                        @include('admin.events.eventsPlayerPreview')
                        </div>
                    <div class="table-responsive">
                        @include('admin.events.eventsPlayerfilter')
                    </div> 
                   
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
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
        var multipleCancelButton = new Choices('#event', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });

    });
    $("#btn").click(function() {
        $("#e-print").print();
    });
    var obj = {};
    var leagueData;
    var seasonData;
    var eventData;

    $("#season").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        eventData=$(".event option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['event'] = eventData;
        $.ajax({
            type: 'POST',
            url: '/event/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('#eventPlayers').html(response['html'])

            }
        });
    });

    //country
    $("#league").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        eventData=$(".event option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['event'] = eventData;
        $.ajax({
            type: 'POST',
            url: '/event/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('#eventPlayers').html(response['html'])
            }
        });
    });
    //gender

    $("#gender").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        eventData=$(".event option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['event'] = eventData;
        $.ajax({
            type: 'POST',
            url: '/event/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('#eventPlayers').html(response['html'])
            }
        });

    });
   
    $("#event").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        eventData=$(".event option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['event'] = eventData;
        $.ajax({
            type: 'POST',
            url: '/event/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('#eventPlayers').html(response['html'])
            }
        });
    });
    
</script>
@stop