@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Club Settings
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />
@stop
{{-- Page content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>{{ __('sidebar.clubs') }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="material-icons breadmaterial">home</i>
                Clubs
            </a>
        </li>
        <li class="active"> <a href="/club/settings">
                <i class="material-icons breadmaterial">spa</i>
                Settings
            </a></li>

    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="material-icons  6:34 PM 9/24/2021">settings</i>
                      {{__('sidebar.general') }}

                        <a style="float:right" href="/club/show"><i class="material-icons  leftsize">keyboard_backspace
                            </i>
                            {{ __('staffs.back') }}</a>


                    </h4>

                </div>
                <div class="tab-content mar-top">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-heading">

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <div class="panel-body">
                                <div class="col-md-5">
                                    <form id="example-form" method="post" enctype="multipart/form-data" action="/club/settings/{{$club}}">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="id" name="club" value="{{$club}}">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 250px; height: 50px;">
                                                    <?php
                                                    $org = App\Models\Club::find($club);
                                                    ?>
                                                    @if($org->club_logo)
                                                    <img src="/club/{{ Auth::user()->club->club_logo }}" style="width:300px;height:100px;" alt="">
                                                    @else


                                                    <img src="{{asset('assets/img/web logo copy black bg small.png')}}" alt="Tamil Sangam Association" class="img-responsive" />
                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="width:300px;height:100px;"></div>
                                                <div>
                                                    <span class="btn btn-primary btn-file">
                                                        <span class="fileinput-new" style="text-transform:none;font-size:15px;">{{ __('club.club_logo') }} <span style="text-transform:none;font-size:10px;">(250px * 50px)</span></span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="club_logo" class="image">
                                                    </span>
                                                    <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>

                                        </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <h4>{{ __('club.change_club_admin') }}</h4>
                                            <div class="form-group">
                                                <select id="disabledSelect" name="admin" class="form-control admin">
                                                    <option disabled selected>Select Admin*</option>
                                                    @foreach($admins as $admin)
                                                    <option value="{{$admin->id}}">{{$admin->first_name}}</option>
                                                    @endforeach
                                                </select>


                                            </div>


                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <button type="submit" style="float:right;text-transform:none" class="btn btn-primary">{{ __('settings.change') }}</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script>
    $(document).on('click', '#example-form', function {
        var formData = new FormData($(this)[0]);
        var id = $(this).val();
        var data = $('.admin').val();
        var image = $('.image').val();
        $('#deleted_id').val(id);
        $('#data').val(data);
        $('#image').val(formData);



        $('#myModalDelete').modal('show');

    });

    $(document).on('click', '.yes', function(e) {
        e.preventDefault();
        var id = $('#deleted_id').val();
        var data = $('#data').val();
        var image = $('#image').val();


        $.ajax({
            type: "post",
            url: "/organizations/ownership/" + id,
            dataType: "json",
            data: {
                'id': id,
                'data': data,
                'image': image
            },
            success: function(response) {
                $('#myModalDelete').modal('hide');
                window.location.reload();
                // fetchroles();
            }
        });

    });
</script>
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"> Change Ownership</h4>
            </div>
            <input type="hidden" id="deleted_id">
            <input type="hidden" id="data">
            <input type="hidden" id="image">

            <div class="modal-body">
                Are you sure you want to change ownership?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-danger yes" value='Change' />
            </div>
        </div>
    </div>
</div>
@stop