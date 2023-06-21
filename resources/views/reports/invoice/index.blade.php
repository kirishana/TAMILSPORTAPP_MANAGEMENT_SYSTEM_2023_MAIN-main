@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Invoices
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
    <h1>Invoices</h1>
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
        <li class="active">Invoices</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Invoices
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
                            
                        </div>

                    </div>
                    <br>
                    <div class="row">
                     
                    </div>
                    <div class="table-responsive" style="text-transform:capitalize;">



                        @include('reports.invoice.filter')

                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <!-- Third Basic Table Ends Here-->
</section>


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

        $("#points").click(function() {
            $("#clpoints").print();
        });
        var leagueData = [];
        $("#season").on('change', function() {
            leagueData = $(".season option:selected").val();




            var length = leagueData.length;

            $.ajax({
                type: 'get',
                url: '/report/league/invoice/search',
                data: {
                    "_token": "{{ csrf_token() }}",

                    "length": length,
                    'leagueData': leagueData,

                },
                success: function(response) {
                    $('#invoices').html(response['html']);


                }
            });
        });

    });
</script>
@stop