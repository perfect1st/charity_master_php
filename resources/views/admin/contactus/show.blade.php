@extends('layouts.app1')
@section('content')
<div class="container">
    <h1> معاينة الطلب</h1>
    <div class="parent" style="display: flex" dir="rtl">


        <div class="iframe-container" >

          

            {{-- <input type="hidden" name="order_id" value="{{$order->id}}"> --}}
            <div class="form-group">
                <label for="exampleInputEmail1">الاسم</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="name" value="{{$contact->user_name}}" readonly>
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">رقم الجوال</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     name="email" value="{{$contact->phone}}" readonly>
            </div>
         
          



          
           
            <div class="form-group" style="margin-top: 20px">
                <label for="exampleInputEmail1"> الرسالة</label>
                 <textarea type="LONGBLOB"  onkeyup="change()" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp"style="height: 100px;" name="notes" style="margin-top: 10px" readonly><?php echo str_replace('<br />', ' ',
                        $contact->description . "\n"); ?></textarea>
            </div>
            
            
           

        </div>

    </div>
</div>
@endsection
