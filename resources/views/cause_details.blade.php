@extends('layouts.app')
@section('content')

<!-- bradcam_area_start  -->
<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>
                        {{ app()->getLocale() == 'ar' ? $item->articles_title_ar : $item->articles_title_en}}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bradcam_area_end  -->

<!-- popular_causes_area_start  -->
<div class="popular_causes_area pt-120 cause_details ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="single_cause">
                    <div class="thumb">
                        <img src="{{asset('img/causes/large_img.png')}}" alt="">
                    </div>
                    <div class="causes_content">
                        <div class="custom_progress_bar">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <span class="progres_count">
                                        {{$item->articles_keyword}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="balance d-flex justify-content-between align-items-center">
                            <span>
                                {{ app()->getLocale() == 'ar' ? $item->articles_address_ar :
                                $item->articles_address_en }}
                            </span>
                            <span> {{ app()->getLocale() == 'ar' ? $item->articles_subject_ar2 :
                                $item->articles_subject_en2 }} </span>
                        </div>
                        <h4>{{ app()->getLocale() == 'ar' ? $item->articles_title_ar : $item->articles_title_en}}</h4>
                        <p>
                            {{ app()->getLocale() == 'ar' ? $item->articles_subject_ar :
                            $item->articles_subject_en}}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular_causes_area_end  -->


<div data-scroll-index='1' class="make_donation_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span> {{app()->getLocale() == 'ar' ? "تبرع الان" : "Donate now"}} </span></h3>
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
                                <div
                                    class="fixed_donat d-flex align-items-center justify-content-between">
                                    <div class="select_prise">
                                        <h4>
                                            {{app()->getLocale() == 'ar' ? " : المبلغ" : "amount :"}}    
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
                                        <label for="Other">
                                            {{app()->getLocale() == 'ar' ? "مبلغ اخر :" : "another"}}
                                        </label>
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
                    <a href="#" class="boxed-btn4">
                        {{app()->getLocale() == 'ar' ? "تبرع الان" : "Donate now"}}
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection