{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app1')
@section('content')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
    <style>
        .one {
            /* width: 20%; */
            margin-right: 10px;
        }

        .two {
            width: 20%;
            /* margin-left: 10px; */
        }
       .parent{
        padding-bottom: 40.25%;
       }
        .iframe-container {
            position: relative;
            width: 80%;
            padding-bottom: 40.25%;
            height: 315;
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
        .courses ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #f1f1f1;
            border: 1px solid #555;
        }

        .courses li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
        }

        .courses li {
            /* text-align: center; */
            border-bottom: 1px solid #555;
        }

        .courses li:last-child {
            border-bottom: none;
        }

        .courses li a.active {
            background-color: #04AA6D;
            color: white;
        }

        .courses li a:hover:not(.active) {
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


        <div class="parent" style="display: flex">



                <div class="iframe-container" >

                </div>



        </div>



    </div>
@endsection


