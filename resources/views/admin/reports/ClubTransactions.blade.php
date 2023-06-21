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
            <h1>Club Transactions</h1>
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
                <li class="active">Club Transactions</li>
            </ol>
        </section>
        <!--section ends-->

        <section class="content">

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Club Transactions
                            </h3>
                        </div>
                            <div class="panel-body">
                                   
                        
                                            <div class="row">


                                            <div class="col-md-5">
                            <select id="league" class="form-control multiselect league" placeholder="Select Season">
                                <option disabled selected>Select League</option>
                                @foreach($leagues as $league1)
                                @if($league1->id==$league->id)
                       <option selected  value={{ $league1->id }}>{{ $league1->name }}</option>
                       @else
                       <option value={{ $league1->id }} data-name={{ $league1->name }}>{{ $league1->name }}</option>
                       @endif
                       @endforeach
                            </select>
                        </div>

</div>
<div class="row">
                                    <div class="col-md-2 pull-right">                                                

                                                    <a href="/clubTransExcel"> <img
                                                            src="{{ asset('assets/images/excel.png') }}"
                                                            style="float: right;"
                                                            class="img-responsive" />
                                                    </a>
                                                    <a href="/clubTransExport" target="_blank"> <img
                                                            src="{{ asset('assets/images/pdf.png') }}"
                                                            style="float: right;margin-right:5px"
                                                            class="img-responsive" />
                                                    </a>
                                                    <a id="print20" style="cursor:pointer"><img
                                                            src="{{ asset('assets/images/print.png') }}"
                                                            style="float: right;margin-right:5px" class="img-responsive" />
                                                    </a>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="table-responsive">
                                        @include('admin.reports.clubTransactionfilter')
                                        </div>
                                        <div style="display:none;">
                                    @include('admin.reports.clubTransactionPreview')

                                     
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
            leagueData1 = $(".league option:selected").val();



            var length = leagueData1.length;

            $.ajax({
                type: 'POST',
                url: '/clubTrans/search',
                data: {
                    "_token": "{{ csrf_token() }}",

                    "length": length,
                    'leagueData1': leagueData1,

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
