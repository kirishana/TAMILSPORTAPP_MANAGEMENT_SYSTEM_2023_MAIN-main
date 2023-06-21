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
                        Users
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                     <div class="col-md-3"> 

                       <select id="season" class="form-control multiselect season" placeholder="Select Season">
                                <option value="duplicate"></option>
                                @foreach($leagues as $season)
                                <option value={{ $season->id }} data-name={{ $season->name }}>{{ $season->name }}</option>
                                @endforeach
                            </select> 
                      </div> 
                       
                       
                       


                        <div class="col-md-1 pull-right" style="margin-top:15px;">
                            <a id="btn" style="cursor:pointer"><img src="{{asset('assets/images/print.png')}}" style="float: right;" class="img-responsive" />
                            </a>
                            <a href="/user/export" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>

                            <a href="/user/excel"> <img src="{{asset('assets/images/excel.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                    </div>
                    <div class="table-responsive">



                        @include('reports.particpants.filterParticipantsData')

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Third Basic Table Ends Here-->
</section>

<div style="display:none;">
    {{-- @include('admin.users.printUserPreview') --}}
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
       
    $("#btn").click(function() {
        $("#users").print();
    });
    var leagueData = [];
    $("#season").on('change', function() {
        leagueData=$(".season option:selected").val();

       
      
        
        var length = leagueData.length;
      
        $.ajax({
            type: 'POST',
            url: '/participant/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "length": length,
                'leagueData': leagueData,

            },
            success: function(response) {
                $('.particpants').html(response['html'])
            }
        });
    });

});
</script>
@stop