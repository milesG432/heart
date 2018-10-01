<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Heart Systems</title>
<!--https://mdbootstrap.com/css/hover-effects/-->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src='/js/parallax.min.js'></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">    -->
    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet">
</head>
<body>    
    <div id="app">                
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" id='navs'>
            <div class="container-fluid">
                <nav class="navbar" id='navImage'>
                    <a href='/'><img src="img/logo.png" alt=""/></a>
                </nav>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>             
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/pulseoffice"> PulseOffice</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/pulsestore"> PulseStore</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/support"> Support</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/news"> News</a>
                            </li>
                            @if(Session::get('loggedIn'))            
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Wishlist</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Issue tracker</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Upload area</a>
                            </li>
                            @endif
                            @if(Session::get('loggedIn') && Session::get('level') === 'god')
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Site admin</a>
                            </li>
                            @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links --> 
                        @if( empty($user) || $user['loggedIn'] != 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else                            
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>                            
                        @endif    
                        
                    </ul>
                    <div style="float:right">
                    <ul class="nav">
                        <li class="nav-item"><button id='linkButton'>TeamViewer</button></li>                        
                    </ul>                    
                    <ul class="nav">
                        <li class="nav-item"><button id='linkButton'>01568 617600</button></li>
                    </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main>            
            @yield('content')
        </main>
        <footer>  
            <div class="container"><br>
                <div class="row">
                    <div class="col-sm">
                        <ul id='footerList'>
                            <strong><p style="color: #ffffff;text-align: left;">LINKS</p></strong>
                            <hr>
                            <li>
                                <a href='#'>Home</a>
                            </li>
                            <li>
                                <a href='#'>About</a>
                            </li>
                            <li>
                                <a href='#'>Contact us</a>
                            </li>
                            <li>
                                <a href='#'>Careers</a>
                            </li>
                            <li>
                                <a href='#'>Support</a>
                            </li>
                            <li>
                                <a href='#'>News</a>
                            </li>
                        </ul> 
                    </div>                
                    <div class="col-sm">
                        <strong><p style="color: #ffffff;text-align: left;">CONTACT US</p></strong>
                        <hr>
                        <strong><p style="color: #ffffff;text-align: left;">MAIN NO.   01568617600</p></strong>
                        <strong><p style="color: #ffffff;text-align: left;">SALES NO.   01568 617611</p></strong>
                        <a href="mailto:support@heartsystems.co.uk">support@heartsystems.co.uk</a>
                        <a href='mailto:sales@heartsystems.co.uk'>sales@heartsystems.co.uk</a>
                    </div>            
                    <div class="col-sm">
                        <strong><p style="color: #ffffff;text-align: left;">FIND US</p></strong>
                        <hr>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2444.446788686343!2d-2.7317736840091698!3d52.21710006638468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870471a0c30012f%3A0x58cab1e73e2d876c!2sHeart+Systems+Ltd!5e0!3m2!1sen!2suk!4v1537192116031" width="450" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>                        
                </div>
                <p style="color:#F2AA4D">2018&COPY; Heart Systems Ltd (all rights reserved)</p>
                <p style="color:#F2AA4D"><a href='#'>Privacy & cookies</a> | <a href='#'>Company information</a></p>
            </div>            
        </footer>
    </div>    
</body>
</html>
