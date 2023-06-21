@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
Send Notification
@parent
@stop

    {{-- page level styles --}}
    @section('header_styles')
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />

    @stop
        {{-- Page content --}}
        @section('content2')
        <section class="content-header">

            <!--section starts-->
            <h1>Add Notifications</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/admin/">
                        <i class="material-icons breadmaterial">home</i>
                        Dashboard
                    </a>
                </li>
                <li class="active">Notifications</li>


            </ol>
        </section>
        <section class="content paddingleft_right15">
            <div class="row">
                <div class="panel panel-primary ">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="bi bi-chat-square"></i>
                            Add Notification
                            <div style="float:right">
                                <a href="" style="color:white">
                                    <i class="material-icons">keyboard_arrow_left</i>
        
                                    <a href="/msg-show" style="color:white">
                                        Back</a>
                                    </div>
                        </h4>

                        </h4>

                    </div>

                    <div class="panel-body">
                        <!-- <div class="col-md-0"></div> -->
                        <!-- <div class="col-md-5"> -->
                        <div class="col-md-12">

                            <div class="form-group label-floating">
                                <form method="post" action="/msg">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="form-group">
                                        <label for="content">TITLE</label>

                                        <input type="text" class="form-control" name="content_title"
                                            aria-describedby="Title"  placeholder="Title Here" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="Content">INFORMATION</label>
                                        <textarea type="text" class="form-control" name="content" rows="3"
                                            placeholder="Your Informations Here" require></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="user-goup">USER GROUP</label>
                                    </div>
                                    <input type="checkbox" id="checkAll" class="css-checkbox" name="selectAll"/>
                                    Select All<br>
                                    @foreach($roles as $role)
                                        <div class="form-check">
                                            <input type="checkbox" id="selectAll" class="form-check-input" name="role_id[]"
                                                value="{{ $role->id }}">
                                            <label class="form-check-label" for="user_group">{{ $role->name }}</label>
                                        </div> @endforeach
                                        <button type="submit" value="submit" class="btn btn-primary"
                                            style="float: right;">Send</button>
                                </form>
                                <!-- </div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        @endsection
        {{-- page level scripts --}}
@section('footer_scripts')
<script>
$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
@endsection