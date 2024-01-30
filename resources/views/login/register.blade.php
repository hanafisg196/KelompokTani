<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kelompok Tani</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
    <meta name="keywords" content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes">
    <!-- Favicon icon -->
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="/assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="/assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery.mCustomScrollbar.css">
    <!-- trix editor -->
</head>

<body class="fix-menu">
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <style>
        @media (min-width: 1200px) {
            .custom-margin {
                margin-left: 50%;
            }
        }
    </style>
    <!-- Pre-loader end -->
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div style="left: 45%; width: 60%;" class="background-overlay"></div>
        <div class="container-fluid custom-margin">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" method="POST" action="/register">
                            @csrf
                            <div class="text-center">
                                <img src="/assets/images/logo.png" alt="logo.png">
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Sign Up</h3>
                                    </div>
                                </div>
                                <hr/>
                                <p style="margin-bottom: 5px" class="text-inverse text-left">Nama Lengkap</p>
                                <div class="input-group">
                                    <input type="text" name="name"
                                     class="form-control  @error('name') is-invalid @enderror"
                                     placeholder="Masukkan nama lengkap"
                                     value="{{ old('name') }}" required>

                                     @error('name')
                                     <div class="invalid-feedback">
                                         {{ $message }}
                                     </div>
                                    @enderror
                                    <span class="md-line"></span>
                                </div>
                                <p style="margin-bottom: 5px" class="text-inverse text-left">Email</p>
                                <div class="input-group">
                                    <input type="email" name="email"
                                     class="form-control
                                     @error('email') is-invalid @enderror"
                                      placeholder="Masukkan email"
                                      value="{{ old('email') }}" required>
                                      @error('email')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                                    <span class="md-line"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="margin-bottom: 5px" class="text-inverse text-left">Password</p>
                                        <div class="input-group">
                                            <input type="password"
                                            name="password"
                                            class="form-control
                                            @error('password') is-invalid @enderror"
                                             placeholder="Masukkan password" required>

                                            <span class="md-line"></span>
                                            @error('password')
                                             <div class="invalid-feedback">
                                                 {{ $message }}
                                             </div>
                                               @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="margin-bottom: 5px"
                                        class="text-inverse text-left">Ulangi Password</p>
                                        <div class="input-group">
                                            <input type="password"
                                            name="password_confirmation"
                                            class="form-control
                                            @error('password_confirmation') is-invalid @enderror"
                                             placeholder="Masukkan password kembali" required>
                                             @error('password_confirmation')
                                             <div class="invalid-feedback">
                                                 {{ $message }}
                                             </div>
                                             @enderror
                                            <span class="md-line"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit"
                                        class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                        Sign up now.</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10 text-left">
                                        <p class="text-inverse text-left m-b-0">Sudah memiliki akun?</p>
                                        <a href="/login">Kembali kehalaman Login!</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="/assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="/assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="/assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="/assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="/assets/js/common-pages.js"></script>
</body>

</html>
