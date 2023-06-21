@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Organizations
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
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Participants</h1>
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
        <li class="active">Participants</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Participants
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row filter-cont" style="height:500px;">

                        <div class="col-md-3" >

                            <select id="event" class="form-control multiselect event" placeholder="Select Event" multiple>
                                <option value="duplicate">all</option>
                                @foreach($events as $event)
                                <option value={{ $event->id }} data-name={{ $event->name }}>{{ $event->mainEvent->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">

                            <select id="ageGroup" class="form-control multiselect ageGroup" placeholder="Select AgeGroup" multiple>
                                <option value="duplicate2">all</option>

                                @foreach($ageGroups as $ageGroup)
                                <option value={{ $ageGroup->id }}>{{ $ageGroup->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">

                            <select id="gender" class="form-control multiselect gender" placeholder="Select Gender" multiple>
                                <option value="duplicate2">all</option>

                                @foreach($genders as $gender)
                                <option value={{ $gender->id }}>{{ $gender->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-3 export-button" style="margin-top: 35px; display:flex; justify-content:flex-end;" >                         
                            <a id="btn" style="cursor:pointer"><img src="{{asset('assets/images/print.png')}}"  />
                            </a>
                            <a href="" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}"  />
                            </a>
                           
                            <a href=""> <img src="{{asset('assets/images/excel.png')}}" />
                            </a>
                        </div>
                        

                    </div>
                    <br>
                    <div class="table-responsive">



                        @include('admin.reports.participants.filterData')
                 

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Third Basic Table Ends Here-->
</section>

<div style="display:none;">
    {{-- @include('admin.reports.printPreview') --}}
</div>
<!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {

        var multipleCancelButton = new Choices('#event', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#ageGroup', {
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


    });
    $("#btn").click(function() {
        $("#ex").print();
    });
    var obj = {};
    var eventData = [];
    var ageGroupData = [];
    var genderData = [];

    $("#event").on('change', function() {
        $.each($(".event option:selected").map(function() {

        eventData.push($(this).val());
        }));
        $.each($(".ageGroup option:selected").map(function() {

            ageGroupData.push($(this).val());
        }));
        $.each($(".gender option:selected").map(function() {

genderData.push($(this).val());
}));

        // alert(Data);
        obj['event'] = eventData;
        obj['ageGroup'] = ageGroupData;
        obj['gender'] = genderData;

        var length = eventData.length;
        var length2 = ageGroupData.length;
        var length3 = genderData.length;

        $.ajax({
            type: 'POST',
            url: '/event-participant/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
                "length": length,
                "length2": length2,
               'length3':length3,
               'ageGroupData':ageGroupData

            },
            success: function(response) {
                 $('#partiest').html(response['html'])
            }
        });

    });

    //ageGroup
    $("#ageGroup").on('change', function() {
        $.each($(".event option:selected").map(function() {

        eventData.push($(this).val());
        }));
        $.each($(".ageGroup option:selected").map(function() {

            ageGroupData.push($(this).val());
        }));
        $.each($(".gender option:selected").map(function() {

genderData.push($(this).val());
}));

        // alert(Data);
        obj['event'] = eventData;
        obj['ageGroup'] = ageGroupData;
        obj['gender'] = genderData;

        var length = eventData.length;
        var length2 = ageGroupData.length;
        var length3 = genderData.length;

        $.ajax({
            type: 'POST',
            url: '/event-participant/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
                "length": length,
                "length2": length2,
               'length3':length3,
               'ageGroupData':ageGroupData
            },
            success: function(response) {
                 $('#partiest').html(response['html'])
            }
        });

    });

    $("#export").on('click', function() {
        $.each($(".season option:selected").map(function() {

            seasonData.push($(this).val());
        }));
        $.each($(".country option:selected").map(function() {

            countryData.push($(this).val());
        }));

        obj['country'] = countryData;
        obj['season'] = seasonData;
        var length2 = countryData.length;
        var length = seasonData.length;
        $.ajax({
            type: 'GET',
            url: '',
            ContentType: 'application/pdf',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
                "length2": length2,
                "length": length,
                'countryData': countryData,
                'seasonData': seasonData


            },


        });
    });
</script>
@stop