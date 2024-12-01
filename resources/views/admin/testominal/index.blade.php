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
    <h1> صفحة اراءالعملاء</h1>
    <div style="display: flex;margin-top:30px">
        <div style="width: 82%">
            <form  method="GET" action="{{route('searchTestominals')}}">
                <div style="display: flex;width: 50%;margin-bottom: 2%;">
                    <input class="form-control mr-sm-2" name="search_field" type="search" placeholder="بحث" aria-label="Search" required>
                    <select style="margin-right: 2%" name="type"  required>
                        <option value='user_name'>اسم العميل</option>
                        <option value="status">الحالة</option>
                    </select>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-right: 2%">بحث</button>
                </div>
            </form>

        </div>
        <div>
            {{-- <a  href="{{route('exportOrder')}}" style="text-decoration: none" > <i class="fas fa-file-excel"></i> تصدير</a>
            <a  href="{{route('downloadpdfOrder')}}" style="text-decoration: none" > <i class="fas fa-print"></i> طباعة</a> --}}
        </div>
    </div>

    {{-- sort articles --}}

    {{-- <form method="get" id="myForm" action="{{route('sortOrders')}}">
        @csrf
        <input type="hidden" id="search" name="search">
    </form> --}}
    <table class="table">
        <thead>
            <tr>
                
                <th scope="col" onclick="field(event)"> رابط الرأي</th>
                <th scope="col" onclick="field(event)"> حالة الرأي</th>
                  <th scope="col" onclick="field(event)"> الصورة</th>
                
                <th scope="col">تحكم</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testominals as $slider)
                <tr>
                   
                    <td>{{ $slider->user_name }} </td>
                     <td>{{ $slider->status }} </td>
                       <td>
                            @if ($slider->articles_image ==null)
                            <p> {{ App::getLocale()=='ar' ? 'لا توجد صورة' : 'no image'}} </p>
                            @else
                            <img src="{{ asset('articles/' . $slider->articles_image) }}" alt=""
                            style="height: 110px;" onclick="fullScreen(event)">
                            @endif
                        </td>
                    <td>
                        <a class="btn btn-warning"
                            href="{{route('testominals.edit',$slider->id)}}">تعديل</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('testominals.destroy', $slider->id) }}">
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

@endsection