@extends('layouts.app')

@section('content')
<div class="container my-5 right">
    <div class="row justify-content-center p-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> @lang('auth.Dashboard')</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    
                    @if ( request('success') ==true)
                    @lang('auth.success')

                    @else
                    @lang('auth.failed') 

                    @endif

                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection