@extends('layouts.login_layout')

@section('content')
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box">
                <form method="post" action="{{ route('login') }}">
                @csrf
                    <div class="login-form-head">
                        <img src="{{asset('assets/images/logo_login.jpg')}}">
                    </div>
                    <div class="login-form-body">
                        <!-- Message flash -->
                        @if(session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{session()->get('error')}}
                            </div>
                        @endif
                        <div class="form-gp">
                            <label>Nom d'utilisateur</label>
                            <input type="text" id="pseudo" name="pseudo" autocomplete="off">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label >Mot de Passe</label>
                            <input type="password"  id="password" name="password">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Se connecter </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
   
    <!-- jquery latest version -->
    <script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>
    
    <!-- others plugins -->
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
</body>

</html> 
@endsection