@extends('admin/layouts/default')

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
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Users</h1>
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
        <li class="active">Users</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Users
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                       
                        <div class="col-md-3">

                            <select id="country" class="form-control multiselect role" placeholder="Select Role">
                                <option value="0">Select Role</option>

                                @foreach($roles as $role)
                                <option value={{ $role->id }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">

                            <select id="gender" class="form-control multiselect gender" placeholder="Select Gender" >
                                <option value="0">Select Gender</option>
                                @foreach($genders as $gender)
                                <option value={{ $gender->id }}>{{ $gender->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input id="f_name" value="" name="f_name[]" placeholder="User Name" type="text" style="
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        margin-top:28px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    ">

                        </div>

                     <div class="col-md-3"> 
                         <select id="country" class="form-control multiselect club" placeholder="Select Club" >
                                <option value="0">Select Club</option>
                                <option value="exceptClub">Except Club</option>
                                @foreach($clubs as $club)
                                <option value={{ $club->id }} data-name={{ $club->club_name }}>{{ $club->club_name }}</option>
                                @endforeach
                            </select>
                         </div>
                        <div class="col-md-3 pull-right" style="margin-top: 35px; display:flex; justify-content:flex-end;">
                            <a id="btn" style="cursor:pointer ;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}" class="img-responsive" />
                            </a>
                            <a href="/user/export" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>

                            <a href="/user/excel"> <img src="{{asset('assets/images/excel.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <!-- <button class="addHeading" id="button1" value="Name">Name</button>
                        <button class="addHeading" value="Email">Email</button>
                        <p id="sor" syle="display:none"></p> -->
                    </div>
                    <div class="table-responsive">



                        @include('admin.users.filterUserData')

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Third Basic Table Ends Here-->
</section>

<div style="display:none;">
    @include('admin.users.printUserPreview')
</div>
<!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // var headings=[];
    // $(".addHeading").click(function() {
    //     var th=$(this).val();
    //     var x = document.getElementById("button1");
    //     if(x.style.display == "none") {
    //     x.style.display = "block";
    // } else {
    //     x.style.display = "none";
    // }
    //                         $('#head').append(th);

    // });

    $('.addHeading').click(function() {

        var th = $(this).val();
        var element = document.getElementById('head');
        if (element.style.display == "none") {
            element.style.display = "block";
            $('#head').append('<th class="suvarna">' + th + '</th>');


        } else {
            element.style.display = "none";
            $('.suvarna').last().remove();

        }
        //Add row
    });
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
        var multipleCancelButton = new Choices('#gender', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });

    });
    $("#btn").click(function() {
        $("#usr").print();
    });
    var obj = {};
    var roleData;
    var genderData;
    var fname;
    var clubData;


    //country
    $(".role").on('change', function() {
            roleData=$(".role option:selected").val();
            genderData=$(".gender option:selected").val();
            clubData=$(".club option:selected").val();
            fname = document.getElementById('f_name').value;
       
        obj['role'] = roleData;
        obj['club']=clubData;
        obj['gender'] = genderData;
        obj['name'] = fname;

        $.ajax({
            type: 'POST',
            url: '/user/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.users').html(response['html'])
            }
        });
    });
    //gender

    $("#gender").on('change', function() {
        roleData=$(".role option:selected").val();
            genderData=$(".gender option:selected").val();
            clubData=$(".club option:selected").val();
            fname = document.getElementById('f_name').value;
       
        obj['role'] = roleData;
        obj['club']=clubData;
        obj['gender'] = genderData;
        obj['name'] = fname;

        $.ajax({
            type: 'POST',
            url: '/user/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
               

            },
            success: function(response) {
                $('.users').html(response['html'])
            }
        });

    });
    //name

    //country
    $("#f_name").on('keyup', function() {
        roleData=$(".role option:selected").val();
            genderData=$(".gender option:selected").val();
            clubData=$(".club option:selected").val();
            fname = document.getElementById('f_name').value;
       
        obj['role'] = roleData;
        obj['club']=clubData;
        obj['gender'] = genderData;
        obj['name'] = fname;
        $.ajax({
            type: 'POST',
            url: '/user/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.users').html(response['html'])
            }
        });

    });
    //club
    $(".club").on('change', function() {
        roleData=$(".role option:selected").val();
            genderData=$(".gender option:selected").val();
            clubData=$(".club option:selected").val();
            fname = document.getElementById('f_name').value;
       
        obj['role'] = roleData;
        obj['club']=clubData;
        obj['gender'] = genderData;
        obj['name'] = fname;

        $.ajax({
            type: 'POST',
            url: '/user/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.users').html(response['html'])
            }
        });
    });
</script>
@stop