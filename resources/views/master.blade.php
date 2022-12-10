<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>WorkWise Html Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="{{url('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/line-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/line-awesome-font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="icon" type="image/x-icon" href="{{url('images/wd-logo.png')}}" type="image/x-icon">
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="container">
                <div class="header-data">
                    <div class="logo">
                        <a href="index.html" title=""><img src="images/logo.png" alt=""></a>
                    </div>
                    <div class="menu-btn">
                        <a href="#" title=""><i class="fa fa-bars"></i></a>
                    </div>
                    <!--menu-btn end-->
                    <div class="user-account">
                        <div class="user-info">
                            <img src="/img/{{$user['foto']}}" alt="" style="width: 30px; height:30px;">
                            <a href="#" title="">{{$user['nama']}}</a>
                            <i class="la la-sort-down"></i>
                        </div>
                        <div class="user-account-settingss">
                            <h3 class="tc">
                                <form action="/edit" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$user['email']}}" name="email">
                                    <button href="" type="submit">Edit Profil</button></h3>
                                </form>
                            <h3 class="tc"><a href="/" title="">Logout</a></h3>
                        </div>
                        <!--user-account-settingss end-->
                    </div>
                </div>
                <!--header-data end-->
            </div>
        </header>
        <!--header end-->
        @yield('content')
    </div>
    <!--theme-layout end-->
    <script type="text/javascript" src="{{url('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/popper.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('lib/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/script.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery.mCustomScrollbar.js')}}"></script>

</body>
</html>