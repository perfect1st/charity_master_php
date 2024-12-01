@extends('layouts.app1')
@section('content')
<div class="container">
    <h1> تعديل الحجز</h1>
    <div class="parent" style="display: flex" dir="rtl">


        <div class="iframe-container" >

           <form method="POST" action="{{route('orders.update',$order->id)}}"  enctype="multipart/form-data">
            @method('PUT')
            @csrf

            {{-- <input type="hidden" name="order_id" value="{{$order->id}}"> --}}
            <div class="form-group">
                <label for="exampleInputEmail1">الاسم</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="name" value="{{$order->name}}" >
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">البريد الالكتروني</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="email" value="{{$order->email}}" >
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">رقم الجوال</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="phone"   value="{{$order->phone}}" >
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">  تاريخ الجلسة</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="date"  value="{{$order->date}}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">وقت الجلسة</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="time"  value="{{$order->time}}">
            </div>



            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">العيادة</label>
                <input  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="clinic"  value="{{$order->clinic}}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1">وقت الاتصال المفضل</label>
                <input  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="fav_time"  value="{{$order->fav_time}}">
            </div>
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1"> اضافة ملاحظات</label>
                 <textarea type="LONGBLOB"  onkeyup="change()" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp"style="height: 100px;" name="notes" style="margin-top: 10px"><?php echo str_replace('<br />', ' ',
                        $order->notes . "\n"); ?></textarea>
            </div>
            
            

            <div class="form-group">
                <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">الحالة</label>
                <select name="status">
                    <option value="{{$order->status}}" selected> {{$order->status}}  </option>
                    <option value=" لم يتم التواصل بعد" >
                        لم يتم التواصل بعد  </option>
                        <option value="تم الرد والحجز">
                            تم الرد والحجز
                        </option>
                        <option value"تم الرد ولم يحجز">
                            تم الرد ولم يحجز
                        </option>
                        <option value="الرقم خطأ">
                        الرقم خطأ
                        </option>
                        <option value="لم يتم الرد من قبل العميل">
                        لم يتم الرد من قبل العميل
                        </option>
                        <option value="استفسار">
                        استفسار
                        </option>
                        <option value="الجوال مغلق">
                        الجوال مغلق
                        </option>
                        <option value="ازعاج">
                        ازعاج
                        </option>
                   
                </select>
            </div>

            <button type="submit" class="btn btn-warning" style="margin-top:65px;">
                معالجة
            </button>
           </form>

        </div>

    </div>
</div>
@endsection
