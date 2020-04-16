@extends('layout2')

@section('head')
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
@endsection

@section('content')

    <div class="tab-content custom-tab-content" align="center">
        <div class="subscribe-panel">
            <h1>Send Email!</h1>
            <p>Subscribe to our weekly Newsletter and stay tuned.</p>

            <form action="{{route('contact.store')}}" method="post">
                @csrf
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                        <input type="email" class="form-control input-lg" name="email" id="email"  placeholder="Enter your Email"/>
                    </div>
                    <div>
                        @error('email')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <br>
                    <div>

                        <button class="btn btn-warning btn-lg">Send Email</button>
                        @if(session('mail_message'))
                        <p style="color:green">{{session('mail_message')}}</p>
                        @endif
                    </div>

                </div>
            </form>

        </div>
    </div>

@endsection
