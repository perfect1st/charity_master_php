@extends('layouts.app1')
@section('content')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>


<div class="container">

    <div class="parent" style="display: flex">

            <div class="iframe-container" >
               <h1>اضافة قسم </h1>
               <form method="post" action="{{ route('department.store') }}"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">العنوان بالعربية</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                         name="department_title_ar">
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">العنوان بالانجليزية</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                         name="department_title_en">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">من الفروع</label>
                    <input type="radio"   name="depatment_isbranch" value="active" required>
                    <label >نعم</label><br>
                    <input type="radio"    name="depatment_isbranch" value="inactive" required>
                    <label >لا</label><br>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" style="margin-top: 10px;display: block;font-size: x-large">is active</label>
                    <input type="radio"   name="depatment_isactive" value="active" required>
                    <label >نعم</label><br>
                    <input type="radio"    name="depatment_isactive" value="inactive" required>
                    <label >لا</label><br>
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleInputEmail1">القسم الرئيسي</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                         name="department_fatherid">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"> الصورة</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="department_image" >
                </div>

                <button type="submit" class="btn btn-success" style="margin-top: 10px">اضافة</button>

               </form>

            </div>

    </div>
</div>
</div>
@endsection

