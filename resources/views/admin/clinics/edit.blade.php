@extends('layouts.app1')
@section('content')
<div class="container">
    @if (App::getLocale()=='ar')
    <div class="parent" style="display: flex" dir="rtl">


        <div class="iframe-container" >
           <h1>تعديل {{$dep->department_title_ar}} </h1>
           <form method="post" action="{{route('editClinic')}}"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="dep_id" value="{{$dep_id}}">
            <input type="hidden" name="sliderId" value="{{$sliderId}}">
            <div class="form-group">
                <label for="exampleInputEmail1">العنوان بالعربية</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_title_ar" value="{{$article->articles_title_ar}}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">العنوان بالانجليزية</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_title_en"   value="{{$article->articles_title_en}}">
            </div>

            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">السعر</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="price"   value="{{$article->price}}">
            </div>

            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">  عنوان المحتوي بالعربية</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_address_ar"  value="{{$article->articles_address_ar}}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">عنوان المحتوي بالانجليزية</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_address_en"  value="{{$article->articles_address_en}}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">المحتوي بالعربية</label>
                <textarea type="LONGBLOB" id="arabic" onchange="change()" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"style="height: 100px;" name="articles_subject_ar"   style="margin-top: 10px"><?php echo str_replace('<br />', " ",$article->articles_subject_ar."\n");?></textarea>

            </div>
            <div class="form-group" style="margin-top: 20px">
               <label for="exampleInputEmail1">المحتوي بالانجليزية</label>
                <textarea type="LONGBLOB" id="english" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"style="height: 100px;" name="articles_subject_en" style="margin-top: 10px"> <?php echo str_replace('<br />', " ",$article->articles_subject_en."\n");?>  </textarea>
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1"> 2المحتوي بالعربية</label>
                <textarea type="LONGBLOB" id="arabic" onchange="change()" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"style="height: 100px;" name="articles_subject_ar2"   style="margin-top: 10px"><?php echo str_replace('<br />', " ",$article->articles_subject_ar2."\n");?></textarea>
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">المحتوي بالانجليزية2</label>
                <textarea type="LONGBLOB" id="english" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"style="height: 100px;" name="articles_subject_en2"  style="margin-top: 10px"><?php echo str_replace('<br />', " ",$article->articles_subject_en2."\n");?></textarea>
            </div>

            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">كلمات البحث</label>
                <input type="LONGBLOB" id="english" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_keyword"  style="margin-top: 10px" value="{{$article->articles_keyword}}">
            </div>

            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">وصف البحث</label>
                <input type="LONGBLOB" id="english" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_desc"  style="margin-top: 10px" value="{{$article->articles_desc}}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">نشط ام لا</label>
                <input type="radio"   name="articles_isactive" value="active" checked="checked">
                <label >نعم</label><br>
                <input type="radio"    name="articles_isactive" value="inactive" >
                <label >لا</label><br>
            </div>
            @if ($article->articles_image)
            <div id="pic" class="form-group" style="margin-top: 10px;">
                <img  src="{{ asset('articles/' . $article->articles_image) }}" alt="" style="height: 150px;" >
                <button onclick="newPic(event)" class="btn btn-danger" style="margin-top: 113px;font-size: small;"> حذف</button>
            </div>

            @endif

            <div id="newPic"  style="display: none">
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">{{$dep->department_title_ar}} الصورة 1</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{$dep->department_title_ar}} الصورة 2</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{$dep->department_title_ar}} الصورة 3</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{$dep->department_title_ar}} الصورة 4</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" >
                </div>


            </div>

            <button type="submit" class="btn btn-warning" style="margin-top:65px;">تعديل</button>
           </form>

        </div>

    </div>

    @else
    <div class="parent" style="display: flex">
        <div class="iframe-container" >

           <h1>edit {{$dep->department_title_en}} </h1>

           <form method="post" action="{{route('editClinic')}}"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="dep_id" value="{{$dep_id}}">
            <input type="hidden" name="sliderId" value="{{$sliderId}}">
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">Title Ar</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_title_ar" value="{{$article->articles_title_ar}}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">Title En</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_title_en" value="{{$article->articles_title_en}}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">price</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="price"   value="{{$article->price}}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1"> Subject title ar</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_address_ar" value="{{$article->articles_address_ar}}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">Subject title en</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_address_en" value="{{$article->articles_address_en}}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">Subject Ar</label>
                <textarea  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="height: 150px;"  name="articles_subject_ar" ><?php echo str_replace('<br />', " ",$article->articles_subject_ar."\n");?></textarea>

            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">Subject En</label>
                <textarea type="LONGBLOB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"style="height: 100px;" name="articles_subject_en"><?php echo str_replace('<br />', " ",$article->articles_subject_en."\n");?></textarea>
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">Subject Ar2</label>
                <textarea  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"style="height: 100px;" rows="8" name="articles_subject_ar2" ><?php echo str_replace('<br />', " ",$article->articles_subject_ar2."\n");?></textarea>
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">Subject En2</label>
                <textarea type="LONGBLOB" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"style="height: 100px;" name="articles_subject_en2"><?php echo str_replace('<br />', " ",$article->articles_subject_en2."\n");?></textarea>
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">keywords</label>
                <input type="LONGBLOB" id="english" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_keyword"  style="margin-top: 10px" value="{{$article->articles_keyword}}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">description</label>
                <input type="LONGBLOB" id="english" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="articles_desc"  style="margin-top: 10px" value="{{$article->articles_desc}}">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">is active</label>
                <input type="radio"   name="articles_isactive" value="active" checked="checked">
                <label >yes</label><br>
                <input type="radio"    name="articles_isactive" value="inactive" >
                <label >no</label><br>
            </div>
            @if ($article->articles_image)
            <div id="pic" class="form-group" style="margin-top: 10px;">
                <img  src="{{ asset('articles/' . $article->articles_image) }}" alt="" style="height: 150px;" >
                <button onclick="newPic(event)" class="btn btn-danger" style="margin-top: 113px;font-size: small;"> delete</button>
            </div>

            @endif

            <div id="newPic" style="display: none;margin-top: 10px">
                <div class="form-group">
                    <label for="exampleInputEmail1">{{$dep->department_title_en}} image 1</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{$dep->department_title_en}} image 2</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{$dep->department_title_en}} image 3</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{$dep->department_title_en}} image 4</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]" >
                </div>
            </div>


            <button type="submit" class="btn btn-warning" style="margin-top:65px;">edit</button>
           </form>

        </div>

    </div>
    @endif
    <script>
        function newPic(event)
        {
            event.preventDefault();
            document.getElementById("pic").style.display='none';
            document.getElementById("newPic").style.display='block';
           // console.log('done');
        }
    </script>

 @endsection

