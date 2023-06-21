@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Events
Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/tab.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
<style>
    @media (max-width:340px) {
        .button-group .button {
            padding: 0 10px !important;
        }
    }
</style>
@stop



@section('content')
<section class="content-header">
    <h1>Events</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href=""> Events</a></li>
        <li class="active">Results</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    Event Results

                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search" />
                    </div>
                    <div class="col-md-3"></div>

                    <div class="col-md-4"></div>
                </div>

                <div class="panel-body table-responsive">
                    @include('players.search')


                </div>

            </div>
</section>


@stop



{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
<script>
    fetch_customer_data();

    function fetch_customer_data(query = '') {
        $.ajax({
            url: "/search/results",
            method: 'GET',
            data: {
                query: query
            },
            dataType: 'json',
            success: function(response) {
                $('.results').html(response['html'])
            }
        })
    }

    $(document).on('keyup', '#search', function() {
        var query = $(this).val();
        fetch_customer_data(query);
    });
</script>



@stop