@extends('layouts.app1')
@section('content')
             
             <div class="iframe-container"  style="margin-right: 3%;">
             <h1> تعديل الاعدادات</h1>
             <form method="post" action="{{route('editSetting')}}"  enctype="multipart/form-data" style="width: 80%;">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">العنوان بالعربية</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                         name="setting_title_ar" value="{{$setting->setting_title_ar}}">
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">العنوان بالانجليزية</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="setting_title_en" value="{{$setting->setting_title_en}}">
                </div>

                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">اميل الشركة</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="setting_site_email" value="{{$setting->setting_site_email}}">
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">كلمات البحث</label>
                    <textarea type="LONGBLOB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"style="height: 50px;" name="setting_keywords"><?php echo $setting->setting_keywords ?></textarea>
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">الوصف</label>
                    <textarea type="LONGBLOB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"style="height: 50px;" name="setting_description"><?php echo $setting->setting_description ?></textarea>
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">عنوان الشركة بالعربية</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="setting_site_address_ar" value="{{$setting->setting_site_address_ar}}">
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">عنوان الشركة بالانجليزية</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="setting_site_address_en" value="{{$setting->setting_site_address_en}}">
                </div>
                
                 {{-- <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1"> اسم الفرع الاول بالعربية</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="branch1_ar" value="{{$setting->branch1_ar}}">
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1"> اسم الفرع الاول بالانجليزية</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="branch1_en" value="{{$setting->branch1_en}}">
                </div> --}}
                
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1"> لينك خريطة جوجل</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="setting_googlemap" value="{{$setting->setting_googlemap}}">
                </div>
                
                 {{-- <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1"> الفرع الثاني بالعربية</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="branch2_ar" value="{{$setting->branch2_ar}}">
                </div> --}}
                {{-- <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1"> الفرع الثاني بالانجليزية</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="branch2_en" value="{{$setting->branch2_en}}">
                </div> --}}
                
                {{-- <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1"> لينك خريطة جوجل 2</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="setting_googlemap2" value="{{$setting->setting_googlemap2}}">
                </div> --}}
                
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">لينك الفيس بوك</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="setting_facebookurl" value="{{$setting->setting_facebookurl}}">
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">لينك تويتر</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="setting_twitterurl" value="{{$setting->setting_twitterurl}}">
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">حساب انستجرام</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="setting_instgramurl" value="{{$setting->setting_instgramurl}}">
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1"> حساب لينكد ان</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="setting_linkedinurl" value="{{$setting->setting_linkedinurl}}">
                </div>
                
                {{-- <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">
                        رابط اليوتيوب 
                    </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="setting_youtubeurl" value="{{$setting->setting_youtubeurl}}">
                </div> --}}
                
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">رقم الجوال</label>
                    <input  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="setting_sitetell1" value="{{$setting->setting_sitetell1}}">
                </div>

                
            

                <button type="submit" class="btn btn-warning" style="margin-top: 10px;margin-bottom: 34px;">تعديل</button>

               </form>

          


            </div>
 @endsection

