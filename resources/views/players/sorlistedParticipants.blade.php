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
        <li class="active">All Events</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    Events
                    <div style="float:right">
                        <a href="/event/create" style="color:white"><i class="material-icons  leftsize">add_circle</i>
                            Add New</a>
                    </div>
                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">
                <form action="/event/participated-players" method="POST">

                <div class="panel-body table-responsive">

                    <table class="table table-striped table-bordered events" id="">
                        <thead>
                            <tr>
                                <th>Player Name</th>
                                <th>Contact Number</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

                               
                            @foreach($sorlistedParticipants as $sorlistedParticipant)

                            <tr>
                                
                            <td>{{$sorlistedParticipant->first_name}} {{ $sorlistedParticipant->last_name }}
                                    <br>
                                </td>
                                <td>{{ $sorlistedParticipant->email }}</td>
                                <td><input type="checkbox" name="attendances[]" value="{{ $sorlistedParticipant->id}}">

                                   


                            </tr>

                                                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-labeled btn-primary">
                            Next
                            <span class="btn-label cool_btn_right">
                                <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                            </span>
                        </button>
                </div>

            </div>
        </form>

</section>


@stop



{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>

<script>
    $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $('#id').val(id);
    });

    $(document).on('click', '.update', function(e) {
        e.preventDefault();
        var id = $('#id').val();
        var judge = $('#judge').val();
        var starter = $("#starter").val();
        var time = $("#time").val();
        var method = $('#_method').val();
        $.ajax({
            type: "POST",
            url: "/event/assign/" + id,
            data: {
                "_token": "{{ csrf_token() }}",
                "judge": judge,
                "starter": starter,
                "id": id,
                "time": time,
                "method": method
            },

            dataType: "json",
            success: function(response) {
                window.location.href = response.url;

            }
        });
    });
</script>



@stop