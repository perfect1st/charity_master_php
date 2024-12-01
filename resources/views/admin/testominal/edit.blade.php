@extends('layouts.app1')
@section('content')
<style>
    #fullpage {
        display: none;
        position: absolute;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 55vw;
        /* height: 100vh; */
        background-size: contain;
        background-repeat: no-repeat no-repeat;
        background-position: center center;
        background-color: black;
    }
    body{height: 150%;}
</style>
<div class="container">
    <h1> تعديل الرأي</h1>
    <div class="parent" style="display: flex" dir="rtl">


        <div class="iframe-container" >

           <form method="POST" action="{{route('testominals.update',$testominal->id)}}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">رابط الرأي</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="name" value="{{$testominal->user_name}}">
            </div>
            
            <!--<div class="form-group" style="margin-top: 20px">-->
            <!--    <label for="exampleInputEmail1"> رأي العميل</label>-->
            <!--    <textarea type="LONGBLOB" id="arabic" onchange="change()" class="form-control" id="exampleInputEmail1"-->
            <!--        aria-describedby="emailHelp"style="height: 100px;" name="feedback" style="margin-top: 10px" readonly><?php echo str_replace('<br />', ' ', $testominal->feedback . "\n"); ?></textarea>-->
            <!--</div>-->
              <div id="newPic" style="display: none">
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">{{ app()->getLocale() == 'ar' ? $dep->department_title_ar : $dep->department_title_en }} {{app()->getLocale() == 'ar' ? ' الصورة 1' : 'picture 1' }}</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{ app()->getLocale() == 'ar' ? $dep->department_title_ar : $dep->department_title_en }}  {{app()->getLocale() == 'ar' ? ' الصورة 2' : 'picture 2' }}</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{ app()->getLocale() == 'ar' ? $dep->department_title_ar : $dep->department_title_en }} {{app()->getLocale() == 'ar' ? ' الصورة 3' : 'picture 3' }}</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{ app()->getLocale() == 'ar' ? $dep->department_title_ar : $dep->department_title_en }} {{app()->getLocale() == 'ar' ? ' الصورة 4' : 'picture 4' }}</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]">
                </div>

            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">الحالة</label>
                <select name="status">
                    @if ($testominal->status=='نشط')
                    <option value="نشط" selected> نشط </option>
                    <option value="غير نشط"> غير نشط </option>

                    @elseif($testominal->status=='غير نشط')
                    <option value="نشط" > نشط </option>
                    <option value="غير نشط" selected> غير نشط </option>

                    @endif

                </select>
            </div>

            <button type="submit" class="btn btn-warning" style="margin-top:65px;">تعديل</button>
           </form>

        </div>

    </div>
</div>
@endsection
