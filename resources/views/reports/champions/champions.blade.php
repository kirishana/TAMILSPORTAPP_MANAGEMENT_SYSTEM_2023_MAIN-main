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
    .example::-webkit-scrollbar {
            display: none;
        }

        .example {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    /* body {
        background: #00B4DB;
        background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
        background: linear-gradient(to right, #0083B0, #00B4DB);
        color: #514B64;
        min-height: 100vh
    } */
</style>
<style>
      .loader {
position: fixed;
top: 0%;
left:0%;
right:0%;
bottom: 0;
width: 100%;

background-repeat: no-repeat;
background-size: 75px 75px;
z-index: 99999;
}
     </style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Champion Lists</h1>
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
        <li class="active">Champion Lists</li>
    </ol>
</section>
<!--section ends-->
<section class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Champion Lists
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">

                            <select id="season" class="form-control multiselect season" placeholder="Select Season">
                                <option disabled selected>Select League</option>
                                @foreach($leagues as $season)
                                <option value={{ $season->id }} data-name={{ $season->name }}>{{ $season->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 pull-right" style="margin-top: 35px; display:flex; justify-content:flex-end;">
                            <div class='loader' style="background-image:url('https://i.stack.imgur.com/kOnzy.gif');"></div>

                            <a id="champ" style="cursor:pointer"><img src="{{asset('assets/images/print.png')}}" style="float: right; margin-right:5px;" class="img-responsive" />
                            </a>
                            <a href="/champion/export" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>

                            <a href="/champion/excel"> <img src="{{asset('assets/images/excel.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>
                        </div>

                    </div>
                    <br>
                   
                    <div class="row">
                    </div>
                    <div class="table-responsive example">
                        @include('reports.champions.filterChampionsData')
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <!-- Third Basic Table Ends Here-->
</section>

<div style="display:none;">
    @include('reports.champions.printChampionPreview')
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

        $("#champ").click(function() {
            $("#champs").print();
        });
        var leagueData = [];
        $("#season").on('change', function() {
            leagueData = $(".season option:selected").val();
            var length = leagueData.length;
            $('.loader').show();
            $.ajax({
                type: 'get',
                url: '/champion/search',
                data: {
                    "_token": "{{ csrf_token() }}",

                    "length": length,
                    'leagueData': leagueData,

                },
    
                success: function(response) {
                    
                    $('.loader').hide();
                    $('#champions').html(response['html'])
                    $('#champs').html(response['html2'])

                }
            });
        });

    });
</script>
@stop