@extends('layout2')

@section('head')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')

    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <h2><b>New Article</b></h2>
                <form action="{{route('article.store')}}" name="article" class="contact-form" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control"
                               id="name"
                               name="title"
                               placeholder="Title"
                               value="{{old('title')}}"
                               autofocus="">
                        @if($errors->has('title')) {{--same as @error('title')...@enderror--}}
                            <p style="color:red">{{ $errors->first('title')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('excerpt')}}" name="excerpt" class="form-control" id="phone" placeholder="Excerpt" >
                        @error('excerpt')
                        <p style="color:red">{{ $errors->first('excerpt')}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Content" name="body" rows="5">
                        {{old('body')}}
                        </textarea>
                        @error('body')
                        <p style="color:red">{{ $errors->first('body')}}</p>
                        @enderror
                    </div>
                    <div class="control">

                                <select multiple class="form-control" name="tags[]">{{--by using [] with name it will return as array--}}
                                    @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>

                            @error('tags')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                        <br>
                        <br>
                        <button type="submit" class="btn btn-default btn-send">  Save </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
