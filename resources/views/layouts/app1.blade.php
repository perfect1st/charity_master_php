<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="icon" href="{{asset('logo.jpeg')}}" type="image/gif" />
    
</head>
<style>
    .one {
        /* width: 20%; */
        margin-right: 10px;
    }

    .two {
        width: 15%;
        /* margin-left: 10px; */
    }

    .parent {
        /* padding-bottom: 40.25%; */
    }

    .iframe-container {
        margin-top: 1%;
        position: relative;
        width: 80%;
        padding-bottom: 40.25%;
        /* height: 315; */
        /* margin-left: 3%; */
    }

    .iframe-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
<style>
    .two ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 100%;
        background-color: #f1f1f1;
        border: 1px solid #555;
    }

    .two li a {
        display: block;
        color: #000;
        padding: 8px 16px;
        text-decoration: none;
    }

    .two li {
        /* text-align: center; */
        border-bottom: 1px solid #555;
    }

    .two li:last-child {
        border-bottom: none;
    }

    .two li a.active {
        background-color: #04AA6D;
        color: white;
    }

    .two li a:hover:not(.active) {
        background-color: #555;
        color: white;
    }

    #img {
        /* opacity: 0.5; */
    }

    #img:hover {
        opacity: 1;
    }
</style>

{{-- admin panel app --}}

<body>
    
{{-- @if (App::getLocale() == 'ar') --}}
    <div class="parent" style="display: flex" dir="rtl">

        <div class="two">
            
            <div class="alert alert-secondary" role="alert" style="height:100%">

                <a href="" style="text-decoration: none">
                    <h6 class="dropdown-item" style="color:#4682B4;"> لوحة التحكم<i class="fa-solid fa-gauge"></i> </h6>
                </a>
                <hr>
              

                @if (Auth::user()->rule_id == 1)
                    
                
                    {{-- <a class="dropdown-item" href="{{ route('clinics.index') }}" style="text-decoration: none">
                        <h6 style="color:#4682B4 !important"> العيادات <i class="fas fa-clinic-medical"></i></h6>
                    </a> --}}
                    {{-- <hr> --}}
                    <a class="dropdown-item" href="{{ route('settingWebsite') }}" style="text-decoration: none">
                        <h6 style="color:#4682B4 !important"> الاعدادات<i class="fa-solid fa-wrench"></i> </h6>
                    </a>
                    <hr>
                    <h3 class="dropdown-item" style="color:#4682B4" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="departement()">
                        الاقسام<i class="fa-solid fa-table-cells-large"></i> </h3>
                    <ul style="display: none" id="departement">

                    
                        @foreach ($userDeps as $Dep)
                            <li> <a href="{{ route('article.show', $Dep->id) }}">
                                 {{ $Dep->department_title_ar }}

                                 
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <hr>

                    <a class="dropdown-item" href="{{ route('department.index') }}" style="text-decoration: none">
                        <h6 style="color:#4682B4"> لوحة تحكم الموقع</h6>
                    </a>
                    <hr>
                @endif

                <a class="dropdown-item" href="{{ route('logout') }}" style="color:#4682B4"
                    onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    <h6> <i class="fa-solid fa-arrow-left-long"></i> تسجيل الخروج</h6>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>


            </div>

        </div>
        
    {{-- @else
        <div class="parent" style="display: flex">
            <div class="two">
                <div class="alert alert-secondary" role="alert" style="height:100%">
                    <a href="" style="text-decoration: none">
                        <h6 class="dropdown-item" style="color:#4682B4">  Dashboard <i class="fa-solid fa-gauge"></i>
                        </h6>
                    </a>
                    <hr>
                    <a class="dropdown-item" href="{{ route('orders.index') }}" style="text-decoration: none">
                        <h6 style="color:#4682B4"> Orders <i class="fa-solid fa-wrench"></i> </h6>
                    </a>
                    <hr>
                     <a class="dropdown-item" href="{{ route('orders.index') }}" style="text-decoration: none">
                        <h6 style="color:#4682B4 !important"> Contact Us Requests<i class="fa-solid fa-users"></i> </h6>
                    </a>
                    <hr>

                    @if (Auth::user()->rule_id == 1)
                        <a class="dropdown-item" href="{{ route('clinics.index') }}" style="text-decoration: none">
                            <h6 style="color:#4682B4 !important"> Clinics <i class="fas fa-clinic-medical"></i> </h6>
                        </a>
                        <hr>
                        <a class="dropdown-item" href="{{ route('settingWebsite') }}" style="text-decoration: none">
                            <h6 style="color:#4682B4">  Settings <i class="fa-solid fa-wrench"></i> </h6>
                        </a>
                        <hr>
                        <h6 class="dropdown-item" style="color:#4682B4" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="departement()">
                             Departments <i class="fa-solid fa-table-cells-large"></i> </h6>
                        <ul style="display: none" id="departement">
                            @foreach ($userDeps as $Dep)
                                <li> <a href="{{ route('article.show', $Dep->id) }}">
                                        {{ $Dep->department_title_en }}</a> </li>
                            @endforeach
                        </ul>
                        <hr>


                        <a class="dropdown-item" href="{{ route('department.index') }}" style="text-decoration: none">
                            <h6 style="color:#4682B4"> website Dep list</h6>
                        </a>
                        <hr>
                    @endif

                    <a class="dropdown-item" href="{{ route('logout') }}" style="color:#4682B4"
                        onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                        <h6> <i class="fa-solid fa-arrow-left-long"></i> log out</h6>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
             --}}
{{-- @endif --}}



@yield('content')

</div>
</div>


</body>
<script>
    function departement() {
        var x = document.getElementById('departement').style.display;
        if (x == 'block') {
            document.getElementById('departement').style.display = "none";
        } else {
            document.getElementById('departement').style.display = "block";
        }
    }

    function confirmDelete(event) {

        if (!window.confirm('Are you Sure ?')) {
            event.preventDefault();
            return;
        }
    }

    function change () {
        //event.target.style.height = 'auto';
        event.target.style.height =  event.target.scrollHeight+'px';
    }
    
    function loadTextArea()
    {
        var textarea=document.getElementsByTagName("textarea");
        for(var i=0;i<textarea.length;i++)
        {
            textarea[i].style.height=textarea[i].scrollHeight+'px';
        }
    }
    
    loadTextArea();

</script>


