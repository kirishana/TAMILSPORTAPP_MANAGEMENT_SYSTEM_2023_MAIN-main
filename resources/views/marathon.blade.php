@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Users List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link href="{{ asset('assets/css/tableHeader.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
<style>
    .table-responsive{
        overflow-x: visible;
    }
</style>
@stop
<!--  -->

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Marathon</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Events</a></li>
        <li class="active">Marathon</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary" style="min-height: 900px;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  ">group</i>
                    Marathon
                  
                </h4>
            </div>
            <br />
            <div class="row">
                <div class="col-md-3">
               <select id="select21" class="form-control multiselect league" placeholder="Select Season">
                    <option  selected>Select League</option>
                    @foreach($leagues as $league)
                    <option value={{ $league->id }}>{{ $league->name }}</option>
                    @endforeach
                </select>
               
              
                </div>
                <div class="col-md-9">
                </div>
             
              
            </div>

            <div class="panel-body">

       @include('marathon-include')
   

       </div>
        </div>
    </div> 
</section>
           

          
        </div>
    </div> <!-- row-->
</section>


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


<script>
        $(".league").on('change', function() {
                var league = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '/league/clubs/'+league,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
               $('.marathon').html(response['html'])
                
            
             
         }
     });
     });
    $(document).on('click', '.club', function() {
        var id = $(this).data('id');
        var league=$(this).data('league');
        var points=$(this).closest("tr").find("input[type=text]").val();
        var pointId=$(this).data('marathon');
        $.ajax({
            type: 'GET',
            url: "/club/points/" + id,
            data:{
                'points':points,
                'league':league,
                'pointId':pointId,
            },
            success:function(response) {
                $('#added'+response.id).show();
               }
        });

    }); 
</script>
@stop