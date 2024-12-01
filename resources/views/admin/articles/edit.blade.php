@extends('layouts.app1')
@section('content')

 <div class="container">
    @if (App::getLocale() == 'ar')
        <div class="parent" style="display: flex" dir="rtl">
        @else
            <div class="parent" style="display: flex">
    @endif

    <div class="iframe-container">
        @if (App::getLocale() == 'ar')
        <h1>تعديل {{ $dep->department_title_ar }} </h1>
        @else
        <h1>edit {{ $dep->department_title_en }} </h1>
        @endif
        <form method="post" action="{{ route('editSlider') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="dep_id" value="{{ $dep_id }}">
            <input type="hidden" name="sliderId" value="{{ $sliderId }}">
            <div class="form-group">
                <label for="exampleInputEmail1">
                    {{app()->getLocale() == 'ar' ? 'العنوان بالعربية' : 'Title Ar'}}
                </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="articles_title_ar" value="{{ $article->articles_title_ar }}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">
                    {{app()->getLocale() == 'ar' ? 'العنوان بالانجليزية' : 'Title En'}}
                    </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="articles_title_en" value="{{ $article->articles_title_en }}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">
                    {{app()->getLocale() == 'ar' ? 'عنوان المحتوي بالعربية' : 'Subject title ar'}}
                    </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="articles_address_ar" value="{{ $article->articles_address_ar }}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">
                    {{app()->getLocale() == 'ar' ? 'عنوان المحتوي بالانجليزية' : 'Subject title en'}}
                    </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="articles_address_en" value="{{ $article->articles_address_en }}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">
                    {{app()->getLocale() == 'ar' ? 'المحتوي بالعربية' : 'Subject ar'}}</label>
                <textarea type="LONGBLOB" id="arabic" onchange="change()" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp"style="height: 100px;" name="articles_subject_ar" style="margin-top: 10px"><?php echo str_replace('<br />', ' ', $article->articles_subject_ar . "\n"); ?></textarea>

            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">
                    {{app()->getLocale() == 'ar' ? 'المحتوي بالانجليزية' : 'Subject en'}}</label>
                <textarea type="LONGBLOB" id="english" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp"style="height: 100px;" name="articles_subject_en" style="margin-top: 10px"> <?php echo str_replace('<br />', ' ', $article->articles_subject_en . "\n"); ?>  </textarea>
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">
                    {{app()->getLocale() == 'ar' ? '2المحتوي بالعربية' : 'Subject ar 2'}} </label>
                <textarea type="LONGBLOB" id="arabic" onchange="change()" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp"style="height: 100px;" name="articles_subject_ar2" style="margin-top: 10px"><?php echo str_replace('<br />', ' ', $article->articles_subject_ar2 . "\n"); ?></textarea>
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">
                    {{app()->getLocale() == 'ar' ? 'المحتوي بالانجليزية2' : 'Subject en 2'}} </label>
                <textarea type="LONGBLOB" id="english" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp"style="height: 100px;" name="articles_subject_en2" style="margin-top: 10px"><?php echo str_replace('<br />', ' ', $article->articles_subject_en2 . "\n"); ?></textarea>
            </div>

            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">
                    {{app()->getLocale() == 'ar' ? 'كلمات البحث' : 'key words'}} </label>
                <input type="LONGBLOB" id="english" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" name="articles_keyword" style="margin-top: 10px"
                    value="{{ $article->articles_keyword }}">
            </div>

            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">
                    {{app()->getLocale() == 'ar' ? 'وصف البحث' : 'description'}} </label>
                <input type="LONGBLOB" id="english" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" name="articles_desc" style="margin-top: 10px"
                    value="{{ $article->articles_desc }}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">
                    {{app()->getLocale() == 'ar' ? 'نشط ام لا' : 'is active'}}
                </label>
                <input type="radio" name="articles_isactive" value="active" {{$article->articles_isactive=='active' ? "checked" : ''}}>
                <label>
                    {{app()->getLocale() == 'ar' ? 'نعم' : 'yes'}}
                    </label><br>
                <input type="radio" name="articles_isactive" value="inactive" {{$article->articles_isactive=='inactive' ? "checked" : ''}}>
                <label>  {{app()->getLocale() == 'ar' ? 'لا' : 'no'}}
                    </label><br>
            </div>
            @if ($article->articles_image)
                <div id="pic" class="form-group" style="margin-top: 10px;">
                    <img src="{{ asset('articles/' . $article->articles_image) }}" alt=""
                        style="height: 150px;">
                    <button onclick="newPic(event)" class="btn btn-danger"
                        style="margin-top: 113px;font-size: small;">
                        {{app()->getLocale() == 'ar' ? 'حذف' : 'delete'}} </button>
                </div>
            @endif

            <div id="newPic" >
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">{{ app()->getLocale() == 'ar' ? $dep->department_title_ar : $dep->department_title_en }} {{app()->getLocale() == 'ar' ? ' الصورة 1' : 'picture 1' }}</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="articles_image[]">
                </div>

                <div style="display:none">
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


            </div>

            <button type="submit" class="btn btn-warning" style="margin-top:65px;">
               {{app()->getLocale() == 'ar' ? 'تعديل': 'edit' }} </button>
        </form>

    </div>

</div>   
    
  
    <script>
        function newPic(event) {
            event.preventDefault();
            document.getElementById("pic").style.display = 'none';
            document.getElementById("newPic").style.display = 'block';
        }

        function newPic1(event) {
            event.preventDefault();
            document.getElementById("pic1").style.display = 'none';
            document.getElementById("newPic").style.display = 'block';
        }
    </script>
@endsection
