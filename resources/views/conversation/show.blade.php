@extends('layout2')

@section('content')
    <div id="wrapper">
        <h1><b>Conversation Details</b></h1>
        <hr>
        <div id="page" class="container">
            <div id="content">
                @if($conversation)
                    <div class="title">
                        <h2>{{$conversation->title}}</h2>
                        <h3 style="color:blue">Author: <bold>{{$conversation->user->name}}</bold></h3>
                    <p>{{$conversation->body}} </p>
                        <h2>Replies</h2>

                        @forelse($conversation->replies as $reply)
                            <div style="border: 1px solid black; margin: 1.5px">
                                <h4>{{$reply->user->name}} Said..</h4>
                                <h5>{{$reply->comment}} Said..</h5>
                                @if($reply->is_best())
                                    <p style="color:Red">Best Answer!</p>
                                @endif
                                @can('update',$conversation)
                                    <form action="{{route('reply.store',$reply->id)}}" method="POST">
                                     @csrf
                                    <button class="btn-block" type="submit">Best Reply?</button>
                                    </form>
                                @endcan
                            </div>
                        @empty
                            No Replies for this Conversation
                        @endforelse
                @else
                    <div class="title">
                        <h2>Not found!</h2>
                    </div>
                @endif
            </div>
            </div>
        </div>
    </div>
@endsection
