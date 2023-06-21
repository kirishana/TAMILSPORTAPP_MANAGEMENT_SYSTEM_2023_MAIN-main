@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Participants
@parent
@stop

    {{-- page level styles --}}
    @section('header_styles')
    <style>
        .mt-100 {
            margin-top: 100px
        }
        .rotate {
			white-space:nowrap;
		    -webkit-transform: rotate(-90deg);
		    -webkit-transform-origin: 10px;
		    -moz-transform: rotate(-90deg);
		    -moz-transform-origin: 10px;
		    -ms-transform: rotate(-90deg);
		    -ms-transform-origin: 10px;
		    -o-transform: rotate(-90deg);
		    -o-transform-origin: 10px;
		    transform: rotate(-90deg);
		    transform-origin: 10px;
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
            <h1>Participants OverView</h1>
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
                <li class="active">Participants OverView</li>
            </ol>
        </section>
        <!--section ends-->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Participants Overview
                            </h3>
                        </div>
                        <div class="row">

<div>


    <div class="tab-content">
     <div class="tab-pane fade active in" id="tab1">
       
  
                   
                         
                            <div class="panel-body">
                               

                            <div class="row">
                                </div>
                                <div class="col-md-5">
                            <select id="league" class="form-control multiselect league" placeholder="Select Season">
                                <option disabled selected>Select League</option>
                                @foreach($leagues1 as $season)
                                @if($season->id==$ongngLeagues->id)
                                <option selected value={{ $season->id }} data-name={{ $season->name }}>{{ $season->name }}</option>
                                @else
                                <option value={{ $season->id }} data-name={{ $season->name }}>{{ $season->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                                </div>
                               

                                   
                                 
                                   
                            </div>
                            <div class="row ">
                            <div class="col-md-2 pull-right" style="margin-top:5px; display:flex; justify-content:flex-end;">
                            <a href="/partOverview/excel"><button type="button"
                                    
                                    class="btn btn-primary" data-column="0">Download Excel</button></a>
                               
                                </div>
                            </div>
                            <br>


                            <div class="table-responsive">
                            @include('admin.PDF.participantsOverviewfilter')

                            </div>


                        </div>
        </div>
        <div class="tab-pane fade  in" id="tab2" disabled="disabled">      
        <div class="panel-body">
                               
        <div class="table-responsive">
                        
                            </div>

   
   
   
                           </div>

        </div>





</div>
</div>

                    </div>
                </div>

            </div>

        </section>




        <!-- content -->
        @stop

            {{-- page level scripts --}}
            @section('footer_scripts')


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"
                integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
        

               $(document).ready(function() {
        var multipleCancelButton = new Choices('#league', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });

        $("#print20").click(function() {
            $("#print").print();
        });
        var leagueData = [];
        $("#league").on('change', function() {
            leagueData = $(".league option:selected").val();



            var length = leagueData.length;

            $.ajax({
                type: 'POST',
                url: '/partOverview/search',
                data: {
                    "_token": "{{ csrf_token() }}",

                    "length": length,
                    'leagueData': leagueData,

                },
                success: function(response) {
                    $('#filter1').html(response['html'])
                    $('#print').html(response['html2'])

                }
            });
        });
        });
            </script>
            @stop