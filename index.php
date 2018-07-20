<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App title -->
        <title>Login</title>

        <!-- Bootstrap CSS -->
        <link href="./src/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="./src/assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- Modernizr js -->
        <script src="./src/assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">

        	<div class="account-bg">
                <div class="card-box mb-0">
                    <div class="m-t-10 p-20">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h4 class="text-muted text-uppercase m-b-0 m-t-0">Sign In</h4>
                            </div>
                        </div>
                        <form name="sing-in" class="m-t-20" action="index.html" data-parsley-validate>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="text" name="username" placeholder="Username" class="form-control" parsley-trigger="change" required/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="password" name="password" placeholder="Password" class="form-control" parsley-trigger="change" required/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="checkbox checkbox-custom">
                                        <input id="checkbox-signup" type="checkbox">
                                        <label for="checkbox-signup">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-10">
                                <div class="col-12">
                                    <button id="send" class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                        </form>
                        <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>

                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>

        <script>var resizefunc = [];</script>

        <!-- jQuery  -->
        <script src="./src/assets/js/jquery.min.js"></script>
        <script src="./src/assets/js/popper.min.js"></script>  
        <script src="./src/assets/js/bootstrap.min.js"></script>
        <script src="./src/assets/js/detect.js"></script>
        <script src="./src/assets/js/waves.js"></script>
        <script src="./src/assets/js/jquery.nicescroll.js"></script>
        <script src="./src/assets/plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="./src/assets/js/jquery.core.js"></script>
        <script src="./src/assets/js/jquery.app.js"></script>
        <script src="./src/scripts/sing_in.js"></script>

    </body>
</html>