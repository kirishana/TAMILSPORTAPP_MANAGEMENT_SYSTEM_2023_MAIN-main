<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>404 page | Welcome to Josh Frontend</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- global level css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- end of globallevel css-->
    <!-- page level styles-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/404.css') }}" />
    <!-- end of page level styles-->
</head>

<body>

    <div id="animate" class="row">
        <div class="number">40</div>
        <div class="icon"> <i class="fa fa-fron-o"></i>
        </div>
        <div class="number">4</div>
    </div>
    <div class="hgroup">
        <h1>Page Not Found</h1>
        <h2>It seems that page you are looking for no longer exists.</h2>
        <a href="{{ route('home') }}">
            <button type="button" class="btn btn-primary button-alignment">Home</button>
        </a>
    </div>
    <!-- global js -->
    <script type="text/javascript" src="{{ asset('assets/js/frontend/lib.js') }}"></script>

    <!-- begining of page level js-->
    <script src="{{ asset('assets/js/frontend/404.js') }}"></script>
    <!-- end of page level js-->
</body>
</html>