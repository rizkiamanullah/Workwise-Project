<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Workwise -- Selamat Datang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="{{url('css/animate.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{url('css/line-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/line-awesome-font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('lib/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/responsive.css')}}">
    <link rel="icon" type="image/x-icon" href="{{url('images/wd-logo.png')}}" type="image/x-icon">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body class="sign-in">
    <div class="wrapper">
        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo">
                                    <img src="images/cm-logo.png" alt="">
                                </div>
                                <!--cm-logo end-->
                                <img src="images/cm-main-img.png" alt="">
                            </div>
                            <!--cmp-info end-->
                        </div>

                        <div class="col-lg-6">
                            <div class="login-sec">
                                <ul class="sign-control">
                                    <li data-tab="tab-1" class="current"><a href="#" title="">Masuk</a></li>
                                    <li data-tab="tab-2"><a href="#" title="">Daftar</a></li>
                                </ul>

                                <!-- tab 1 -->
                                <div class="sign_in_sec current" id="tab-1">
                                    <h3>Selamat Datang!</h3>
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        {{ $errors->first() }}
                                    </div>
                                    @endif
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form action="/index" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" style="font-weight: bold; padding-bottom: 0px;">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan email">
                                                    @error('email')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="" style="font-weight: bold; padding-bottom: 0px;">Kata Sandi</label>
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                                                    @error('password')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">Masuk</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--login-resources end-->

                                <!-- tab 2 -->
                                <div class="sign_in_sec" id="tab-2">
                                    <div class="dff-tab current" id="tab-3">
                                        <h3>Daftar</h3>
                                        <label for="" style="color: red; font-style:italic">* required </label>
                                        <form action="/store" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="" style="font-weight: bold; padding-bottom: 0px;">Nama Anda<span style="color: red">*</span></label>
                                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama">
                                                        @error('nama')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" style="font-weight: bold; padding-bottom: 0px;">Email<span style="color: red">*</span></label>
                                                        <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan email">
                                                        @error('email')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" style="font-weight: bold; padding-bottom: 0px;">Kata Sandi<span style="color: red">*</span></label>
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                                                        @error('password')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" style="font-weight: bold; padding-bottom: 0px;">Konfirmasi Kata Sandi<span style="color: red">*</span></label>
                                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Tulis ulang password">
                                                        @error('confirmasi_password')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" style="font-weight: bold; padding-bottom: 0px;">Foto Profil<span style="color: red">*</span></label>
                                                        <input type="file" class="form-control" name="foto" id="foto" placeholder="Masukkan foto">
                                                        @error('gambar')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Daftar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--login-sec end-->
                        </div>
                    </div>
                </div>
                <!--signin-pop end-->
            </div>
            <!--signin-popup end-->
            <div class="footy-sec">
                <div class="container">
                    {{-- <ul>
                        <li><a href="#" title="">Help Center</a></li>
                        <li><a href="#" title="">Privacy Policy</a></li>
                        <li><a href="#" title="">Community Guidelines</a></li>
                        <li><a href="#" title="">Cookies Policy</a></li>
                        <li><a href="#" title="">Career</a></li>
                        <li><a href="#" title="">Forum</a></li>
                        <li><a href="#" title="">Language</a></li>
                        <li><a href="#" title="">Copyright Policy</a></li>
                    </ul> --}}
                    <p><img src="images/copy-icon.png" alt="">Copyright 2018</p>
                </div>
            </div>
            <!--footy-sec end-->
        </div>
        <!--sign-in-page end-->
    </div>
    <!--theme-layout end-->
    <script type="text/javascript" src="{{url('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/popper.js')}}"></script>
    {{-- <script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script> --}}
    <script type="text/javascript" src="{{url('lib/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/script.js')}}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>