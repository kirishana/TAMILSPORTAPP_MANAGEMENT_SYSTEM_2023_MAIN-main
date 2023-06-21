@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Club Teams
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />


@stop
<!--  -->

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Reports</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Reports</a></li>
        <li class="active">Club Teams</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  ">group</i>
                    Club Teams
                    
                </h4>
            </div>
            
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <input id="t_name" value="" name="t_name[]" placeholder="Club Team Name" type="text" style="
                            width: 100%;
                            padding: 12px 20px;
                            margin: 8px 0;
                            margin-top:28px;
                            display: inline-block;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            box-sizing: border-box;">
                    </div>

                    <div class="col-md-3">
                        <input id="p_name" value="" name="p_name[]" placeholder="Player" type="text" style="
                            width: 100%;
                            padding: 12px 20px;
                            margin: 8px 0;
                            margin-top:28px;
                            display: inline-block;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            box-sizing: border-box;">

                        </div>

                    <div class="col-md-3">
                        <select id="gender" class="form-control multiselect gender" placeholder="Select Gender">
                            <option value="0">Select Gender</option>
                            @foreach($genders as $gender)
                            <option value={{ $gender->id }}>{{ $gender->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select id="age" class="form-control multiselect age" placeholder="Select AgeGroup">
                            <option value="0">Select AgeGroup</option>
                            @foreach($ageGroups as $ageGroup)
                            <option value={{ $ageGroup->id }}>{{ $ageGroup->name }}</option>
                            @endforeach
                        </select>
                    </div>

<div class="row">
<div class="col-md-12 export-button" style="margin-top: 35px; display:flex; justify-content:flex-end;">
    <a id="c_t_btn"  style="cursor:pointer"><img src="{{asset('assets/images/print.png')}}" style="float: right;margin-right:5px;"class="img-responsive" /> </a>
    <a href="/report/clubteams/export" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
    <a href="/report/clubteams/excel"> <img src="{{asset('assets/images/excel.png')}}"  style="float: right;margin-right:5px;"class="img-responsive" /></a>
</div>
</div>
<br>

<div class="col-md-12">
                
            @include('admin.reports.clubteam.clubteam_table')
            </div>
        </div>
    </div> <!-- row-->
</section>
<div style="display:none;">
    @include('admin.reports.clubteam.clubteam_table_filter')
</div>

@stop


{{-- page level scripts --}}
@section('footer_scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
$(document).ready(function() {

      
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

});




$("#c_t_btn").click(function() {
$("#c-team").print();
});


var obj = {};
var genderData;
var tname;
var pname;
var age;
$("#gender").on('change', function() {
    genderData=$(".gender option:selected").val();
    age=$(".age option:selected").val();
    tname = document.getElementById('t_name').value;
    pname = document.getElementById('p_name').value;

    obj['gender'] = genderData;
    obj['t_name'] = tname;
    obj['p_name'] = pname;
    obj['age'] = age;
$.ajax({
    type: 'POST',
    url: '/report/clubteamsfilter',
    data: {
        "_token": "{{ csrf_token() }}",
        "obj": obj,
    },
    success: function(response) {
        $('.club-t').html(response['html'])
        $('.club-t2').html(response['html2'])

    }
});
});

//country
$("#t_name").on('keyup', function() {
    genderData=$(".gender option:selected").val();
    age=$(".age option:selected").val();
    tname = document.getElementById('t_name').value;
    pname = document.getElementById('p_name').value;

    obj['gender'] = genderData;
    obj['t_name'] = tname;
    obj['p_name'] = pname;
    obj['age'] = age;
$.ajax({
    type: 'POST',
    url: '/report/clubteamsfilter',
    data: {
        "_token": "{{ csrf_token() }}",
        "obj": obj,
    },
    success: function(response) {
        $('.club-t').html(response['html'])
        $('.club-t2').html(response['html2'])

    }
});
});
//gender

$("#p_name").on('keyup', function() {
    genderData=$(".gender option:selected").val();
    age=$(".age option:selected").val();
    tname = document.getElementById('t_name').value;
    pname = document.getElementById('p_name').value;

    obj['gender'] = genderData;
    obj['t_name'] = tname;
    obj['p_name'] = pname;
    obj['age'] = age;
$.ajax({
    type: 'POST',
    url: '/report/clubteamsfilter',
    data: {
        "_token": "{{ csrf_token() }}",
        "obj": obj,
    },
    success: function(response) {
        $('.club-t').html(response['html'])
        $('.club-t2').html(response['html2'])
    }
});
});

//country
$("#age").on('change', function() {
    genderData=$(".gender option:selected").val();
    age=$(".age option:selected").val();
    tname = document.getElementById('t_name').value;
    pname = document.getElementById('p_name').value;

    obj['gender'] = genderData;
    obj['t_name'] = tname;
    obj['p_name'] = pname;
    obj['age'] = age;
$.ajax({
    type: 'POST',
    url: '/report/clubteamsfilter',
    data: {
        "_token": "{{ csrf_token() }}",
        "obj": obj,
    },
    success: function(response) {
        $('.club-t').html(response['html'])
        $('.club-t2').html(response['html2'])

    }
});
});
</script>

@stop




