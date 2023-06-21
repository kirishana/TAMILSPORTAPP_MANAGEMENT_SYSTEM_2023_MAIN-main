@extends('admin/layouts/menu')

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
@section('content2')

<section class="content-header">
    <!--section starts-->
    <h1>Organizations</h1>
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
        <li class="active">Organizations</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Organizations
                    </h3>

                    
                </div>
                <div class="panel-body">
                    <div class="row filter-cont">

                        <div class="col-md-3">

                            <select id="season" class="form-control multiselect season" placeholder="Select Season">
                                <option value="0">Select Season</option>
                                @foreach($seasons as $season)
                                <option value={{ $season->id }} data-name={{ $season->name }}>{{ $season->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(Auth::user()->hasRole(1))
                        @else
                        <div class="col-md-3">

                            <select id="country" class="form-control multiselect country" placeholder="Select Country">
                                <option value="0">Select Country</option>

                                @foreach($countries as $season)
                                <option value={{ $season->id }}>{{ $season->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="col-md-3">
                            <input id="org_name" data-name="org_name" value="" name="org_name[]" placeholder="Organization name" type="text" style="
        width: 100%;
        padding: 12px 20px;
        margin: 28px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    ">

                        </div>
      
                      
                        

                    </div>
                                      
        <div class="row">
        <div class="col-md-6 export-button pull-right" style="margin-top: 35px; display:flex; justify-content:flex-end;" >                         
                            <a id="btn" style="cursor:pointer;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}"  />
                            </a>
                            <a href="/organization/export" style="margin-right: 5px;"  target="_blank"> <img src="{{asset('assets/images/pdf.png')}}"  />
                            </a>                          
                            <a href="/organization/excel" style="margin-right: 5px;"> <img src="{{asset('assets/images/excel.png')}}" />
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        @include('admin.reports.filterData')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Third Basic Table Ends Here-->
</section>

<div style="display:none;">
    @include('admin.reports.printPreview')
</div>
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
        var multipleCancelButton = new Choices('#country', {
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
    var countryData;
    var seasonData;
    var orgData;

$("#org_name").on('keyup', function() {
    seasonData=$(".season option:selected").val();
    countryData=$(".country option:selected").val();
    orgData = document.getElementById('org_name').value;

    obj['country'] = countryData;
    obj['season'] = seasonData;
    obj['name']=orgData;
       
        $.ajax({
            type: 'POST',
            url: '/organization/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.organizations').html(response['html'])
            }
        });

    });
    $("#season").on('change', function() {
        seasonData=$(".season option:selected").val();
    countryData=$(".country option:selected").val();
    orgData = document.getElementById('org_name').value;

    obj['country'] = countryData;
    obj['season'] = seasonData;
    obj['name']=orgData;
       
        $.ajax({
            type: 'POST',
            url: '/organization/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.organizations').html(response['html'])
            }
        });

    });

    //country
    $("#country").on('change', function() {
        seasonData=$(".season option:selected").val();
    countryData=$(".country option:selected").val();
    orgData = document.getElementById('org_name').value;

    obj['country'] = countryData;
    obj['season'] = seasonData;
    obj['name']=orgData;
       
        $.ajax({
            type: 'POST',
            url: '/organization/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.organizations').html(response['html'])
            }
        });

    });
</script>
@stop