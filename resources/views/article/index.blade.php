@extends('layout2')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
                <ul class="style1">
                    @forelse($article_list as $article)
                        <li class="first">
                            <h3><a href="/article/{{$article->id}}">{{$article->title}}</a></h3>
                            {{--                        <h3><?= $article->title  ?></h3>--}} {{-- php way of adding variables instead of using blade --}}
                            <p><a href="/article/{{$article->id}}">{{$article->excerpt}}</a></p>
                        </li>
                    @empty
                        <h1>Not Found!</h1>
                    @endforelse
{{--                    @foreach($article_list as $article)--}}
{{--                        <li class="first">--}}
{{--                            <h3><a href="/article/{{$article->id}}">{{$article->title}}</a></h3>--}}
{{--                            --}}{{--                        <h3><?= $article->title  ?></h3>--}}{{-- --}}{{-- php way of adding variables instead of using blade --}}
{{--                            <p><a href="/article/{{$article->id}}">{{$article->excerpt}}</a></p>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
                </ul>
        </div>
    </div>
@endsection

