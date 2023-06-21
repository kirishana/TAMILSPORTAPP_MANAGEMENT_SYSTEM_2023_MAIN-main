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
    <link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />

@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Club Members</h1>
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
        <li class="active">Club Members</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    Club Members
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                    <div class="col-md-3">
                            <input id="f_name" value="" name="f_name[]" placeholder="first Name" type="text" style="
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
                            <input id="l_name" value="" name="l_name[]" placeholder="Last Name" type="text" style="
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
                            <input id="user_id" value="" name="user_id" placeholder="User Id" type="text" style="
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

                            <select id="gender" class="form-control multiselect gender" placeholder="Select Gender">
                                <option value="0">Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                      
                       

                    
                        <div class="col-md-3 pull-right" style="margin-top: 35px; display:flex; justify-content:flex-end;">
                            <a id="btn-cm" style="cursor:pointer"><img src="{{asset('assets/images/print.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>
                            <a href="/report/clubMembers/export" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>

                            <a href="/report/clubMembers/excel"> <img src="{{asset('assets/images/excel.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
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


                    @include('admin.reports.clubMember.clubMemberFilter')


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Third Basic Table Ends Here-->
</section>

<div style="display:none;">
@include('admin.reports.clubMember.clubMemberPreview')

</div>
<!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"
                integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    // $('.addHeading').click(function() {

    //     var th = $(this).val();
    //     var element = document.getElementById('head');
    //     if (element.style.display == "none") {
    //         element.style.display = "block";
    //         $('#head').append('<th class="suvarna">' + th + '</th>');


    //     } else {
    //         element.style.display = "none";
    //         $('.suvarna').last().remove();

    //     }
    //     //Add row
    // });
    $(document).ready(function() {

      
        var multipleCancelButton = new Choices('#gender', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });

    });
    $("#btn-cm").click(function() {
        $("#c-member").print();
    });
    var obj = {};
    var genderData;
    var fname;
    var lname;
    var user_id;
    $("#gender").on('change', function() {
        genderData=$(".gender option:selected").val();
         fname = document.getElementById('f_name').value;
         lname = document.getElementById('l_name').value;
         user_id = document.getElementById('user_id').value;
       
        // alert(Data);
        obj['gender'] = genderData;
        obj['f_name'] = fname;
        obj['l_name'] = lname;
        obj['user_id'] = user_id;
     
        $.ajax({
            type: 'POST',
            url: '/report/clubMembersfilter',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.club-m').html(response['html'])
            }
        });
    });

    //country
    $("#f_name").on('keyup', function() {
        genderData=$(".gender option:selected").val();
         fname = document.getElementById('f_name').value;
         lname = document.getElementById('l_name').value;
         user_id = document.getElementById('user_id').value;
       
        // alert(Data);
        obj['gender'] = genderData;
        obj['f_name'] = fname;
        obj['l_name'] = lname;
        obj['user_id'] = user_id;
     
        $.ajax({
            type: 'POST',
            url: '/report/clubMembersfilter',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.club-m').html(response['html'])
            }
        });
    });
    //gender

    $("#l_name").on('keyup', function() {
        genderData=$(".gender option:selected").val();
         fname = document.getElementById('f_name').value;
         lname = document.getElementById('l_name').value;
         user_id = document.getElementById('user_id').value;
       
        // alert(Data);
        obj['gender'] = genderData;
        obj['f_name'] = fname;
        obj['l_name'] = lname;
        obj['user_id'] = user_id;
     
        $.ajax({
            type: 'POST',
            url: '/report/clubMembersfilter',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.club-m').html(response['html'])
            }
        });
    });

    //country
    $("#user_id").on('keyup', function() {
        genderData=$(".gender option:selected").val();
         fname = document.getElementById('f_name').value;
         lname = document.getElementById('l_name').value;
         user_id = document.getElementById('user_id').value;
       
        // alert(Data);
        obj['gender'] = genderData;
        obj['f_name'] = fname;
        obj['l_name'] = lname;
        obj['user_id'] = user_id;
     
        $.ajax({
            type: 'POST',
            url: '/report/clubMembersfilter',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.club-m').html(response['html'])
            }
        });
    });
</script>
@stop