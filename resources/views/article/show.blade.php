@extends('layout2')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                @if($current_article)
                    <div class="title">
                        <h2>{{$current_article->title}}</h2>
                        <span class="byline">{{$current_article->excerpt}}</span> </div>
                    <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                    <p>{{$current_article->body}} </p>
                @else
                    <div class="title">
                        <h2>Not found!</h2>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
