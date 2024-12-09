@extends('layouts.app')
@section('content')

<style>
    .customTable{
        margin: 10%;
        max-height: 800px;
    overflow: auto;
    padding: 10px;
    }
</style>

<div class="customTable" >
    <table class="table right">
        <thead>
            <tr>
                <th scope="col">
                {{ app()->getLocale() == 'ar' ? 'المبلغ' : 'amount'}}    
                </th>
                <th scope="col">
                    {{ app()->getLocale() == 'ar' ? 'رقم العميلة' : 'transactionID'}}  
                </th>
                <th scope="col">
                  {{app()->getLocale() == 'ar' ? 'سبب التبرع' : 'cause'}}  
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donates as $item)
            <tr>
                <td>{{$item->amount}}</td>
                <td>{{$item->transactionID}}</td>
                <td>
                    @if($item->articleID==null)
                    {{$item->notes}}
                    @else
                    {{$item->article->articles_title_ar}}
                    @endif
                </td>
            </tr>
            @endforeach

            @foreach ($donates as $item)
            <tr>
                <td>{{$item->amount}}</td>
                <td>{{$item->transactionID}}</td>
                <td>
                    @if($item->articleID==null)
                    {{$item->notes}}
                    @else
                    {{$item->article->articles_title_ar}}
                    @endif
                </td>
            </tr>
            @endforeach

            @foreach ($donates as $item)
            <tr>
                <td>{{$item->amount}}</td>
                <td>{{$item->transactionID}}</td>
                <td>
                    @if($item->articleID==null)
                    {{$item->notes}}
                    @else
                    {{$item->article->articles_title_ar}}
                    @endif
                </td>
            </tr>
            @endforeach

            @foreach ($donates as $item)
            <tr>
                <td>{{$item->amount}}</td>
                <td>{{$item->transactionID}}</td>
                <td>
                    @if($item->articleID==null)
                    {{$item->notes}}
                    @else
                    {{$item->article->articles_title_ar}}
                    @endif
                </td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
    
</div>

@endsection