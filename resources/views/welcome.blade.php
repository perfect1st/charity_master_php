@extends('layouts.app')
@section('content')

 <!-- slider_area_start -->
    <div class="slider_area">
        <div style="background-image: url({{asset('articles/' . $banner->articles_image)}});"
            class="single_slider  d-flex align-items-center slider_bg_1 overlay2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider_text ">
                            {{-- <span> ابدأ الان</span> --}}
                            <h3>
                                {{ app()->getLocale() == 'ar' ? $banner->articles_title_ar : $banner->articles_title_en}}   
                            </h3>
                            <p>
                                {{ app()->getLocale() == 'ar' ? $banner->articles_subject_ar : $banner->articles_subject_en}}
                            </p>
                            <a href="About.html" class="boxed-btn3">
                                {{ app()->getLocale() == 'ar' ? "المزيد" : "more"}}           
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- reson_area_start  -->
    <div class="reson_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3>
                            <span>
                             
                                {{ app()->getLocale() == 'ar' ? $helpDep->department_title_ar :
                                $helpDep->department_title_en }}
                                
                            </span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($helpDepImages as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="single_reson">
                        <div class="thum">
                            <div class="thum_1">
                                <img src="{{asset('articles/' . $item->articles_image)}}" alt="">
                            </div>
                        </div>
                        <div class="help_content">
                            <h4>
                                {{ app()->getLocale() == 'ar' ? $item->articles_title_ar : $item->articles_title_en}}
                            </h4>
                            <p>
                                {{ app()->getLocale() == 'ar' ? $item->articles_subject_ar : $item->articles_subject_en}}
                            </p>
                            <a href="#" class="read_more">
                                {{ app()->getLocale() == 'ar' ? "المزيد" : "more"}}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            
            </div>
        </div>
    </div>
    <!-- reson_area_end  -->

    <!-- latest_activites_area_start  -->
    <div class="latest_activites_area">
        <div class="video_bg_1 video_activite  d-flex align-items-center justify-content-center"
            style="background-image: url({{asset(asset('articles/' . $lastActivities->articles_image))}});">
            <a class="popup-video" href="{{$lastActivities->articles_address_ar}}">
                <i class="flaticon-ui"></i>
            </a>
        </div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-7">
                    <div class="activites_info">
                        <div class="section_title">
                            <h3> <span>
                                    {{ app()->getLocale() == 'ar' ? $lastActivities->articles_title_ar : $lastActivities->articles_title_en}}
                                 </span>
                                 <br>
                            </h3>
                        </div>
                        <p class="para_1">
                            @if (app()->getLocale() == 'ar')
                            {!! $lastActivities->articles_subject_ar !!}
                            @else
                            {!! $lastActivities->articles_subject_en !!}                                
                            @endif
                           
                        </p class="para_1">
                     
                        <a href="#" data-scroll-nav='1' class="boxed-btn4">
                            {{app()->getLocale() == 'ar' ? "تبرع الان" : "Donate now"}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- latest_activites_area_end  -->

    <!-- popular_causes_area_start  -->
    <div class="popular_causes_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>
                            {{ app()->getLocale() == 'ar' ? $popularCasesDep->department_title_ar :
                                $popularCasesDep->department_title_en }}
                            </span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="causes_active owl-carousel">
                        @foreach ($popularCasesDepImages as $item)
                        <div class="single_cause">
                            <div class="thumb">
                                <img src="{{asset(asset('articles/' . $item->articles_image))}}" alt>
                            </div>
                            <div class="causes_content">
                                <div class="custom_progress_bar">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 30%;"
                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progres_count">
                                              {{$item->articles_keyword}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="balance d-flex justify-content-between align-items-center right">
                                    <span>
                                    {{ app()->getLocale() == 'ar' ? $item->articles_address_ar   : $item->articles_address_en }}
                                     </span>
                                    <span> {{ app()->getLocale() == 'ar' ? $item->articles_subject_ar2   : $item->articles_subject_en2 }} </span>
                                </div>
                                <h4>
                                    {{ app()->getLocale() == 'ar' ? $item->articles_title_ar : $item->articles_title_en}}
                                </h4>
                                <p>
                                    {{ app()->getLocale() == 'ar' ? Str::limit($item->articles_subject_ar, 40)  : Str::limit($item->articles_subject_en, 40)}}
                                </p>
                                <a class="read_more" href="cause_details.html"> 
                                    {{ app()->getLocale() == 'ar' ? "المزيد" : "more"}}
                                </a>
                            </div>
                        </div>
                        @endforeach
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_causes_area_end  -->

    <!-- counter_area_start  -->
    <div class="counter_area">
        <div class="container">
            <div class="counter_bg overlay">
                <div class="row">

                    @foreach ($counter as $item)

                    <div class="col-lg-3 col-md-6">
                        <div class="single_counter d-flex align-items-center justify-content-center">
                            <div class="icon">
                                <i class="flaticon-calendar"></i>
                            </div>
                            <div class="events">
                                <h3 class="counter">
                                    {{ app()->getLocale() == 'ar' ? $item->articles_address_ar : $item->articles_address_ar}}
                                </h3>
                                <p>
                                    {{ app()->getLocale() == 'ar' ? $item->articles_title_ar : $item->articles_title_en}}
                                </p>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    

                    {{-- <div class="col-lg-3 col-md-6">
                        <div class="single_counter d-flex align-items-center justify-content-center">
                            <div class="icon">
                                <i class="flaticon-heart-beat"></i>
                            </div>
                            <div class="events">
                                <h3 class="counter">50</h3>
                                <p>الحدث المنتهي</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="single_counter d-flex align-items-center justify-content-center">
                            <div class="icon">
                                <i class="flaticon-in-love"></i>
                            </div>
                            <div class="events">
                                <h3 class="counter">120</h3>
                                <p>الحدث المنتهي</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="single_counter d-flex align-items-center justify-content-center">
                            <div class="icon">
                                <i class="flaticon-hug"></i>
                            </div>
                            <div class="events">
                                <h3 class="counter">120</h3>
                                <p>الحدث المنتهي</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- counter_area_end  -->

    <!-- our_volunteer_area_start  -->
    {{-- <div class="our_volunteer_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span> المتطوعون </span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <img src="img/volenteer/1.png" alt>
                        </div>
                        <div class="voolenteer_info d-flex align-items-end">
                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="info_inner">
                                <h4>Sakil khan</h4>
                                <p> متبرع </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <img src="img/volenteer/2.png" alt>
                        </div>
                        <div class="voolenteer_info d-flex align-items-end">
                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="info_inner">
                                <h4>Emran Ahmed</h4>
                                <p>Volunteer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <img src="img/volenteer/3.png" alt>
                        </div>
                        <div class="voolenteer_info d-flex align-items-end">
                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#"> <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="info_inner">
                                <h4>Sabbir Ahmed</h4>
                                <p>Volunteer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- our_volunteer_area_end  -->

    <!-- news__area_start  -->
    <div class="news__area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3>
                            <span>
                                {{ app()->getLocale() == 'ar' ? $newsDep->department_title_ar :
                                $newsDep->department_title_en }}
                            </span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="news_active owl-carousel">
                        @foreach ($news as $item)
                        <div class="single__blog d-flex align-items-center right">
                            <div class="thum">
                                <img src="img/news/1.png" alt>
                            </div>
                            <div class="newsinfo">
                                <span>July 18, 2019</span>
                                <a href="single-blog.html">
                                    <h3> تعليم الاطفال الافارقة </h3>
                                </a>
                                <p>
                                    الفقرة تُنسب إلى معد الطباعة المجهول
                                            في القرن الذي يُعتقد أنه...
                                </p>
                                <a class="read_more" href="single-blog.html">
                                    {{ app()->getLocale() == 'ar' ? "المزيد" : "more"}}
                                </a>
                            </div>
                        </div>
                        @endforeach

                        {{-- <div class="single__blog d-flex align-items-center right">
                            <div class="thum">
                                <img src="img/news/2.png" alt>
                            </div>
                            <div class="newsinfo">
                                <span>July 18, 2019</span>
                                <a href="single-blog.html">
                                    <h3>Pure Water Is More Essential</h3>
                                </a>
                                <p>The passage experienced a
                                    surge in popularity during the
                                    1960s when used it on their
                                    sheets, and again.</p>
                                <a class="read_more" href="single-blog.html">Read
                                    More</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news__area_end  -->

    <div data-scroll-index='1' class="make_donation_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span> تبرع الان </span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="#" class="donation_form">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="single_amount">
                                    <div class="input_field">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">$</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="40,200"
                                                aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="single_amount">
                                    <div class="fixed_donat d-flex align-items-center justify-content-between">
                                        <div class="select_prise">
                                            <h4>
                                                : المبلغ
                                            </h4>
                                        </div>
                                        <div class="single_doonate">
                                            <input type="radio" id="blns_1" name="radio-group" checked>
                                            <label for="blns_1">10</label>
                                        </div>
                                        <div class="single_doonate">
                                            <input type="radio" id="blns_2" name="radio-group" checked>
                                            <label for="blns_2">30</label>
                                        </div>
                                        <div class="single_doonate">
                                            <input type="radio" id="Other" name="radio-group" checked>
                                            <label for="Other"> مبلغ اخر</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="donate_now_btn text-center">
                        <a href="#" class="boxed-btn4">تبرع الان</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

   
    @endsection