<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>500 Internal Error | Welcome to Josh Frontend</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- global level js -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lib.css') }}">
    <!-- end of global js-->
    <!-- page level styles-->
    <link href="{{ asset('assets/css/frontend/500.css') }}" rel="stylesheet" type="text/css" />
    <!-- end of page level styles-->
</head>
<body>
    <div class="container-fluid">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-offset-1 col-xs-10 middle">
            <div class="error-container">
                <div class="error-main">
                    <h1> <i class="material-icons yellow" style="font-size: 90px;">warning</i>
                        500
                    </h1>
                    <h3>
                        Thats an error.
                        <br>There was an error. Please Try again later. Thats all we know
                    </h3>
                        <a href="{{ route('home') }}" class="btn btn-responsive button-alignment btn-primary">Home</a>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script type="text/javascript" src="{{ asset('assets/js/frontend/lib.js') }}"></script>
    <!-- end of global js -->
    <!-- begining of page level js-->
    <!--<script>-->
    <!--$("document").ready(function() {-->
        <!--setTimeout(function() {-->
            <!--$(".livicon").trigger('click');-->
        <!--}, 10);-->
    <!--});-->
    <!--// code for aligning center-->
    <!--$(document).ready(function() {-->
        <!--var x = $(window).height();-->
        <!--var y = $(".middle").height();-->
        <!--//alert(x);-->
        <!--x = x - y;-->
        <!--x = x / 2;-->
        <!--$(".middle").css("padding-top", x);-->
    <!--});-->
    <!--</script>-->
    <!-- end of page level js-->
</body>
</html>