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

<div class="iframe-container" dir="rtl" style="margin-right: 3%">
    <h1> صفحة طلبات التواصل</h1>
    <div style="display: flex;margin-top:30px">
        <div style="width: 82%">
            <form  method="GET" action="{{route('searchContacts')}}">
                {{-- <input type="hidden" name="id" > --}}
                <div style="display: flex;width: 50%;margin-bottom: 2%;">
                    <input class="form-control mr-sm-2" name="search_field" type="search" placeholder="بحث" aria-label="Search" required>
                    <select style="margin-right: 2%" name="type"  required>
                        <option value='user_name'>الاسم</option>
                        <option value='phone'>رقم الجوال</option>
                        <option value='created_at'>تاريخ الطلب</option>
                    </select>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-right: 2%">بحث</button>
                </div>
            </form>

        </div>
        <div>
            <a  href="{{route('exportContacts')}}" style="text-decoration: none" > <i class="fas fa-file-excel"></i> تصدير</a>
            <a  href="{{route('downloadpdfContacts')}}" style="text-decoration: none" > <i class="fas fa-print"></i> طباعة</a>
          
        </div>
    </div>

    {{-- sort articles --}}

    <form method="get" id="myForm" action="{{route('sortContactRequests')}}">
        @csrf
        <input type="hidden" id="search" name="search">
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" onclick="field(event)">الاسم</th>
                <th scope="col" onclick="field(event)">رقم الجوال</th>
                <th scope="col" onclick="field(event)">تاريخ الطلب</th>

                <th scope="col">تحكم</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $slider)
                <tr>
                    {{-- <td>{{ $slider->id }} </td> --}}
                    <td>{{ $slider->user_name }} </td>
                    <td>{{ $slider->phone }} </td>
                    <td>{{ $slider->created_at }} </td>
                    <td>
                        <a class="btn btn-warning"
                            href="{{route('contactus.show',$slider->id)}}">مشاهدة الطلب</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('contactus.destroy', $slider->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input id="delete" onclick="confirmDelete(event)" type="submit" class="btn btn-danger" value="حذف" >
                                    </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div>


    </div>


    <div class="d-felx justify-content-center">

        {{-- {{ $orders->links() }} --}}

    </div>
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
           console.log(originalText);
            // console.log(event.target.classList.contains('article1'));
             //console.log(event.target.innerText);
        }
        //sort
        function field(event)
        {
        var search=event.target.innerText;
        document.getElementById('search').value=search;
        document.getElementById("myForm").submit();
        }
    </script>
@endsection

