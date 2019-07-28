<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        body {
            background: #EDF1F2;
        }
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .container-fluid.lf {
            height: 100%;
            display: table;
            width: 100%;
            padding: 0;
        }
        .container-fluid.lf .row-fluid {
            height: 100%;
            display: table-cell;
            vertical-align: middle;
        }
        .container-fluid.lf .centering {
            float: none;
            margin: 0 auto;
            width: 300px;
        }
        .container-fluid.lf .centering .row {
            -webkit-border-radius: 5px 5px 5px 5px;
            -moz-border-radius: 5px 5px 5px 5px;
            -ms-border-radius: 5px 5px 5px 5px;
            -o-border-radius: 5px 5px 5px 5px;
            border-radius: 5px 5px 5px 5px;
            -webkit-box-shadow: 0px 0px 6px 2px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0px 0px 6px 2px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 0px 6px 2px rgba(0, 0, 0, 0.05);
        }
        .container-fluid.lf .centering .lfhead,
        .container-fluid.lf .centering .lfbody,
        .container-fluid.lf .centering .lffooter {
            border: 1px solid #c3d5d9;
            background-color: #fefefe;
            min-height: 20px;
        }
        .container-fluid.lf .centering .lfhead {
            border-bottom: 0;
            -webkit-border-radius: 5px 5px 0 0;
            -moz-border-radius: 5px 5px 0 0;
            -ms-border-radius: 5px 5px 0 0;
            -o-border-radius: 5px 5px 0 0;
            border-radius: 5px 5px 0 0;
        }
        .container-fluid.lf .centering .lfbody {
            border-top: 0;
            border-bottom: 0;
        }
        .container-fluid.lf .centering .lfbody .input-group-addon {
            color: #8f8f8f;
        }
        .container-fluid.lf .centering .lfbody .form-control:focus {
            -webkit-box-shadow: 0px 0px 6px 2px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0px 0px 6px 2px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 0px 6px 2px rgba(0, 0, 0, 0.05);
            border-color: #76ccea;
        }
        .container-fluid.lf .centering .lffooter {
            background-color: #f0f5f8;
            -webkit-border-radius: 0 0 5px 5px;
            -moz-border-radius: 0 0 5px 5px;
            -ms-border-radius: 0 0 5px 5px;
            -o-border-radius: 0 0 5px 5px;
            border-radius: 0 0 5px 5px;
            padding-top: 16px;
        }
        .container-fluid.lf .centering .lffooter .text-left {
            padding-top: 8px;
        }
        .container-fluid.lf .centering .lffooter label {
            font-weight: normal;
            color: #8f8f8f;
        }
        .container-fluid.lf .centering .lffooter input[type='button'],
        .container-fluid.lf .centering .lffooter input[type='reset'],
        .container-fluid.lf .centering .lffooter input[type='submit'] {
            -webkit-border-radius: 18px 18px 18px 18px;
            -moz-border-radius: 18px 18px 18px 18px;
            -ms-border-radius: 18px 18px 18px 18px;
            -o-border-radius: 18px 18px 18px 18px;
            border-radius: 18px 18px 18px 18px;
            border-color: #76ccea;
            background-color: #badff2;
            background: -webkit-gradient(linear, left top, left bottom, from(#badff2), to(#76ccea));
            background: -webkit-linear-gradient(top, #badff2, #76ccea);
            background: -moz-linear-gradient(top, #badff2, #76ccea);
            background: -ms-linear-gradient(top, #badff2, #76ccea);
            background: -o-linear-gradient(top, #badff2, #76ccea);
            font-weight: bold;
            -webkit-box-shadow: 0px 1px 2px 1px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0px 1px 2px 1px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 1px 2px 1px rgba(0, 0, 0, 0.1);
            text-shadow: 1px 1px #76ccea;
        }
        .container-fluid.lf .centering .lffooter input[type='button']:hover,
        .container-fluid.lf .centering .lffooter input[type='reset']:hover,
        .container-fluid.lf .centering .lffooter input[type='submit']:hover {
            background-color: #76ccea;
            background: -webkit-gradient(linear, left top, left bottom, from(#76ccea), to(#badff2));
            background: -webkit-linear-gradient(top, #76ccea, #badff2);
            background: -moz-linear-gradient(top, #76ccea, #badff2);
            background: -ms-linear-gradient(top, #76ccea, #badff2);
            background: -o-linear-gradient(top, #76ccea, #badff2);
        }
    </style>
</head>
<body>

<div class="container-fluid lf">
    <div class="row-fluid">
        <div class="centering text-center">


            <div class="row">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="col-xs-12 lfhead">
                    </div>
                    <div class="col-xs-12 lfbody">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="username" type="text" class="form-control" name="username" value="" tabindex="1" placeholder="UserName">
                            </div>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" value="" tabindex="2" placeholder="Password">
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 lffooter">
                        <div class="col-xs-6">
                            <div class="form-group text-left">
                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                <label for="remember"> Remember Me</label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group text-right">
                                <input type="submit" name="login-submit" tabindex="4" class="btn btn-primary" value="Login">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>
