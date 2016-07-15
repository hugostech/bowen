<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="{{url('/bower_components',['bootstrap','dist','css','bootstrap.min.css'])}}">
    <script src="{{url('/bower_components',['jquery','dist','jquery.min.js'])}}"></script>
    <script src="{{url('/bower_components',['bootstrap','dist','js','bootstrap.min.js'])}}"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
        <div class="col-md-2"></div>

    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="col-md-2 col-md-offset-2 text-right">
        <ul class="list-group">
            <a href="{{url('management')}}"><li class="list-group-item text-left" id="Booking_List">
                <span class="badge">14</span>
                Order
            </li></a>
            <a href="{{url('clientmanage')}}"><li class="list-group-item text-left" id="Client_List">
                <span class="badge">14</span>
                Client
            </li></a>
        </ul>
    </div>
    <div class="col-md-6">


        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" id="content_title">@yield('title')</h3>
            </div>
            <div class="panel-body">
                @yield('content')
            </div>
        </div>



    </div>
</div>
<script>
    $(document).ready(function(){
        var content = $("#content_title").text();
        $("#"+content).addClass('active');
    });
</script>
</body>
</html>