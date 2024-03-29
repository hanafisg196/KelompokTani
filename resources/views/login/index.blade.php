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
    <meta
    name="description"
    content="Gradient Able Bootstrap admin template ." />
    <meta
    name="keywords"
    content="free dashboard template" />
    <meta name="author" content="codedthemes">

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="fix-menu">
        <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <style>
        @media (min-width: 1200px) {
            .custom-margin {
                margin-left: 65%;

            }


        }
    </style>
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <div class="background-overlay"></div>
        <!-- Container-fluid starts -->
        <div class="container-fluid custom-margin">
            <div class="row">
                <div class="col-sm-12">
                    @if(session()->has('error'))
                    <div class="row">
                        <div class="alert alert-danger col-sm-12 " role="alert">
                            {{ session('error') }}
                        </div>
                    </div>
                    @endif
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" method="POST" action="/login">
                            @csrf
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Sign In</h3>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input type="email" class="form-control"

                                    placeholder="Email" name="email" required>
                                    <span class="md-line"></span>


                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control"

                                     placeholder="Password" name="password" required>

                                    <span class="md-line"></span>

                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button
                                        type="submit"
                                        class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                            Sign in
                                        </button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10 text-left">
                                        <p class="text-inverse text-left m-b-0">Belum memiliki akun?</p>
                                        <a href="/register">Klik disini!</a>

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

        <script>
            $(document).ready(function() {
                $(".close").on("click", function() {
                    $("#myAlert").alert('close');
                });
            });
        </script>
    </section>

    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="assets/js/common-pages.js"></script>
</body>

</html>
