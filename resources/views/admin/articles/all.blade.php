@extends('layouts.app1')
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
</style>
@section('content')


<div class="iframe-container"    style="{{App::getLocale()=='ar' ? 'margin-right: 3%' : 'margin-left: 3%'}} ">
    <h1>  {{  App::getLocale()=='ar' ? $dep->department_title_ar : $dep->department_title_en }} </h1>
    <div style="display: flex">
        <div style="width: 66%">
            <a class="btn btn-success" href="{{ route('addSliderPage', $dep->id) }}" >
             {{ App::getLocale()=='ar' ? 'اضافة' : 'add' }}   </a>
        </div>
        {{-- <div>
            <a  href="{{route('export',$dep->id)}}" style="text-decoration: none" > <i class="fas fa-file-excel"></i>
                {{App::getLocale()=='ar' ? 'تصدير' : 'Export'}} </a>
            <a  href="{{route('downloadPdf',$dep->id)}}" style="text-decoration: none" > <i class="fas fa-print"></i>
                {{ App::getLocale()=='ar' ? 'طباعة' : 'Print'}} </a>
            @if (App::getLocale()=='ar')
            <a  href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" style="text-decoration: none" >
                <i class="fas fa-globe-europe"></i> الانجليزية
            </a>
            @else
            <a  href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" style="text-decoration: none" >
                <i class="fas fa-globe-europe"></i> Arabic
            </a>


            @endif

        </div> --}}

        {{-- search articles --}}

    <div >
        <form  method="GET" action="{{route('searchArticles')}}">
            <input type="hidden" name="id" value="{{$dep->id}}">
            <div style="display: flex;margin-bottom: 2%;{{ App::getLocale()=='ar' ? 'float: left' : 'float: right'}};">
                <input class="form-control mr-sm-2" name="search_field" type="search" placeholder="{{App::getLocale()=='ar' ? 'بحث' :'search' }}" aria-label="Search" required>
                <select style="{{App::getLocale()=='ar' ? 'margin-right: 2%' : 'margin-left: 2%'}}" name="type"  required>
                    <option value="articles_title_ar">
                        {{App::getLocale()=='ar' ? 'العنوان بالعربية' : 'Title Ar'}}
                    </option>
                    <option value="articles_title_en">
                       {{App::getLocale()=='ar' ? 'العنوان بالانجليزية' : 'Title En'}} </option>
                    <option value="articles_subject_ar">
                        {{ App::getLocale()=='ar' ?  'المحتوي بالعربية' :'Subject Ar'}}</option>
                    <option value="articles_subject_en">
                       {{App::getLocale()=='ar' ? 'المحتوي بالانجليزية' : 'Subject En'}} </option>
                    <option value="articles_isactive">
                        {{App::getLocale()=='ar' ? 'نشط ام لا' : 'is active'}}</option>
                </select>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="{{App::getLocale()=='ar' ?'margin-right: 2%':'margin-left: 2%' }}">{{App::getLocale()=='ar' ? 'بحث' :'search' }}</button>
            </div>
        </form>
    </div>

    </div>

     

    {{-- sort articles --}}

    <form method="get" id="myForm" action="{{route('sortArticle')}}">
        @csrf
        <input type="hidden" name="id" value="{{$dep->id}}">
        <input type="hidden" id="search" name="search">
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" onclick="field(event)">id</th>
                <th scope="col" onclick="field(event)">
                    {{App::getLocale()=='ar' ? 'العنوان بالعربية' : 'Title Ar' }}
                    </th>
                <th scope="col" onclick="field(event)"> {{ App::getLocale()=='ar' ? 'العنوان  بالانجليزية' : 'Title En' }}
                    </th>
                <th scope="col" onclick="field(event)"> {{App::getLocale()=='ar' ? 'المحتوي بالعربية' :'Subject Ar' }}
                    </th>
                <th scope="col" onclick="field(event)"> {{App::getLocale()=='ar' ? 'المحتوي بالانجليزية' :'Subject EN' }}
                    </th>
                <th scope="col" onclick="field(event)"> {{App::getLocale()=='ar' ? 'نشط ام لا' :'is active' }}
                    </th>
                <th scope="col">
                    {{App::getLocale()=='ar' ? 'الصورة' : 'Image' }}
                </th>
                <th scope="col">
                    {{App::getLocale()=='ar' ? 'تحكم' : 'control'}}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $slider)
                <tr>
                    <td>{{ $slider->id }} </td>
                    <td>{{ $slider->articles_title_ar }} </td>
                    <td>{{ $slider->articles_title_en }} </td>
                    <td class="article1" onclick="fullSubject(event)"><?php echo $slider->articles_subject_ar; ?> </td>
                    <td class="article2" onclick="fullSubject(event)"><?php echo $slider->articles_subject_en; ?> </td>
                    <td>{{ $slider->articles_isactive }} </td>
                    <td>
                        @if ($slider->articles_image ==null)
                        <p> {{ App::getLocale()=='ar' ? 'لا توجد صورة' : 'no image'}} </p>
                        @else
                        <img src="{{ asset('articles/' . $slider->articles_image) }}" alt=""
                        style="height: 110px;" onclick="fullScreen(event)">
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-warning" style="margin-top: 10px;"
                            href="{{ route('editSliderPage',[$slider->id,$dep->id]) }}">
                           {{ App::getLocale()=='ar' ? 'تعديل' :'edit' }} </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('deleteSlider') }}">
                            @csrf
                            <input type="hidden" name="sliderId" value="{{ $slider->id }}">
                            <button id="delete" onclick="confirmDelete(event)" type="submit" class="btn btn-danger" style="margin-top: 10px">
                             {{App::getLocale()=='ar' ? 'حذف' :'delete'}}    </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <img id="fullpage" onclick="this.style.display='none';">
    <div id="fullsupject" onclick="this.style.display='none';"></div>
</div>
    







    <script>
        window.onload = function subject() {
            trimString('article1', 15);
            trimString('article2', 15);
        }
        var originalText=[];

        function trimString(classname, no) {
            var a1 = document.getElementsByClassName(classname);
            for (var i = 0; i < a1.length; i++) {
                var text = a1[i].innerText;
                originalText.push(a1+i,text);
                var l = text.length;
                let result = text.slice(0, no);
                var final = result + '...';
                a1[i].innerText = final;
            }
        }
        function fullScreen(event)
        {
           var imgSrc=event.target.src;
           var fullPage=document.getElementById('fullpage');
           fullPage.src =  imgSrc;
           fullPage.style.display = 'block';
        }
        function fullSubject(event)
        {
          // console.log(originalText);
            // console.log(event.target.classList.contains('article1'));
             //console.log(event.target.innerText);
        }
        function field(event)
    {
        var search=event.target.innerText;
        document.getElementById('search').value=search;
        document.getElementById("myForm").submit();
    }
    </script>
@endsection
