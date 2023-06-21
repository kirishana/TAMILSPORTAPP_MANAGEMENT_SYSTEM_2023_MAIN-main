<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('assets/css/app_auth.css') }}" rel="stylesheet" type="text/css" />
    <!-- end of global level css -->
</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-11 col-lg-offset-1">
                <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-8 col-lg-offset-2">
                    <div id="container_demo">
                        <a class="hiddenanchor" id="toclub_register"></a>
                        <div id="wrapper">
                            <div id="login" class="animate form">
                                <form action="/club_register/store" id="register_here" autocomplete="on" method="POST" role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                    <h3>

                                        <img src="{{ asset('assets/img/web logo copy white bg.png') }}" alt="..." style="width:400px;height:100px;" alt="josh logo">
                                        <br>
                                    </h3>
                                    <div class="panel panel">
                                        <div class="panel-heading" style="background-color: #D7DBDD;">
                                            <center>Club Registration</center>
                                        </div>
                                        <!-- <div class="panel-body" style="background-color: #D7DBDD;">Panel Content</div>  -->
                                    </div>



                                    <!-- ----------------------------------------------------- -->

                                    <section class="content">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('club_registation_num', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                                        <label class="control-label" for="club_registation_num">Club Register Number</label>
                                                        <input id="club_registation_num" name="club_registation_num" type="text" class="form-control" value="{!! old('club_registation_num') !!}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('club_name', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">person</i></span>
                                                        <label class="control-label" for="club_name">Club Name<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="club_name" name="club_name" required type="text" class="form-control" value="{{ old('club_name') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group {{ $errors->first('club_email', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">email</i></span>
                                                        <label class="control-label" for="club_email">E-mail<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="club_email" name="club_email" required type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        {!! $errors->first('club_email', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group{{ $errors->first('club_start_date', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">event_note</i></span>
                                                        <label class="control-label" for="postal">Club Establish Date</label>
                                                        <input id="club_start_date" name="club_start_date"  type="date" class="form-control">
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('mobile', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">phone_in_talk</i></span>
                                                        <label class="control-label" for="mobile">Mobile Number<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="mobile" name="mobile" required type="number" class="form-control" value="{!! old('mobile') !!}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('tpnumber', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">phone_in_talk</i></span>
                                                        <label class="control-label" for="tpnumber">Telephone Number</label>
                                                        <input id="tpnumber" name="tpnumber" type="number" class="form-control" value="{!! old('tpnumber') !!}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('address', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                                        <label class="control-label" for="address">Address<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="address" name="address" required type="text" class="form-control" value="{!! old('address') !!}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('city', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                                        <label class="control-label" for="city">City<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="city" name="city" required type="text" class="form-control" value="{!! old('city') !!}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('postal', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                                        <label class="control-label" for="postal">Postal Code<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="postal" name="postal" required type="text" class="form-control" value="{!! old('postal') !!}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('country', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">assistant_photo</i></span>
                                                        <select id="country" name="country" class="form-control">
                                                            <option disabled selected>Select country<span style="color:red;"> <b> * </b></span></option>
                                                            @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </section>

                                    <p class="signin button" style="padding-top: 15px;">
                                        <a href="/create/club-member" class="to_clubregister">
                                            <input type="submit" class="btn btn-raised btn-success btn-block" value="Register" />
                                        </a>
                                    </p>
                                    <p class="change_link">
                                        <a href="/login" class="to_clubregister">
                                            <button type="button" class="btn btn-raised btn-responsive botton-alignment btn-warning btn-sm">Back</button>
                                        </a>
                                    </p>

                                </form>
                                <!-- -------------------------------------------------------- -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
    <!-- Bootstrap -->
    <!-- end of global js -->
    <script>
        // $(document).ready(function($) {
        //     $("#country").on('change', function() {
        //         var country = $(this).val();
        //             $.ajax ({
        //                 type: 'POST',
        //                 url: '/countries/'+country,
        //                 data: {
        //                     "_token": "{{ csrf_token() }}",
        //                      "country":country },
        //                 success : function(response) {
        //                     $('#organization').empty(); 
        //                     $.each(response.organizations,function(key,item){ 
        //                             $('#organization').append("<option value='" + item.id +"'>" + item.name + "</option>");
        //             });                
        //         }
        //             });

        //     });
        // });
    </script>

</body>

</html>