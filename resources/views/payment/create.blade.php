@extends('layout2')

@section('head')
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
@endsection

@section('content')

    <div class="tab-content custom-tab-content" align="center">
        <div class="subscribe-panel">
            <h1>Make Payment $5</h1>
            <form action="{{route('payment.store')}}" method="post">
                @csrf
                    <div>
                        <button class="btn btn-warning btn-lg">Make Payment Now</button>
                        @if(session('message'))
                            <p style="color:green">{{session('message')}}</p>
                        @endif
                    </div>
            </form>
        </div>
    </div>

@endsection

