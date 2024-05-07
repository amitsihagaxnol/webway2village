<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ siteName() }} | Log in</title>
    <link rel="shortcut icon" href={!! getFavicon() !!}>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('public/backend/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awsome 4.7 -->
    <link rel="stylesheet" href="{{ asset('public/backend/font-awesome/css/font-awesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/backend/dist/css/AdminLTE.min.css') }}">
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        h1,.signin-btn{
            font-family: "Roboto", sans-serif;
        }
        
    </style>
</head>
<body class="hold-transition login-page" style="height:100vh; display:flex; flex-direction:column; justify-content:center; align-items:center; background:#7cb342;">
    <div class="">
        @if (Session::has('message'))
            <div class="alert {{ Session::get('alert-class') }} text-center mb-0" role="alert">
            {{ Session::get('message') }}
            <a href="javaScript:void(0);" class="pull-right" data-dismiss="alert" aria-label="Close">&times;</a>
            </div>
        @endif
    </div>
    <div class="login-box d-flex justify-content-center align-items-center " style="width:500px;  border: 6px solid #fff;padding: 12px;border-radius: 40px;">
        <!--<div class="login-logo">-->
        <!--    <a href="{{ url('/') }}" class="text-decoration-none fw-bolder"><strong>{{ siteName() }}</strong></a>-->
        <!--</div>-->
        <div class="login-box-body w-100 px-5 py-4" style="border-radius:30px">
            <!--<p class="login-box-msg">LOGIN TO <span class="loginto"><strong>{{ siteName() }}</strong></span></p>-->
            <h1 class="mb-5 text-center " style="font-weight:900; color:#404040;" >Log In</h1>

            <form action="{{ url('admin/authenticate') }}" method="post" id="admin_login">
            {{ csrf_field() }}

                <div class="form-group has-feedback  mt-4">
                    <!--<label class="fw-bold" for="username">Email</label>-->

                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter User Email " required style="height:50px; border-radius:15px;">
                    </div>
                    @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                
                
                <div class="form-group has-feedback mt-4">
                    <!--<label class="fw-bold" for="password">Password</label>-->
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required style="height:50px; border-radius:15px;">
                    </div>
                    @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                    
                </div>

                @if (str_contains(settings('recaptcha_preference'), 'admin_login'))
                    <div class="g-recaptcha mt-4" data-sitekey="{{ settings('recaptcha_key') }}"></div>
                    @if ($errors->has('g-recaptcha-response'))
                            <p class="text-danger">{{ $errors->first('g-recaptcha-response') }}</p>
                    @endif
                    
                @endif
                
                <div class="row mt-5">
                    <!--<div class="col-xs-8">-->
                    <!--    <div class="checkbox icheck">-->
                    <!--        <label></label>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-xs-4 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-lg  btn-block signin-btn " style="border-radius:25px;width:100%; background-color:#7cb342; color:#fff;">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script src="{{ asset('public/js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>

