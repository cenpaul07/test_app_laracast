
@extends('layout2')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <ul class="style1">
                @can ('view_link')
                 <li>View Form</li>
                @endcan
                @can('edit_file')
                        <li><a href="{{route('role.show')}}">Edit file</a></li>
                @endcan
        </div>
    </div>
@endsection

