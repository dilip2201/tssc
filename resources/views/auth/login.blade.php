
<!DOCTYPE html>
<style type="text/css">
    .btn.btn-primary {
        background-color: #6dba23!important;
        border-color: #6fba2c!important;
    }
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #3F4254!important;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #3F4254!important;;
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: #3F4254!important;;
}
.form-control.form-control-solid{
        border-color: #d8d8d8!important;
}
</style>
<html lang="en">
    <!--begin::Head-->
    <head><base href="../../../../">
        <meta charset="utf-8" />
        <title>Login | TSSC</title>
        <meta name="description" content="Login page example" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="canonical" href="https://keenthemes.com/metronic" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="{{ URL::asset('public/assets/css/pages/login/classic/login-4.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{ URL::asset('public/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="{{ URL::asset('public/assets/media/logos/favicon.ico') }}" />
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" style="background-image: url({{ URL::asset('public/assets/media/bg/bg-10.jpg') }})" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('{{ URL::asset('public/assets/media/bg/bg-3.jpg') }}')">
                    <div class="login-form text-center p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-15">
                            <a href="#">
                                <img src="{{ URL::asset('public/assets/media/logos/logo.jpg') }}" class="max-h-75px" alt="" />
                            </a>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="login-signin">
                            <div class="mb-5">
                                <h3>TSSC Sales Dashboard</h3>
                                <div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
                            </div>
                            <form class="form" >
                                <div class="form-group mb-5">
                                    <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email"  required="" />
                                    @error('email')
                                    <span style="    width: 100%;    text-align: left;    float: left;    margin-top: 5px;    margin-bottom: 5px;    color: #6dba23;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group mb-5">
                                    <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" />
                                    @error('password')
                                        <span style="    width: 100%;    text-align: left;    float: left;    margin-top: 5px;    margin-bottom: 5px;    color: #6dba23;" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               
                                <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold " style="float: right;">Login</button>
                            </form>
                           
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->
        
    </body>
    <!--end::Body-->
</html>