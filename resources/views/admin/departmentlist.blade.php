@extends('layouts.app1')
@section('content')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

                <div class="iframe-container" style="margin-left: 3%">
                    @if ( Auth::user()->rule_id==1 )
                    <a class="btn btn-success" href="{{ route('department.create') }} ">اضافة</a>
                    <form method="get" id="myForm" action="{{route('Sort')}}">
                        @csrf
                        {{-- <input type="hidden" name="id" value="{{$dep->id}}"> --}}
                        <input type="hidden" id="search" name="search">
                    </form>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">القسم الرئيسي</th>
                            <th scope="col" onclick="field(event)">العنوان بالعربية</th>
                            <th scope="col" onclick="field(event)">العنوان بالانجليزية</th>
                            <th scope="col">من الفروع</th>
                            <th scope="col">نشط</th>
                            
                            <th scope="col" >تحكم</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($departements as $departement )
                            <tr>
                                <td>{{$departement->id}} </td>
                                <td>{{$departement->department_fatherid}} </td>
                                <td>{{$departement->department_title_ar}} </td>
                                <td>{{$departement->department_title_en}} </td>
                                <td>{{$departement->department_isbranch}} </td>
                                <td>{{$departement->department_isactive}} </td>
                          
                                <td>
                                    <a class="btn btn-warning" style=""
                                        href="{{ route('department.edit', $departement->id) }}">
                                    تعديل
                                    </a>
                                </td>
                                <td>

                                    {{-- <form method="POST" action="{{ route('department.destroy', $departement->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="delete" >
                                    </form>  --}}
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                        {{-- <img id="fullpage" onclick="this.style.display='none';" >
                        <div id="fullsupject" onclick="this.style.display='none';"></div> --}}
                      </table>
                    @endif
                </div>

</div>
<script>
    function field(event)
    {
        var search=event.target.innerText;
        document.getElementById('search').value=search;
        document.getElementById("myForm").submit();
    }

    function fullScreen(event)
        {
           var imgSrc=event.target.src;
           var fullPage=document.getElementById('fullpage');
           fullPage.src =  imgSrc;
           fullPage.style.display = 'block';
        }
</script>

@endsection
