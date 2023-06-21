@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Events
Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />

@stop


{{-- Page content --}}
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
        <li><a href="/events"> Events</a></li>
        <li class="active">Event Lists</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons">event</i>
                    Event List
                   
                </h4>

            </div>
            <br />
            <div class="row">
                <div class="col-md-3">
                    <input type="text"  style="  width: 100%;
        padding: 12px 20px;
        margin: 0px 0;
        margin-top:2px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;" name="search" id="search"  placeholder="Search Events" />
                </div>
                </div>
                @if(Auth::user()->hasRole(4))
                @else
                <div class="row">

                <div class="col-md-9"></div>

                <div class="col-md-3 pull-right" style="margin-top:5px;">
                    <a href="/event-list/excel"> <img src="{{asset('assets/images/excel.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                    </a>
                    <a href="/event-list/export" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                    </a>
                    <a id="btn" style="cursor:pointer;margin-right:5px;float: right;"><img src="{{asset('assets/images/print.png')}}" class="img-responsive" />
                    </a>
                </div>

            </div>
            @endif
            <div class="panel-body table-responsive">
    <div class="row" >
<table class="table table-striped table-bordered table-hover showallEvents text-uppercase">

    <thead class="thead-Dark">
        <tr>
            <th class="sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer"><span style="float: left;" id="name_icon"><i class="fas fa-arrows-alt-v"></i></span>EventName</th>
            <th class="sorting" data-sorting_type="asc" data-column_name="league_id" style="cursor: pointer"><span style="float: left;" id="league_id_icon"><i class="fas fa-arrows-alt-v"></i></span>League</th>
            <th>Venue</th>
            <th>Event Organizer</th>
            <th>Gender</th>
            <th>Age Group</th>
            <th>Date</th>
            @if (Auth::user()->hasAnyPermission(['editevent','deleteevent']))
            <th>Actions</th>
            @endif
            <th>Rules</th>

        </tr>
    </thead>
    <tbody id="showEvents">
                @include('admin.events.EventLists')
                </tbody>
</table>
<input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
</div>
            </div>

        </div>
      
        <div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="rules" role="dialog" aria-labelledby="modalLabelfade" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title" id="modalLabelfade">Rules</h4>
                    </div>
                    <div class="modal-body">
                        <p id="suvarna" name="rules"><br></p>

                    </div>
                    <div class="modal-footer">
                        <button class="btn  btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</section>
<div style="display:none;">
    @include('admin.events.printEventLists')
</div>
@stop

@section('footer_scripts')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  --}}
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).on('click', '.show', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        // alert(id);
        $.ajax({
            type: "GET",
            url: "/event/genders/rules/" + id,
            data: {
                "id": id,
            },

            success: function(response) {
                // alert(response.event.rules);
                $('#suvarna').html(response.event.rules);


            }
        });
    });
    $("#btn").click(function() {
        $("#eventLists").print();
    });
    function clear_icon(){
            $('#name_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#league_id_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
          
        }
        function fetch_events_data(order_type,column_name,query) {
        $.ajax({
            url: "/event-list/search",
            method: 'GET',
            data: {
                'query': query,
                'ordertype':order_type,
                'columnname':column_name,
            },
            dataType: 'json',
            success: function(response) {
                $('#showEvents').html(response['html'])
                $('#eventLists').html(response['html2'])

            }
        })
    }
        $(document).on('click', '.sorting', function () {
            $('.sorting.active').removeClass('active');
            $(this).addClass("active");  

            var column_name=$(this).data('column_name');
            var order_type=$(this).data('sorting_type');
            var reverse_order='';
            if (order_type=='asc') {
                $(this).data('sorting_type','desc');
                reverse_order='desc';
                clear_icon();
                    $('#'+column_name+'_icon').html('<span><i class="fas fa-angle-up"></i></span>');

            }
            if (order_type=='desc') {
                $(this).data('sorting_type','asc');
                reverse_order='asc';
                clear_icon();
             
                    $('#'+column_name+'_icon').html('<span><i class="fas fa-angle-down"></i></span>');
              
            }
           
                var query=$('#search').val();
                // alert(query);
                fetch_events_data(order_type,column_name,query);

        });
        $(document).on('keyup', '#search', function() {
        var query= $(this).val();

        var column_name=$('.sorting.active').data('column_name');
            var type=$('.sorting.active').data('sorting_type');
            if(type=="asc"){
                var sort_type="desc";
            }else{
                var sort_type="asc";
            }
      
        fetch_events_data(sort_type,column_name,query);
            });

   

   
  

    $('#table2').on('click', '.deleteEvent', function() {
        var id = $(this).attr("data-id")
        $('#deleted_id').val(id);

    });

    $(document).on('click', '.yes', function(e) {
        e.preventDefault();
        var id = $('#deleted_id').val();
        var method = $('#_method').val();
    });

   

    
</script>
{{-- page level scripts --}}



{{-- event delete  --}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"> Delete Event</h4>
            </div>
            <input type="hidden" id="deleted_id">
            <input name="_method" type="hidden" value="PUT">

            <div class="modal-body">
                Are you sure you want to delete this event?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-danger yes" value='Yes' />
            </div>
        </div>
    </div>
</div>
@stop