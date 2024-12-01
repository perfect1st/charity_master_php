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
    <h1> صفحة الحجوزات</h1>
    <div style="display: flex;margin-top:30px">
        <div style="width: 82%">
            <form  method="GET" action="{{route('searchOrders')}}">
                {{-- <input type="hidden" name="id" > --}}
                <div style="display: flex;width: 50%;margin-bottom: 2%;">
                    <input class="form-control mr-sm-2" name="search_field" type="search" placeholder="بحث" aria-label="Search" required>
                    <select style="margin-right: 2%" name="type"  required>
                        <option value='name'>الاسم</option>
                        <option value='phone'>رقم الجوال</option>
                        <!--<option value='date'>تاريخ الجلسة</option>-->
                        <!--<option value="time">وقت الجلسة</option>-->
                        <option value="clinic">اسم العيادة</option>
                        <option value="price">السعر</option>
                         <option value="source">االمصدر</option>
                           <option value="created_at">تاريخ الاضافة</option>
                        <option value="updated_at">تاريخ المعالجة</option>
                        <option value="status">النتيجة</option>
                    </select>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-right: 2%">بحث</button>
                </div>
            </form>

        </div>
        <div>
            <a  href="{{route('exportOrder')}}" style="text-decoration: none" > <i class="fas fa-file-excel"></i> تصدير</a>
            <a  href="{{route('downloadpdfOrder')}}" style="text-decoration: none" > <i class="fas fa-print"></i> طباعة</a>
            {{-- <a  href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" style="text-decoration: none" >
                <i class="fas fa-globe-europe"></i> الانجليزية
            </a> --}}
        </div>
    </div>

    {{-- sort articles --}}

    <form method="get" id="myForm" action="{{route('sortOrders')}}">
        @csrf
        <input type="hidden" id="search" name="search">
    </form>
    <table class="table">
        <thead>
            <tr>
                 <th scope="col">رقم الحجز</th> 
                <th scope="col" onclick="field(event)">الاسم</th>
                <th scope="col" onclick="field(event)">رقم الجوال</th>
                <th scope="col" onclick="field(event)"> العيادة</th>
                 <th scope="col" > البريد الالكتروني</th>
                 <th scope="col" > المصدر</th>
                 <th scope="col" onclick="field(event)"> تاريخ الاضافة</th>
                <th scope="col" onclick="field(event)"> تاريخ المعالجة</th>
                <th scope="col" onclick="field(event)"> النتيجة</th>
               
                <th scope="col">تحكم</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $slider)
                <tr>
                     <td>{{ $loop->index }} </td> 
                    <td>{{ $slider->name }} </td>
                    <td>{{ $slider->phone }} </td>
                    <td>{{ $slider->clinic }} </td>
                     <td>{{ $slider->email }} </td>
                      <td>{{ $slider->source }} </td>
                      <td>{{ $slider->created_at }} </td>
                    <td>{{ $slider->updated_at }} </td>
                     <td>{{ $slider->status }} </td>
                    <td>
                        <a class="btn btn-warning"
                            href="{{route('orders.edit',$slider->id)}}">
                            معالجة
                            </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('orders.destroy', $slider->id) }}">
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

