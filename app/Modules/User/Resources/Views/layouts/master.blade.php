<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>{{ config('app.name') }} - Admin Panel</title>

    <!-- Favicon  -->
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}">

    <!-- Core Style CSS -->
	{{ Html::style('assets/front/css/core-style.css') }}    
	{{ Html::style('assets/front/css/custom.css') }}    

    @yield('head')
    
</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.html"><img class="logo-img" src="{{ asset('assets/img/rei-logo.png') }}" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Shop</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Women's Collection</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Blouses &amp; Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Rompers</a></li>
                                        <li><a href="shop.html">Bras &amp; Panties</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Men's Collection</li>
                                        <li><a href="shop.html">T-Shirts</a></li>
                                        <li><a href="shop.html">Polo</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Kid's Collection</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <img src="{{ asset('assets/front/img/bg-img/bg-6.jpg') }}" alt="">
                                    </div>
                                </div>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="single-product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="single-blog.html">Single Blog</a></li>
                                    <li><a href="regular-page.html">Regular Page</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- User Login Info -->
                {{-- <div class="user-login-info popover__wrapper">
                    <a href="#">
                        <img class="popover__title" src="{{ asset('assets/front/img/core-img/user.svg') }}" alt="">
                    </a>
                    <div class="push popover__content">
                        <ul>
                            <li>
                                <p class="popover__message">Profile</p>
                            </li>
                            <li>
                                <p class="popover__message">Log Out</p>
                            </li>
                            <li></li>
                        </ul>
                    </div>
                </div> --}}
                {{-- <img src="http://placehold.it/400x200/"> --}}
                @if(user())
                    <!-- Cart Area -->
                    <div class="cart-area">
                        <a href="#" id="essenceCartBtn"><img src="{{ asset('assets/front/img/core-img/bag.svg') }}" alt=""> <span id="count-cart"></span></a>
                    </div>
                    <!-- User Login Info -->
                    <div class="user-login-info">
                        <a href="#"><img src="{{ asset('assets/front/img/core-img/user.svg') }}" alt=""></a>
                    </div>
                    
                    <div class="user-login-info">
                        <a href="{{ route('logout') }}"><img src="{{ asset('assets/icon/logout.svg') }}" alt=""></a>
                    </div>
                @else
                    <div class="user-login-info">
                        <a href="#" data-toggle="modal" data-target="#modal-login"><img src="{{ asset('assets/icon/login.svg') }}" alt=""></a>
                    </div>
                    <div class="user-login-info">
                        <a href="{{ route('register') }}"><img src="{{ asset('assets/icon/add-user.svg') }}" alt=""></a>
                    </div>
                @endif
            </div>

        </div>
    </header>
    
    <!-- Main Content -->
    @yield('content')

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">

            <div class="row align-items-end">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-4">
                    <div class="single_widget_area">
                        <div class="footer_heading mb-30">
                            <h6>Subscribe</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="mail" placeholder="Your email here">
                                <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                        <p style="margin-bottom: -10px;">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-4" style="text-align: right;">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <div class="breadcumb_area bg-img" style="background-image: url({{ asset('assets/front/img/bg-img/breadcumb.jpg') }});">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="page-title text-center">
                                    <h2>Sign In</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            {!! Form::open(['id' => 'form-login', 'route' => 'login.post']) !!}
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="checkout_details_area clearfix">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
                                    {{ Form::email('email', null, ['id' => 'email', 'class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
                                    {{ Form::password('password', ['id' => 'password', 'class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    {{ Form::submit('Login', ['id' => 'btn-submit', 'class' => 'btn btn-block essence-btn']) }}                                    
                </div>
            </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
	{{ Html::script('assets/vendor/jquery/jquery.min.js') }}
    <!-- Popper js -->
	{{ Html::script('assets/front/js/popper.min.js') }}    
    <!-- Bootstrap js -->
	{{ Html::script('assets/vendor/bootstrap/js/bootstrap.min.js') }}    
    <!-- Plugins js -->
	{{ Html::script('assets/front/js/plugins.js') }}        
    <!-- Classy Nav js -->
	{{ Html::script('assets/front/js/classy-nav.min.js') }}            
    <!-- Active js -->
    {{ Html::script('assets/front/js/active.js') }}       
    
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\LoginRequest'); !!}

    <script>
        $(function() {
            countCart();

            $("#form-login").submit(function(event) {
                event.preventDefault();
                if($(this).valid()){
                    $.ajax({
                        type: $(this).attr('method'),
                        url: $(this).attr('action'),
                        data: new FormData($(this)[0]),
                        processData: false, 
                        contentType: false,
                    }).done(function(response){
                        location.reload();
                    }).error(function(xhr, ajaxOptions, thrownError) {               
                        alert(xhr.responseJSON.message);
                    })
                }
            });
        });

        function countCart() {
            if('{{ user() }}'){
                $.ajax({
                    type: 'GET',
                    url: "{{ route('cart.count', ['id' => user()->id?? 0 ]) }}",
                    processData: false, 
                    contentType: false,
                }).done(function(response){
                    $('#count-cart').text(response.data.count)
                }).error(function(xhr, ajaxOptions, thrownError) {               
                    alert(xhr.responseJSON.message);
                })
            } 
        }
    </script>

    @stack('scripts')
    
</body>

</html>