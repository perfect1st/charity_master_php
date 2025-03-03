@extends('layouts.app')
@section('content')

 <!-- bradcam_area_start  -->
 <div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>
                        {{app()->getLocale() == 'ar' ? "تواصل معنا" :" contact us"}}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bradcam_area_end  -->

  <!-- ================ contact section start ================= -->
  <section class="contact-section">
    <div class="container">
        {{-- <div class="d-none d-sm-block mb-5 pb-4">
            <div id="map" style="height: 480px; position: relative; overflow: hidden;"></div>
            <script>
                function initMap() {
                    var uluru = {
                        lat: -25.363,
                        lng: 131.044
                    };
                    var grayStyles = [{
                            featureType: "all",
                            stylers: [{
                                    saturation: -90
                                },
                                {
                                    lightness: 50
                                }
                            ]
                        },
                        {
                            elementType: 'labels.text.fill',
                            stylers: [{
                                color: '#ccdee9'
                            }]
                        }
                    ];
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: -31.197,
                            lng: 150.744
                        },
                        zoom: 9,
                        styles: grayStyles,
                        scrollwheel: false
                    });
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&amp;callback=initMap">
            </script>

        </div> --}}


        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">
                    {{ app()->getLocale() == 'ar' ? 'ابقي علي تواصل' : 'Get in Touch' }}
                </h2>
            </div>
            <div class="col-lg-8 right">
                <form class="form-contact contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder =@lang('auth.Enter Message')" placeholder="@lang('auth.Enter Message')"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = @lang('auth.Enter your name')" placeholder="@lang('auth.Enter your name')">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = @lang('auth.Email Address')" placeholder="@lang('auth.Email Address')">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = '@lang('auth.Enter Subject')'" placeholder="@lang('auth.Enter Subject')">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm boxed-btn">
                            {{app()->getLocale() == 'ar' ? 'ارسال' : 'Send'}}
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-lg-3 offset-lg-1 right my-5">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>
                            {{
                                app()->getLocale() == 'ar' ? $setting->setting_site_address_ar
                                :
                                $setting->setting_site_address_en
                                }} 
                        </h3>
                        {{-- <p>Rosemead, CA 91770</p> --}}
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>{{$setting->setting_sitetell1}}</h3>
                        {{-- <p>Mon to Fri 9am to 6pm</p> --}}
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>{{$setting->setting_site_email}}</h3>
                        {{-- <p>Send us your query anytime!</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

@endsection