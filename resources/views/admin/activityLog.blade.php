@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
Users
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
<?php  
session_start();
?>
{{-- Page content --}}
@section('content2')

<section class="content-header">
    <!--section starts-->
    <h1>Activity Log</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>

                Dashboard
            </a>
        </li>
        
        <li class="active">Activity Log</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Activity Log
                    </h3>
                </div>
                <div class="panel-body">
                 <div class="row">
<div class="col-md-3">
    <input id="search" value="" name="search" placeholder="Search" type="text" style="
        width: 100%;
        padding: 10px 20px;
        margin-top:27px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px; 
        box-sizing: border-box;">
</div>
<div class="pull-right">
<button class="btn btn-danger delete" style="
        width: 100%;
        padding: 10px 20px;
        margin-top:27px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px; 
        box-sizing: border-box;">Clear ActivityLogs</button>
</div>
</div>
<br>
                    <div class="table-responsive">
                    <div class="col-md-12">
    <table class="table table-striped  table-bordered" id="users" style="text-transform: capitalize;">
        <thead class="thead-Dark">
            <tr class="filters" style="text-align: center">

                                <th>User Name</th>
                                <th>Role</th>
                                <th>Description</th>
                                <th>IP Address</th>
                                <th>Activity Made By</th>
                                <th>Created At</th>
            </tr>
        </thead>
       <tbody class="activitylogs">
        @include('admin.filter_activity')
        </tbody>
    </table>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Third Basic Table Ends Here-->
</section>

@stop

@section('footer_scripts')

<script>
        function fetch_data(page,query5) {
            $.ajax({
                url: 'activity?page='+page,
                data:{
                    'query5':query5,
                },
              
            }).done(function (activityLogs) {
                $('tbody').html(activityLogs);
            }).fail(function () {
                console.log("Failed to load data!");

            });
        }       

          $(document).on('keyup', '#search', function() {
        var query5 = $('#search').val();
        var page=$('#hidden_page').val();
               fetch_data(page,query5);
            });

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1];
            var query5=$('#search').val();
            fetch_data(page,query5);

        });
        $('.delete').on('click',function(){
             $.ajax({
            type: 'POST',
            url: '/activity/delete',
            success: function(response) {
                if(response.status==200){
                    $('.activitylogs').load(' .activitylogs');
                }
            }
        });
        });
</script>
@stop