<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>OMSPS | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{asset('asset/fonts/linearicons/style.css')}}">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{asset('asset/font-awesome/css/font-awesome.min')}}">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">

    <style>
        #error{
            color: red;
            font-weight: bold;
            font-style: italic;
            margin-left: 13%;
        }
    </style>

</head>

<body>
<div class="wrapper">
    <div class="inner">

        <form action="{{url('login')}}" method="post">
            @csrf
            <img src="{{asset('asset/images/omsps.png')}}" alt="" class="csms"><br><br><br>
            <h3>LOGIN FORM</h3>
            <div class="form-holder">
                <span class="lnr lnr-user"></span>
                <input type="email" class="form-control" placeholder="Username" name="email" required>
            </div>
            <div class="form-holder">
                <span class="lnr lnr-lock"></span>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <button>
                <span>Log In</span>
            </button>
            <span id="error">{{$errorMsg}}</span>
        </form>
    </div>

</div>

<script src="{{asset('asset/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('asset/js/main.js')}}"></script>
</body>
</html>
