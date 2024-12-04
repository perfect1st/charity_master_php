<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        {{ app()->getLocale() == 'ar' ? $setting->setting_title_ar : $setting->setting_title_en }}
    </title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->

    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

    @if (app()->getLocale() == 'ar')

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset("css_ar/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css_ar/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("css_ar/magnific-popup.css")}}">
    <link rel="stylesheet" href="{{asset("css_ar/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("css_ar/themify-icons.css")}}">
    <link rel="stylesheet" href="{{asset("css_ar/nice-select.css")}}">
    <link rel="stylesheet" href="{{asset("css_ar/flaticon.css")}}">
    <link rel="stylesheet" href="{{asset("css_ar/gijgo.css")}}">
    <link rel="stylesheet" href="{{asset("css_ar/animate.css")}}">
    <link rel="stylesheet" href="{{asset("css_ar/slicknav.css")}}">
    <link rel="stylesheet" href="{{asset("css_ar/style.css")}}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

    @else
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/magnific-popup.css")}}">
    <link rel="stylesheet" href="{{asset("css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/themify-icons.css")}}">
    <link rel="stylesheet" href="{{asset("css/nice-select.css")}}">
    <link rel="stylesheet" href="{{asset("css/flaticon.css")}}">
    <link rel="stylesheet" href="{{asset("css/gijgo.css")}}">
    <link rel="stylesheet" href="{{asset("css/animate.css")}}">
    <link rel="stylesheet" href="{{asset("css/slicknav.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">

    @endif

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">

</head>

