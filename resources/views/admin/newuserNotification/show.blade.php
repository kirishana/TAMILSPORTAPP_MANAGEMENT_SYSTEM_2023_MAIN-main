@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
View User Details
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet"/>
@stop
{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>New Payment Details</h1>
        
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
              
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">

                                           
                                        </h3>

                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-2">
                                            <div class="img-file">
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="users">

                                                        <tr>
                                                            <td>Name</td>
                                                            <td>
                                                                {{ $reg->user->first_name }}  {{ $reg->user->last_name }}
                                                            </td>

                                                        </tr>
                                                       
                                                        <tr>
                                                            <td>Email</td>
                                                            <td>
                                                                {{ $reg->user->email }}
                                                            </td>
                                                        </tr>
                                                       
                                                       
                                                        <tr>
                                                            <td>League</td>
                                                            <td>
                                                                {{ $reg->league->name }} - {{ $reg->league->to_date }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Transaction Id</td>
                                                            <td>
                                                               {{ $reg->trans_id }}
                                                            </td>
                                                        </tr>
                                                        
                                                        
                                                        <tr>
                                                            <td>Paid Amount</td>
                                                            <td>                      
                                                                 {{ $iso }} {{ $reg->totalfee }}
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td style="border:none;">&nbsp;</td>
                                                            <td>
                                                            <button class="btn btn-success approve" id="{{$reg->id}}">Approve </button>
                                                            <button class="btn btn-danger decline" id="{{$reg->id}}">Decline </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="img-file">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<script type="text/javascript">
//approve
$(document).on('click', '.approve', function() {
    
    var id = $(this).attr('id');
    $('#showModal').modal('hide');


    $.ajax({
        type : 'POST',
        url: "{{ route('payment.approve') }}",
        method:"POST", 
        data:  {        "_token": "{{ csrf_token() }}",
                'id':id},
        success:function (res) {
            Swal.fire({
                title: 'Approved',
                text: 'Approved Successfully!',
                });
                window.location=res.url;   
                     },
        error: function (response, status, error) {
            if (response.status === 422) {
               
            };
        },
    });

});


//decline


$(document).on('click', '.decline', function() {

    var remark = prompt("Please enter reason for decline");

    if(remark.trim().length != 0){

        var id = $(this).attr('id');

        $.ajax({
            type : 'POST',
            url: "{{ route('payment.decline') }}",
            method:"POST", 
            data:  {        "_token": "{{ csrf_token() }}",
                    'id':id},
            success:function (res) {
                Swal.fire({
                    title: 'Declined',
                    text: 'Declined Successfully!',
                    });
                    window.location=res.url;   
            },
            error: function (response, status, error) {
                if (response.status === 422) {
                   
                };
            },
        });
    }else{
        Swal.fire({
                    title: 'Alert',
                    text: 'Please Enter the Reason',
                    });
    }
});





</script>
            
@stop
