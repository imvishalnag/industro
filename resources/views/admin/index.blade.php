
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Industro - Admin Panel</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
        <style>.card {border-radius: 30px;border-color: #b5a9a9;box-shadow: 0 0 9px 1px #fff;border-width: 2px;}</style>
    </head>


    <body>

        <!-- Begin page -->
        <div class="accountbg" style="background: #00263e;"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success" >{{ Session::get('message') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger" >{{ Session::get('error') }}</div>
                    @endif
                    <div class="text-center mt-0 m-b-15">
                        <a href="{{route('admin.login_form')}}" class="logo logo-admin">
                            <h2 style="line-height: 1;font-weight: 700;">Industro</h2>
                            <p style="line-height: 1;font-size: 18px;">Industro Admin Panel</p>
                        </a>
                    </div>

                    <h4 class="text-muted text-center font-18"><b>SIGN IN</b></h4>

                    <div class="p-3">
                        {{ Form::open(array('url' => 'login', 'method' => 'post')) }}
                       
                        
                        <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="email"  name="email" placeholder="Email">
                                    @if ($message = Session::get('login_error'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @error('email')
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password"  name="password" placeholder="Password">
                                    @error('password')
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            
                        {{ Form::close() }}
                    </div>

                </div>
            </div>
        </div>

       

        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/tether.min.js') }}"></script><!-- Tether for Bootstrap -->
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('assets/js/detect.js') }}"></script>
        <script src="{{ asset('assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

    </body>

</html>