<body>

    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-lg-8">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-phone"></i> +1
                                            {{$setting->setting_sitetell1}}</a></li>
                                    <li><a href="#"> <i class="fa fa-envelope"></i>
                                            {{$setting->setting_site_email}}
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-lg-4">
                            <div class="social_media_links d-none d-lg-block">
                                <a href="{{$setting->setting_facebookurl}}">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                {{-- <a href="#">
                                    <i class="fa fa-pinterest-p"></i>
                                </a> --}}
                                <a href="{{$setting->setting_linkedinurl}}">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="{{$setting->setting_twitterurl}}">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid right">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="{{ LaravelLocalization::localizeUrl('/') }}">
                                    <img src="{{asset('img/logo.png')}}" alt>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ LaravelLocalization::localizeUrl('/') }}">
                                                {{app()->getLocale() == 'ar' ? 'الرئيسية' : 'home'}}
                                            </a></li>
                                        <li><a href="{{ LaravelLocalization::localizeUrl('/aboutus') }}">
                                                {{app()->getLocale() == 'ar' ? 'نبذة عنا' : 'about us'}}
                                            </a></li>

                                        {{-- <li><a href="#">
                                                {{ app()->getLocale() == 'ar' ? 'مقالات' : 'articles'}}
                                                <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single-blog</a></li>
                                            </ul>
                                        </li> --}}
                                        {{-- <li><a href="#">الصفحات <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="elements.html">elements</a></li>
                                                <li><a href="Cause.html">Cause</a></li>
                                            </ul>
                                        </li> --}}
                                        <li><a href="{{ LaravelLocalization::localizeUrl('/contactUs') }}">
                                                {{app()->getLocale() == 'ar' ? "تواصل معنا" :" contact us"}}
                                            </a></li>

                                            @auth
                                            {{-- <li>
                                            <a href="{{ url('dashboard_user') }}" class="btn btn-primary me-2">
                                                @lang('auth.Dashboard')
                                            </a>
                                        </li> --}}
                                        <li><a href="#">
                                            @lang('auth.Dashboard')
                                                <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="{{ LaravelLocalization::localizeUrl('/donates') }}">@lang('auth.donates')</a></li>
                                                <li>
                                                    <a>
                                                        <form action="{{ route('logout') }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            <button type="submit"
                                                            style="border: none;background-color: white;cursor: pointer;font-size: large;"
                                                            >@lang("auth.logout")</button>
                                                        </form>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                            {{-- <li>
                                                <a>
                                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">@lang("auth.logout")</button>
                                                </form>
                                                </a>
                                            </li> --}}
                                            
                                            @else

                                            <li><a href="{{ route('login') }}">
                                                {{app()->getLocale() == 'ar' ? "تسجيل الدخول" : "Login"}} </a>

                                            </a></li>

                                            <li><a href="{{ route('register') }}">
                                                {{app()->getLocale() == 'ar' ? "انشاء حساب" : "Register"}}     
                                            </a>

                                            </a></li>
        
                                            
        
                                            @endauth
        
                                    </ul>
                                </nav>
                                <div class="Appointment">

                                    
                                   
                                    <div class="book_btn d-none d-lg-block">
                                        <a data-scroll-nav='1' href="#">
                                            {{app()->getLocale() == 'ar' ? "تبرع الان" : "Donate now"}} </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <div id="flag" style="
    position: fixed;
    left:0px;
    top:50%;
    margin-top:-50px;
    width: 34px;
    height:120px;
    padding-top:20px;
    background:transparent url('{{ asset('bg.png') }}') no-repeat scroll;
    z-index: 1000000;
    ">
        <a id="language" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"><img
                src="{{ asset('arabic.png') }}" style="margin-top: -2px;opacity: 1;margin-right: 4px;width: 30px;"
                alt="Arabic"></a>
        <br>
        <a id="language" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"><img
                src="{{ asset('en.png') }}" alt="English"
                style="opacity: 1;/* margin-top: 6px; */margin-right: 4px;width: 30px;"></a>
    </div>



    @yield('content')

    <!-- footer_start  -->
    <footer class="footer right">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="{{ LaravelLocalization::localizeUrl('/') }}">
                                    <img src="{{asset('img/footer_logo.png')}}" alt>
                                </a>
                            </div>
                            <p class="address_text">
                                {{ app()->getLocale() == 'ar' ? $settingArticle->articles_subject_ar :
                                $settingArticle->articles_subject_en }}
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="{{$setting->setting_facebookurl}}">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$setting->setting_twitterurl}}">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="#">
                                            <i class="fa fa-dribbble"></i>
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="{{$setting->setting_instgramurl}}">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    {{-- <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                {{app()->getLocale() == 'ar' ? 'الخدمات' : 'Services'}}
                            </h3>
                            <ul class="links">
                                <li><a href="#">التبرع</a></li>
                                <li><a href="#">راعي</a></li>
                                <li><a href="#">جمع التبرعات</a></li>
                                <li><a href="#">التطوع</a></li>
                                <li><a href="#"> المشاركة</a></li>
                                <li><a href="#"> الوظائف</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                {{app()->getLocale() == 'ar' ? 'التواصل' : 'Contact Us'}}
                            </h3>
                            <div class="contacts">
                                <p> {{$setting->setting_sitetell1}} <br>
                                    {{$setting->setting_site_email}} <br>
                                    {{
                                    app()->getLocale() == 'ar' ? $setting->setting_site_address_ar
                                    :
                                    $setting->setting_site_address_en
                                    }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                {{
                                app()->getLocale() == 'ar' ? 'اخر الاخبار' : 'latest news'
                                }}
                            </h3>
                            <ul class="news_links">

                                <li>
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('articles/' . $newsbutton[0]->articles_image)}}" alt>
                                        </a>
                                    </div>
                                    <div class="info">
                                        <a href="#">
                                            <h4>
                                                {{ app()->getLocale() == 'ar' ? $newsbutton[0]->articles_title_ar :
                                                $newsbutton[0]->articles_title_en}}
                                            </h4>
                                        </a>
                                        <span>
                                            {{ app()->getLocale() == 'ar' ?$newsbutton[0]->articles_address_ar
                                            :$newsbutton[0]->articles_address_en}}
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{asset('articles/' . $newsbutton[1]->articles_image)}}" alt>
                                        </a>
                                    </div>
                                    <div class="info">
                                        <a href="#">
                                            <h4>
                                                {{ app()->getLocale() == 'ar' ? $newsbutton[1]->articles_title_ar :
                                                $newsbutton[1]->articles_title_en}}
                                            </h4>
                                        </a>
                                        <span>
                                            {{ app()->getLocale() == 'ar' ?$newsbutton[1]->articles_address_ar
                                            :$newsbutton[1]->articles_address_en}}
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="row">
                    <div class="bordered_1px "></div>
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                        <p class="text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            {{app()->getLocale() == 'ar' ? "حقوق الطبع والنشر ©" : "copyright ©"}}

                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            {{app()->getLocale() == 'ar' ? 'جميع الحقوق محفوظة' : 'All Rigths Reserved'}}

                            <!-- &copy;<script>document.write(new Date().getFullYear());</script>
                                        All rights reserved -->
                            </a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end  -->

    <!-- link that opens popup -->

    <!-- JS here -->
    <script src="{{asset("js/vendor/modernizr-3.5.0.min.js")}}"></script>
    <script src="{{asset("js/vendor/jquery-1.12.4.min.js")}}"></script>
    <script src="{{asset("js/popper.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/owl.carousel.min.js")}}"></script>
    <script src="{{asset("js/isotope.pkgd.min.js")}}"></script>
    <script src="{{asset("js/ajax-form.js")}}"></script>
    <script src="{{asset("js/waypoints.min.js")}}"></script>
    <script src="{{asset("js/jquery.counterup.min.js")}}"></script>
    <script src="{{asset("js/imagesloaded.pkgd.min.js")}}"></script>
    <script src="{{asset("js/scrollIt.js")}}"></script>
    <script src="{{asset("js/jquery.scrollUp.min.js")}}"></script>
    <script src="{{asset("js/wow.min.js")}}"></script>
    <script src="{{asset("js/nice-select.min.js")}}"></script>
    <script src="{{asset("js/jquery.slicknav.min.js")}}"></script>
    <script src="{{asset("js/jquery.magnific-popup.min.js")}}"></script>
    <script src="{{asset("js/plugins.js")}}"></script>
    <script src="{{asset("js/gijgo.min.js")}}"></script>
    <!--contact js-->
    <script src="{{asset("js/contact.js")}}"></script>
    <script src="{{asset("js/jquery.ajaxchimp.min.js")}}"></script>
    <script src="{{asset("js/jquery.form.js")}}"></script>
    <script src="{{asset("js/jquery.validate.min.js")}}"></script>
    <script src="{{asset("js/mail-script.js")}}"></script>

    <script src="{{asset("js/main.js")}}"></script>
</body>



</html>