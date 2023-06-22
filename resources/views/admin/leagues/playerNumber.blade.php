@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Players
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
<link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />

@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>{{ __('sidebar.participants') }} </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="/events"> Events</a></li>
        <li class="active">Participants</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    {{ __('sidebar.participants') }}                
                </h4>

            </div>
            <br />
            <div class="row">
                <div class="col-md-3">
               <select id="select21" class="form-control multiselect season" placeholder="Select Season">
                    <option disabled selected>Select League</option>
                    <option data-name=" " value="whole">all</option>
                    @foreach($fuleagues as $fuleague)
                    <option value={{ $fuleague->id }} data-name={{ $fuleague->name }}>{{ $fuleague->name }}</option>
                    @endforeach
                </select>
              
                </div>
                <div class="col-md-4">
                <select id="select24" data-name="league" class="form-control select2" placeholder="Select5"></select>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-2 export-button" style="display:flex; justify-content:flex-end;">

                    <a href="/league/participants/export" target="_blank" title="Print Participant Number" class="btn btn-success"> 
                    <img style="margin-top:0px" src="{{ asset('assets/images/icons/pdf.png') }}"> &nbsp;{{ __('event.export_no') }}
                    </a>
                </div>
            </div>
     
            <div class="row">
                <div class="col-md-1 pull-right"
                    style="margin-top: 35px; display:flex; justify-content:flex-end;">
                    <a id="printBtn" style="cursor:pointer;margin-right:5px;"><img
                            src="{{ asset('assets/images/print.png') }}">
                    </a>
                    <a href="/league/participants/pdf" style="margin-right:5px;" target="_blank"> <img
                            src="{{ asset('assets/images/pdf.png') }}">
                    </a>

                    <a href="/league/participants/excel" style="margin-right:5px;"> <img
                            src="{{ asset('assets/images/excel.png') }}">
                    </a>
                </div>
            </div>
            <?php $value = Session::get('dataId'); ?>

                <div class=" panel-body table-responsive">
                    <table class="col-md-6 table table-striped table-hover table-bordered" >
                        <thead class="" style="background-color: #515763;color:white;text-transform:uppercase;">
                            <tr>
                                <th class="sorting" data-sorting_type="asc" data-column_name="number" style="cursor: pointer"><span style="float: left;" id="number_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('event.participant_number') }}</th>
                                <th>{{ __('event.participant_name') }}</th>
                                <th>{{$value?$value:'Organization/Club' }}</th>
                            </tr>
                        </thead>
                        <tbody id="playerNumber">
                @include('admin.leagues.filterPlayerNumberData')
                        </tbody>
                    </table>


            </div>
        </div>

    </div>

</section>
<div style="display:none">
    @include('admin.leagues.printPlayerNumber')
</div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>

    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script>
     function clear_icon(){
            $('#number_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
           
          
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
   
    $.ajax({
            type: 'GET',
            url: '/league/participants/sortBy',
            data: {
                
                "order_type":order_type,
                "column_name":column_name,

            },
            success: function(response) {
                $('#playerNumber').html(response['html'])
                $('#printPlayerNumber').html(response['html2'])
                $('#excelPlayerNumber').html(response['html3'])
               
            }
        });

});
    $(document).ready(function() {
      
        $("#printBtn").click(function() {
        $("#printPlayerNumber").print();
    });
    $("#select21").on('change', function() {
                var data = $("#select21 option:selected").attr('data-name');
                // alert(dataId);
                var leagueID = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '/dependentDrop/'+leagueID,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "leagueID": leagueID,
                        "data": data
                    },
                    success: function(response) {
                $('#select24').empty();
                 $('#select24').append(
                     "<option SELECTED  value='" + 0 + "'>Select Organization Or Club</option>",
                     "<option data-name='Club/Organization' value='"+'all'+ "'> All </option>",
                     "<option data-name='without-Membership' value='" + 'Duplicate' + "'> without Membership</option>"
                     );
                     console.log(response.organization);

                 $.each(response.organization, function(key, value) {                   
                     $('#select24').append("<option  data-name='organization' value='" + value.id + "'>" + value.name+ "</option>");
                 });
                 $.each(response.clubs, function(key, item) {

                $('#select24').append("<option data-name='club' value='"+item.id + "'>" + item.club_name + "</option>");
                });
                $('#playerNumber').html(response['html'])
                $('#printPlayerNumber').html(response['html2'])
                $('#excelPlayerNumber').html(response['html3']) 
            
             
         }
     });
     });
     $("#select24").on('change', function() {
        var dataId = $("#select24 option:selected").attr('data-name');
        var Query = $(this).val();
        var sortingType=$('.sorting.active').data('sorting_type');
        var columnName=$('.sorting.active').data('column_name');
        $.ajax({
            type: 'POST',
            url: '/league/participants/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "Query": Query,
                "dataId": dataId,
                "sortingType":sortingType,
                "columnName":columnName


            },
            success: function(response) {
                $('#playerNumber').html(response['html'])
                $('#printPlayerNumber').html(response['html2'])
                $('#excelPlayerNumber').html(response['html3'])

            }
        });
    });
  
    });
          

</script>
@stop